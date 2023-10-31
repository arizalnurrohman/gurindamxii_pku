<?php

namespace Modules\Ipanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ipanel\Entities\PengetahuanCategoryModel;
use Modules\Ipanel\Entities\PengetahuanModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use App\Helper\ImageManager;

use Spatie\Permission\Traits\HasRoles;

class PengetahuanController extends Controller
{
    use ImageManager;
    use HasRoles;

    public $table_pengetahuan           ="pengetahuan";
    public $table_pengetahuan_content   ="pengetahuan_content";
    public $table_pengetahuan_category  ="pengetahuan_category";
    public $table_pengetahuan_comments  ="pengetahuan_comment";

    public $table_newsletter            ="newsletter";

    public $assets_pengetahuan          ="images/assets_pengetahuan/";
    public $paging                      =10;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        // print_r($user->hasRole('writer'));
        // exit;
        $query      = DB::table($this->table_pengetahuan);
        if(isset($_GET['search'])){
            $query         = $query->where('pgTitle',"like","%".$_GET['search']."%");
        }
        $query             =$query->paginate($this->paging);
        #$query->comments   =121;#DB::table($this->table_pengetahuan_comments)->select('cmId')->where("pgId",$query->pgId)->count();

        $data['data']           =$query;
        $data['assets_storage'] ="storage/".$this->assets_pengetahuan;
        $data['new_ajax']  ="
                            $('.addnewsletter').click(function(event){
                                event.preventDefault();
                                    var target_addr=$(this).attr('href');
                                    swal({
                                        title: \"Apakah Anda Yakin akan Menambahkan Ke dalam daftar NewsLetter ?\",
                                        text: \"Anda tidak akan dapat membatalkan apabila sudah ditambahkan!\",
                                        type: \"warning\",
                                        showCancelButton: true,
                                        confirmButtonClass: \"btn-danger\",
                                        confirmButtonText: \"Ya, Setujui Ini!\",
                                        cancelButtonText: \"Tidak, Tolong Batalkan!\",
                                        closeOnConfirm: false,
                                        closeOnCancel: false
                                        },
                                        function(isConfirm) {
                                        if (isConfirm) {
                                            $.get(target_addr,function(data){
                                                if($.isEmptyObject(data.errors)){
                                                    swal({ 
                                                        type: 'success',
                                                        title: 'Success',
                                                        text: data.success 
                                                    });
                                                }else{
                                                    swal({ 
                                                        html:true,
                                                        type: 'error',
                                                        title: 'Error',
                                                        text:'<span style=\"font-size:14px\">'+ data.errors +'</span>',
                                                    });
                                                }
                                            })
                                        } else {
                                                swal(\"Cancelled\", \"Anda Membatalkan menambahkan data :)\", \"error\");
                                        }
                                    });
                            });
        ";
        
        return view('ipanel::pengetahuan.index',['data'=>$data]);
    }

    public static function get_count($id){
        $query=DB::table("pengetahuan_comment")->select('cmId')->where("pgId",$id)->count();
        return $query;
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data=array(
            "summernote"=>array(
                array(
                    "class"=>".summernote",
                    "height"=>200
                )
            ),
            "kategori"  =>DB::table($this->table_pengetahuan_category)->get(),
            "select2combo" => "select2combo",
            "datetime_picker" => "datetime_picker",
            "form_ajax_upload"=>array(
                "theid"=>"#pengetahuan",
                "thebutton"=>".btn-submit"
            ),
            "file_upload_theme_two" => "file_upload_theme_two",
            "new_ajax"=>"
                $('.content_content').hide();
                $('.content_pdf').hide();
                $('.content_video').hide();

                $('.type_content').change(function() {
                    if($('.type_content').val()=='text'){
                        $('.content_content').show();
                        $('.content_pdf').hide();
                        $('.content_video').hide();
                    }
                    if($('.type_content').val()=='document'){
                        $('.content_content').hide();
                        $('.content_pdf').show();
                        $('.content_video').hide();
                    }
                    if($('.type_content').val()=='video'){
                        $('.content_content').hide();
                        $('.content_pdf').hide();
                        $('.content_video').show();
                    }
                });
            ",
        );
        return view('ipanel::pengetahuan.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
        
        // print "<pre>";
        // print_r($_POST);
        // print_r($_FILES);
        // exit;

        // print $totime=strtotime($_POST['pemdatetime']);
        // print "<br>";
        // print date("Y-m-d H:i:s",$totime);
        // print "<br>";
        // print $_POST['pemdatetime']."<br>";
        // exit;
        #VALIDATION -------------------------------------------------------------------------------------------
        $payload_vadidator=[
            'pemcat'=>'required',
            'pemtype'=>'required',
            'pemtitle'=>'required',
            'pemdatetime'=>'required',
            'pemtimeestimate'=>'required|numeric',
            'pemdesc'=>'required',
            'pemfile' => 'image|mimes:jpeg,png,jpg|max:2048',
            "content_type"=>'required',
            "content_title"=>'required',
            "content_estimate"=>'required',
        ];
        if($request->content_type=="document"){
            $payload_vadidator['content_pdf']='required|mimes:pdf|max:10000';
        }
        if($request->content_type=="video"){
            $payload_vadidator['content_video']='required|mimes:mp4,mov,ogg,qt | max:200000';
        }
        if($request->content_type=="text"){
            $payload_vadidator['content_content']='required';
        }
        $payload_error=[
            'pemtitle.required' => 'Kolom Nama Kategori Wajib Di isi.',
            'pemdesc.required' => 'Kolom Keterangan Wajib Di isi.',

            "content_type.required" => 'Kolom Tipe Konten [Pada TAB Pengetahuan Konten] Wajib Di isi.',
            "content_content.required" => 'Kolom Isi <strong>Konten</strong> [Pada <strong>TAB Pengetahuan Konten</strong>] Wajib Di isi.',
            "content_video.required" => 'Kolom Isi <strong>Video File</strong> [Pada <strong>TAB Pengetahuan Konten</strong>] Wajib Di isi.',
            "content_pdf.required" => 'Kolom Isi <strong>PDF File</strong> [Pada <strong>TAB Pengetahuan Konten</strong>] Wajib Di isi.',

            "content_title.required" => 'Kolom  <strong>Judul Sub Materi</strong> [Pada <strong>TAB Pengetahuan Konten</strong>] Wajib Di isi.',
            "content_estimate.required" => 'Kolom  <strong>Estimasi</strong> [Pada <strong>TAB Pengetahuan Konten</strong>] Wajib Di isi.',
        ];
        $validator = \Validator::make($request->all(),$payload_vadidator,$payload_error);
        #END VALIDATION -----------------------------------------------------------------------------------------

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            $data['image']="";;
            $path       = "storage/".$this->assets_pengetahuan;
            $path_new   ="public/".$this->assets_pengetahuan;
            $folder_    ="";
            
            /*
            if(!is_dir($path_new)){
                !is_dir($path_new) &&
                mkdir($path_new, 0777, true);
                return response()->json(['errors'=>"folder <strong>".$path_new."</strong>gak ada beroah..<br>"]);
                exit;
            }else{

            }
            exit;
            */
            !is_dir($path_new) &&
                mkdir($path_new, 0777, true);
            
            if($request->file('pemfile') or $request->file('content_pdf') or $request->file('content_video')) {
                /*
                if(!is_dir($path_new.date("Y"))){
                    $make_year=mkdir($path_new.date("Y"));
                    // if($make_year){
                    //     print "yes tahun<br>";
                    // }else{
                    //     print "Gagal Buat Tahun";
                    // }
                }
                // else{
                //     print "Tahun sudah ada<br>";
                // }
                if(!is_dir($path_new.date("Y")."/".date("m"))){
                    $make_month=mkdir($path_new.date("Y")."/".date("m"));
                    // if($make_month){
                    //     print "yes bulan<br>";
                    // }else{
                    //     print "Gagal Buat Bulan";
                    // }
                }
                // else{
                //     print "Bulan sudah ada<br>";
                // }
                if(!is_dir($path_new.date("Y")."/".date("m")."/".date("Ymd"))){
                    $make_days=mkdir($path_new.date("Y")."/".date("m")."/".date("Ymd"));
                    // if($make_days){
                    //     print "yes hari<br>";
                    // }else{
                    //     print "Gagal Buat hari";
                    // }
                }
                // else{
                //     print "hari sudah ada<br>";
                // }
                */
                $folder_    =date("Y")."/".date("m")."/".date("Ymd")."/";
                // print "<pre>";
                // print "<hr>";
                // print $path_new."<hr>";
                // print $folder_."<hr>";
                // print_r($request->file());
                // exit;
            }

            if($file = $request->file('pemfile')) {
                if($request->file('pemfile')){
                    $file= $request->file('pemfile');
                    $fileNames=uniqid().'.'.$file->getClientOriginalExtension();
                    $store_the_file=$file->storeAs($path_new.$folder_,$fileNames);
                    if($store_the_file){
                        $data['image']=$fileNames;
                    }else{
                        return response()->json(['errors'=>"Gagal insert file ke ".($path_new.$folder."/".$fileNames)]);
                        exit;
                    }
                }
            }
           
            $pg_id    =$this->nextid();
            $pg_title = $pg_id."-".\Str::slug($request->pemtitle);
           #pgId 	id_user 	catId 	pgType 	pgTitle 	pgPermalink 	pgTimePost 	pgImage 	pgDescription 	pgEstimation 	pgViewed 	pgDisplay 	pgReported 	created_at 	updated_at 	
            $payload=[
                'pgId'           => $pg_id,
                'id_user'        => '1',
                'catId'          => $request->pemcat,
                'pgType'         => $request->pemtype,
                'pgTitle'        => $request->pemtitle,
                'pgPermalink'    => $pg_title,
                'pgTimePost'     => date("Y-m-d H:i:s",strtotime($request->pemdatetime)),
                'pgDescription'  => $request->pemdesc,
                'pgEstimation'   => $request->pemtimeestimate,
                'pgDisplay'      =>'y',
                'pgViewed'       =>0,
            ];
            if($file = $request->file('pemfile')) {
                $payload['pgImage'] = $folder_.$data['image'];
            }

            $save_pengetahuan=DB::table($this->table_pengetahuan)->insert($payload);
            if($save_pengetahuan){
                # 	pcId 	pgId 	pcContentType 	pcText 	pcVideo 	pcDocuments 	pcDuration 	pcSort 	created_at 	updated_at 	
                #if($file = $request->file('content')) {
                $payload_c=[
                    'pcId'          =>$this->nextid_content(),
                    'pgId'          =>$pg_id,
                    'pcTitle'       =>$request->content_title,
                    'pcPermalink'   =>$this->nextid_content()."-".\Str::slug($request->content_title),
                    'pcContentType' =>$request->content_type,
                    'pcDuration'    =>$request->content_estimate,
                    'pcSort'        =>$this->next_sort($pg_id),
                ];
                if($request->content_type=="document"){
                    if($file = $request->file('content_pdf')) {
                        $file= $request->file('content_pdf');
                        $fileNames=uniqid().'.'.$file->getClientOriginalExtension();
                        $file->storeAs($path_new.$folder_,$fileNames);
                        $data['content_pdf']=$folder_.$fileNames;

                        $payload_c['pcDocuments']   =$data['content_pdf'];
                    }
                }

                if($request->content_type=="video"){
                    if($file = $request->file('content_video')) {
                        $file= $request->file('content_video');
                        $fileNames=uniqid().'.'.$file->getClientOriginalExtension();
                        $file->storeAs($path_new.$folder_,$fileNames);
                        $data['content_video']=$folder_.$fileNames;
    
                        $payload_c['pcVideo']   =$data['content_video'];
                    }
                }

                if($request->content_type=="text"){
                    $payload_c['pcText']   =$request->content_content;
                }

                $save_content=DB::table($this->table_pengetahuan_content)->insert($payload_c);
            }
            /*
            [pemcat] => 1
            [pemtype] => 
            [pemdatetime] => 
            [pemtitle] => 
            [pemtimeestimate] => 
            [pemdesc] =>
            */

            return response()->json(['success'=>route('pengetahuan.index')]);
            exit;
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data_get = DB::table($this->table_pengetahuan)
                            //->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                            ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                            ->where('pgPermalink', $id)
                            ->first();
        $data_get->content=DB::table($this->table_pengetahuan_content)
                                ->where('pgId', $data_get->pgId)
                                ->get();
                            
        $data=array(
            "datetime_picker" => "datetime_picker",
            "data"  =>$data_get,
            "new_ajax"  =>"
                    $('.delete_show').click(function(event){
                        event.preventDefault();
                            var target_addr=$(this).attr('href');
                            swal({
                                title: \"Apakah Anda Yakin akan Menghapus Data ?\",
                                text: \"Anda tidak akan dapat mengembalikan Data Setelah Dihapus!\",
                                type: \"warning\",
                                showCancelButton: true,
                                confirmButtonClass: \"btn-danger\",
                                confirmButtonText: \"Ya, Setujui Ini!\",
                                cancelButtonText: \"Tidak, Tolong Batalkan!\",
                                closeOnConfirm: false,
                                closeOnCancel: false
                                },
                                function(isConfirm) {
                                if (isConfirm) {
                                    $.get(target_addr,function(data){
                                        if($.isEmptyObject(data.errors)){
                                            swal({ 
                                                type: 'success',
                                                title: 'Success',
                                                text: 'Anda Berhasil Menghapus Data' 
                                            },
                                            function(){
                                                $('.submateri_'+data.success.id).hide();
                                                //window.location = data.success.url;
                                            });
                                        }else{
                                            swal({ 
                                                html:true,
                                                type: 'error',
                                                title: 'Error',
                                                text:'<span style=\"font-size:14px\">'+ data.errors +'</span>',
                                            });
                                        }
                                    })
                                } else {
                                        swal(\"Cancelled\", \"Anda Membatalkan Menghapus data :)\", \"error\");
                                }
                            });
                    });
            ",
        );
        
        return view('ipanel::pengetahuan.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($getid)
    {
        $data_get = DB::table($this->table_pengetahuan)
                            ->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                            ->where('pgPermalink', $getid)
                            ->first();
        $data=array(
            "data"=>$data_get,
            "summernote"=>array(
                array(
                    "class"=>".summernote",
                    "height"=>200
                )
            ),
            "kategori"  =>DB::table($this->table_pengetahuan_category)->get(),
            "form_ajax_upload"=>array(
                "theid"=>"#pengetahuan",
                "thebutton"=>".btn-submit"
            ),
            "datetime_picker" => "datetime_picker",
            "file_upload_theme_two" => "file_upload_theme_two",
            "new_ajax"=>"
                $('.type_content').change(function() {
                    if($('.type_content').val()=='text'){
                        $('.content_content').show();
                        $('.content_pdf').hide();
                        $('.content_video').hide();
                    }
                    if($('.type_content').val()=='document'){
                        $('.content_content').hide();
                        $('.content_pdf').show();
                        $('.content_video').hide();
                    }
                    if($('.type_content').val()=='video'){
                        $('.content_content').hide();
                        $('.content_pdf').hide();
                        $('.content_video').show();
                    }
                });
            ",
        );
        if($data_get->pcContentType=="document"){
            $data['new_ajax'].="$('.content_content').hide();$('.content_pdf').show();$('.content_video').hide();";
        }
        if($data_get->pcContentType=="text"){
            $data['new_ajax'].="$('.content_content').show();$('.content_pdf').hide();$('.content_video').hide();";
        }
        if($data_get->pcContentType=="video"){
            $data['new_ajax'].="$('.content_content').hide();$('.content_pdf').hide();$('.content_video').show();";
        }
        
        return view('ipanel::pengetahuan.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'pemcat'=>'required',
            'pemtype'=>'required',
            'pemtitle'=>'required',
            'pemdatetime'=>'required',
            'pemtimeestimate'=>'required|numeric',
            'pemdesc'=>'required',
            'pemfile' => 'image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'pemtitle.required' => 'Kolom Nama Kategori Wajib Di isi.',
            'pemdesc.required' => 'Kolom Keterangan Wajib Di isi.',
        ]);

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            $data['image']="";;
            $path       = storage_path($this->assets_pengetahuan);
            #$path_new   =$this->assets_pengetahuan;
            $path_new   ="public/".$this->assets_pengetahuan;
            $data_get   = DB::table($this->table_pengetahuan)
                                ->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                                ->where('pgPermalink', $id)
                                ->first();
            $folder_    ="";
            !is_dir($path_new) &&
                mkdir($path_new, 0777, true);
            
            if($request->file('pemfile') or $request->file('content_pdf') or $request->file('content_video')) {
                /*
                if(!is_dir($path_new.date("Y"))){
                    mkdir($path_new.date("Y"));
                }
                if(!is_dir($path_new.date("Y")."/".date("m"))){
                    mkdir($path_new.date("Y")."/".date("m"));
                }
                if(!is_dir($path_new.date("Y")."/".date("m")."/".date("Ymd"))){
                    mkdir($path_new.date("Y")."/".date("m")."/".date("Ymd"));
                }*/
                $folder_    =date("Y")."/".date("m")."/".date("Ymd")."/";
            }    
            if($file = $request->file('pemfile')) {               
                if($request->file('pemfile')){
                    $file= $request->file('pemfile');
                    $fileNames=uniqid().'.'.$file->getClientOriginalExtension();
                    $store_file=$file->storeAs($path_new.$folder_,$fileNames);
                    $data['image']=$fileNames;

                    $delete_file=$this->removeImage($this->assets_pengetahuan,$data_get->pgImage);
                }
            }
            // print $fileNames."<br>";
            // print $path_new.$folder_;
            // print "<br>";
            // print $store_file;
            // print "<br>";
            // print $delete_file;
            // exit;
           
            $pg_id    =$this->nextid();
            $pg_title = $data_get->pgId."-".\Str::slug($request->pemtitle);
            list($tgl,$jam)      =explode(" ",$request->pemdatetime);
            list($tg,$bl,$th)    =explode("/",$tgl);
            $payload=[
                'id_user'        => '1',
                'catId'          => $request->pemcat,
                'pgType'         => $request->pemtype,
                'pgTitle'        => $request->pemtitle,
                'pgPermalink'    => $pg_title,
                'pgTimePost'     => $th."-".$bl."-".$tg." ".$jam,
                'pgDescription'  => $request->pemdesc,
                'pgEstimation'   => $request->pemtimeestimate,
            ];

            // $dataxsd=strtotime($request->pemdatetime);
            // print "<pre>";
            // print "POST: ".$request->pemdatetime."<br>";
            // print "TIMES: ".$dataxsd."<br>";
            // print "TO DATE: ".date('d mM Y H:i:s',$dataxsd)."<br>";
            // print_r($payload);

            // exit;

            if($file = $request->file('pemfile')) {
                $payload['pgImage']=$folder_.$data['image'];
            }

            
            #DB::enableQueryLog();
            $update_pengetahuan=DB::table($this->table_pengetahuan)->where('pgPermalink', $id)->update($payload);
            #$query = DB::getQueryLog();
            #dd($update_pengetahuan);exit;
            #if($update_pengetahuan){
                /*
                $payload_c=[
                    'pcContentType' =>$request->content_type,
                    'pcDuration'    =>$request->content_estimate,
                ];
                if($request->content_type=="document"){
                    if($file = $request->file('content_pdf')) {
                        $file= $request->file('content_pdf');
                        $fileNames=uniqid().'.'.$file->getClientOriginalExtension();
                        $file->storeAs($path_new.$folder_,$fileNames);
                        $data['content_pdf']=$folder_.$fileNames;

                        $payload_c['pcDocuments']   =$data['content_pdf'];
                        $payload_c['pcVideo']       ="";
                        $payload_c['pcText']        ="";
                    }
                }

                if($request->content_type=="video"){
                    if($file = $request->file('content_video')) {
                        $file= $request->file('content_video');
                        $fileNames=uniqid().'.'.$file->getClientOriginalExtension();
                        $file->storeAs($path_new.$folder_,$fileNames);
                        $data['content_video']=$folder_.$fileNames;
    
                        $payload_c['pcVideo']       =$data['content_video'];
                        $payload_c['pcDocuments']   ="";
                        $payload_c['pcText']        ="";
                    }
                }

                if($request->content_type=="text"){
                    $payload_c['pcText']        =$request->content_content;
                    $payload_c['pcDocuments']   ="";
                    $payload_c['pcVideo']       ="";
                }

                $save_content=DB::table($this->table_pengetahuan_content)->where('pcId', $data_get->pcId)->update($payload_c);
                if($save_content){
                    if($data_get->pcContentType=="document"){
                        $delete_file=$this->removeImage($this->assets_pengetahuan,$data_get->pcDocuments);
                    }
                    if($data_get->pcContentType=="video"){
                        $delete_file=$this->removeImage($this->assets_pengetahuan,$data_get->pcVideo);
                    }
                }
                */
            #}else{
            #    return response()->json(['errors'=>"Gagal melakukan Update Data !!"]);
            #    exit;
            #}
            
            return response()->json(['success'=>route('pengetahuan.index')]);
            exit;
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data_get = DB::table($this->table_pengetahuan)
                            ->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                            ->where('pgPermalink', $id)
                            ->first();
        if(($data_get->pgId)>0){
            $run_query=DB::table($this->table_pengetahuan)->where('pgPermalink', $id)->delete();
            if($run_query){
                $run_queryx=DB::table($this->table_pengetahuan_content)->where('pgId', $data_get->pgId)->delete();
                if($run_queryx){
                    $this->removeImage($this->assets_pengetahuan,$data_get->pgImage);
                    if($data_get->pcContentType=="document"){
                        $this->removeImage($this->assets_pengetahuan,$data_get->pcDocuments);
                    }
                    if($data_get->pcContentType=="video"){
                        $this->removeImage($this->assets_pengetahuan,$data_get->pcVideo);
                    }
                }
            }
            return response()->json(['success'=>route('pengetahuan.index')]);
            exit;
        }else{

        }
    }

    public function nextid(){
        $order =DB::table($this->table_pengetahuan)->max('pgId');
		return ($order + 1);
    }

    public function nextid_content(){
        $order =DB::table($this->table_pengetahuan_content)->max('pcId');
		return ($order + 1);
    }

    public function nextid_news(){
        $order =DB::table($this->table_newsletter)->max('newsId');
		return ($order + 1);
    }

    public function next_sort($pgid){
        $order =DB::table($this->table_pengetahuan_content)
                        ->where('pgId', $pgid)
                        ->max('pcSort');
		return ($order + 1);
    }

    public function removeImage($folder_,$file_){  
        if(\Storage::exists($folder_.$file_)){
            \Storage::delete($folder_.$file_);
        }else{
            return "Gagal Hapus File";
        }
    }

    public function displayImage($filename){
        $data_get = DB::table($this->table_pengetahuan)
                            ->where('pgPermalink', $filename)
                            ->first();
        $path = storage_path('/images/assets_pengetahuan/' .$data_get->pgImage);#storage_path#storage_public
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }

    #add sub materi ------------------------------------------------------------------------------------------------
    public function create_submateri(Request $request,$getid)
    {
        $data_get = DB::table($this->table_pengetahuan)
                        ->select('pgId', 'pgPermalink','pgTitle')
                        ->where('pgPermalink', $getid)
                        ->first();
        $data=array(
            "data"                  =>$data_get,
            "summernote"=>array(
                array(
                    "class"=>".summernote",
                    "height"=>200
                )
            ),
            "form_ajax_upload"      =>array(
                "theid"             =>"#detail_pengetahuan",
                "thebutton"         =>".btn-submit"
            ),
            "file_upload_theme_two" => "file_upload_theme_two",
            "new_ajax"=>"
                $('.content_content').hide();
                $('.content_pdf').hide();
                $('.content_video').hide();

                $('.type_content').change(function() {
                    if($('.type_content').val()=='text'){
                        $('.content_content').show();
                        $('.content_pdf').hide();
                        $('.content_video').hide();
                    }
                    if($('.type_content').val()=='document'){
                        $('.content_content').hide();
                        $('.content_pdf').show();
                        $('.content_video').hide();
                    }
                    if($('.type_content').val()=='video'){
                        $('.content_content').hide();
                        $('.content_pdf').hide();
                        $('.content_video').show();
                    }
                });
            ",
        );
        return view('ipanel::pengetahuan.create_submateri',['data'=>$data]);
    }

    public function store_submateri(Request $request,$getid)
    {
        $data_get = DB::table($this->table_pengetahuan)
                        ->select('pgId', 'pgPermalink','pgTitle')
                        ->where('pgPermalink', $getid)
                        ->first();

        $validator = \Validator::make($request->all(), [
            'content_type'=>'required',
            'content_title'=>'required',
            'content_estimate'=>'required',
        ], [
            "content_type.required" => 'Kolom Tipe Konten [Pada TAB Pengetahuan Konten] Wajib Di isi.',
            "content_content.required" => 'Kolom Isi <strong>Konten</strong> Wajib Di isi.',
            "content_video.required" => 'Kolom Isi <strong>Video File</strong> Wajib Di isi.',
            "content_pdf.required" => 'Kolom Isi <strong>PDF File</strong> Wajib Di isi.',
        ]);
        
        if($request->content_type=="document"){
            $payload_vadidator['content_pdf']='required|mimes:pdf|max:10000';
        }
        if($request->content_type=="video"){
            $payload_vadidator['content_video']='required|mimes:mp4,mov,ogg,qt | max:20000';
        }
        if($request->content_type=="text"){
            $payload_vadidator['content_content']='required';
        }

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            
            $data['files']="";
            $path = storage_path("app/public/documents/subpengetahuan/");
            $path_new   ="public/".$this->assets_pengetahuan;
            $folder_    =date("Y")."/".date("m")."/".date("Ymd")."/";
            
            !is_dir($path) &&
                mkdir($path, 0777, true);
            $payload_c=[
                'pcId'          =>$this->nextid_content(),
                'pgId'          =>$data_get->pgId,
                'pcTitle'       =>$request->content_title,
                'pcPermalink'   =>$this->nextid_content()."-".\Str::slug($request->content_title),
                'pcContentType' =>$request->content_type,
                'pcDuration'    =>$request->content_estimate,
                'pcSort'        =>$this->next_sort($data_get->pgId),
            ];
            if($request->content_type=="document"){
                if($file = $request->file('content_pdf')) {
                    $file= $request->file('content_pdf');
                    $fileNames=uniqid().'.'.$file->getClientOriginalExtension();
                    $file->storeAs($path_new.$folder_,$fileNames);
                    $data['content_pdf']=$folder_.$fileNames;

                    $payload_c['pcDocuments']   =$data['content_pdf'];
                }
            }

            if($request->content_type=="video"){
                if($file = $request->file('content_video')) {
                    $file= $request->file('content_video');
                    $fileNames=uniqid().'.'.$file->getClientOriginalExtension();
                    $file->storeAs($path_new.$folder_,$fileNames);
                    $data['content_video']=$folder_.$fileNames;

                    $payload_c['pcVideo']   =$data['content_video'];
                }
            }

            if($request->content_type=="text"){
                $payload_c['pcText']   =$request->content_content;
            }

            $save_content=DB::table($this->table_pengetahuan_content)->insert($payload_c);
            if($save_content){
                return response()->json(['success'=>route('pengetahuan.show',$data_get->pgPermalink)]);
                exit;
            }else{
                return response()->json(['errors'=>"Gagal menyimpan data..!"]);
                exit;
            }
        }
    }   
    public function destroy_submateri($id)
    {
        // print "<pre>";
        // print_r($_GET);
        // exit;
        
        $data_get = DB::table($this->table_pengetahuan_content)
                        ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_content.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                        ->where('pcPermalink', $id)
                        ->first();
        // return response()->json(['success'=>["url"=>route('pengetahuan.show',$data_get->pgPermalink),"id"=>$data_get->pcId]]);
        // exit;                
        if(($data_get->pcId)>0){
            $run_query=DB::table($this->table_pengetahuan_content)->where('pcPermalink', $id)->delete();
            if($run_query){
                if($data_get->pcDocuments){
                    @unlink(public_path('assets/documents/subpengetahuan/').$data_get->pcDocuments);
                }
                if($data_get->pcVideo){
                    @unlink(public_path('assets/documents/subpengetahuan/').$data_get->pcVideo);
                }
            }
            return response()->json(['success'=>["url"=>route('pengetahuan.show',$data_get->pgPermalink),"id"=>$data_get->pcId]]);
            exit;
        }else{

        }
        
       
        
    }

    public function edit_submateri($getid)
    {
        $data_get = DB::table($this->table_pengetahuan_content)
                        ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_content.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                        ->where('pcPermalink', $getid)
                        ->first();
        $data=array(
            "data"=>$data_get,
            "summernote"=>array(
                array(
                    "class"=>".summernote",
                    "height"=>200
                )
            ),
            "form_ajax_upload"=>array(
                "theid"=>"#detail_pengetahuan",
                "thebutton"=>".btn-submit"
            ),
            "file_upload_theme_two" => "file_upload_theme_two",
            "new_ajax"=>"
                $('.type_content').change(function() {
                    if($('.type_content').val()=='text'){
                        $('.content_content').show();
                        $('.content_pdf').hide();
                        $('.content_video').hide();
                    }
                    if($('.type_content').val()=='document'){
                        $('.content_content').hide();
                        $('.content_pdf').show();
                        $('.content_video').hide();
                    }
                    if($('.type_content').val()=='video'){
                        $('.content_content').hide();
                        $('.content_pdf').hide();
                        $('.content_video').show();
                    }
                });

            ",
        );
        return view('ipanel::pengetahuan.edit_submateri',['data'=>$data]);
    }
    public function update_submateri(Request $request, $id)
    {
        // print "<pre>";
        // print_r($id);
        // exit;
        
        $validator = \Validator::make($request->all(), [
            'content_title'=>'required',
            'content_estimate'=>'required',
        ], [
            'content_title.required' => 'Kolom Judul Wajib Di isi.',
            'content_estimate.required' => 'Kolom Durasi Wajib Di isi.',
        ]);
        if($request->content_type=="document"){
            $payload_vadidator['content_pdf']='required|mimes:pdf|max:10000';
        }
        if($request->content_type=="video"){
            $payload_vadidator['content_video']='required|mimes:mp4,mov,ogg,qt | max:20000';
        }
        if($request->content_type=="text"){
            $payload_vadidator['content_content']='required';
        }

        
        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            $data_get = DB::table($this->table_pengetahuan_content)
                        ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_content.'.pgId', '=', $this->table_pengetahuan.'.pgId')
                        ->where('pcPermalink', $id)
                        ->first();
            // print "<pre>";
            // print_r($data_get);
            // exit;            
            $data['files']="";
            $path = storage_path("app/public/documents/subpengetahuan/");
            $path_new   ="public/".$this->assets_pengetahuan;
            $folder_    =date("Y")."/".date("m")."/".date("Ymd")."/";
            
            !is_dir($path) &&
                mkdir($path, 0777, true);
            $payload_c=[
                'pcTitle'       =>$request->content_title,
                'pcPermalink'   =>$this->nextid_content()."-".\Str::slug($request->content_title),
                'pcContentType' =>$request->content_type,
                'pcDuration'    =>$request->content_estimate,
            ];
            if($request->content_type=="document"){
                if($file = $request->file('content_pdf')) {
                    $file= $request->file('content_pdf');
                    $fileNames=uniqid().'.'.$file->getClientOriginalExtension();
                    $file->storeAs($path_new.$folder_,$fileNames);
                    $data['content_pdf']=$folder_.$fileNames;

                    $payload_c['pcDocuments']   =$data['content_pdf'];
                }
            }

            if($request->content_type=="video"){
                if($file = $request->file('content_video')) {
                    $file= $request->file('content_video');
                    $fileNames=uniqid().'.'.$file->getClientOriginalExtension();
                    $file->storeAs($path_new.$folder_,$fileNames);
                    $data['content_video']=$folder_.$fileNames;

                    $payload_c['pcVideo']   =$data['content_video'];
                }
            }

            if($request->content_type=="text"){
                $payload_c['pcText']   =$request->content_content;
            }
            
            // return response()->json(['success'=>route('mpembelajaran.show')]);
            // exit;
            #$update_pengetahuan=DB::table($this->table_pengetahuan)->where('pgPermalink', $id)->update($payload);
            $save_content=DB::table($this->table_pengetahuan_content)->where('pcPermalink', $id)->update($payload_c);
            if($save_content){
                return response()->json(['success'=>route('pengetahuan.show',$data_get->pgPermalink)]);
                exit;
            }else{
                return response()->json(['errors'=>"Gagal menyimpan data..!"]);
                exit;
            }
        }
    }

    public function add_newsletter($getid)
    {
        // print $getid;
        // exit;
        $data_get = DB::table($this->table_pengetahuan)
                        ->where('pgPermalink', $getid)
                        ->first();
        
        $data_c   = DB::table($this->table_newsletter)->where('pgId', $data_get->pgId)->count();               
        if($data_c<=0){
            $payload_c=[
                'newsId'        =>$this->nextid_news(),
                'pgId'          =>$data_get->pgId,
                'newsPermalink' =>$this->nextid_news()."-".sha1($this->nextid_news()),
                'newsTitle'     =>$data_get->pgTitle,
                'newsURL'       =>url('front/materi/'.$data_get->pgPermalink),
                'newsImage'     =>asset('storage/images/assets_pengetahuan/'.$data_get->pgImage),
                'newsContent'   =>$data_get->pgDescription,

                'newsCount'     =>0,
                'nwtId'         =>1,
                'newsGenerate'  =>'n',
                'created_at'    =>date('Y-m-d H:i:s'),
            ];

            $save_content=DB::table($this->table_newsletter )->insert($payload_c);
            if($save_content){
                return response()->json(['success'=>"Berhasil Menambahkan News Letter"]);
                exit;
            }else{
                return response()->json(['errors'=>"Gagal Menambahkan News Letter..!"]);
                exit;
            }
        }else{
            return response()->json(['errors'=>"Data Materi sudah ada di daftar News Letter..!"]);
                exit;
        }
        
    } 
}
