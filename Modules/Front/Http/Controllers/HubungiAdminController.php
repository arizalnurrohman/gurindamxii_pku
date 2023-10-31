<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;

class HubungiAdminController extends Controller
{
    public $table_hubungi_admin    ="hubungi_admin";
    public $table_user             ="users";

    public $paging                      =20;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(request $request)
    {
        ##TEST USER LOGIN SESSION...........................................
        // $USER_LOGIN = [
        //     "ID"    =>5,
        //     "NAME"  =>"Alesha Farzana Rohman",
        //     "AVATAR"=>"https://bootdey.com/img/Content/avatar/avatar5.png",
        //     "NIP "  =>"199002132023211016",
        // ];
        // $request->session()->put('USER_LOGIN', $USER_LOGIN);
        
        $data_get = DB::table($this->table_hubungi_admin)
                        ->select($this->table_hubungi_admin.".*")
                        ->where($this->table_hubungi_admin.'.id_user', session()->get('USER_LOGIN.ID'))
                        ->where($this->table_hubungi_admin.'.haParent', 0)
                        ->orderBy($this->table_hubungi_admin.'.created_at', 'DESC')
                        ->paginate($this->paging);

        $data=array(
            "data"=>$data_get,
            "new_ajax"=>"
                var windowSize = $(window).width();
                //alert(windowSize);
            ",
        );

        if(session()->get('USER_LOGIN.VERIFIED')=="y"){
            return view('front::hubungi_admin.index',['data'=>$data]);
        }else{
            return view('front::unverified.index');
        }
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
            "form_ajax_upload"=>array(
                "theid"=>"#hubungiadmin",
                "thebutton"=>".btn-submit"
            ),
        );
        return view('front::hubungi_admin.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        ##TEST USER LOGIN SESSION...........................................
        // $USER_LOGIN = [
        //     "ID"=>5,
        //     "NAME"=>"Alesha Farzana Rohman",
        //     "AVATAR"=>"https://bootdey.com/img/Content/avatar/avatar5.png",
        //     "NIP"=>"199002132023211016",  
        // ];
        // $request->session()->put('USER_LOGIN', $USER_LOGIN);

        $payload_vadidator=[
            'hubungijudul'=>'required',
            'hubungikonten'=>'required',
        ];
        $payload_error=[
            'hubungijudul.required' => 'Kolom Judul Wajib Di isi.',
            'hubungikonten.required' => 'Kolom Konten Isi Topik Wajib Di isi.',
        ];
        $validator = \Validator::make($request->all(),$payload_vadidator,$payload_error);
        #END VALIDATION -----------------------------------------------------------------------------------------
        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            $pg_id      =$this->nextid("hubungi_admin","haId");
            $id_ticket  =$this->nextid_ticket("hubungi_admin","haTicketId");
            $pg_title = $pg_id."-".\Str::slug($request->hubungijudul);
            # haId 	id_user 	haLockId 	haTicket 	haTicketId 	haTitle 	haPermalink 	haContent 	haDisplay 	haParent 	haRead 	haSession 	created_at updated_at 	
            $payload=[
                'haId'          => $pg_id,
                'id_user'       => session()->get('USER_LOGIN.ID'),
                'haLockId'      => 0,
                'haTicket'      => "PGN-".date("Ymd")."-".sprintf('%06d', $id_ticket),
                'haTicketId'    => $id_ticket,
                'haTitle'       => $request->hubungijudul,
                'haPermalink'   => $pg_title,
                'haContent'     => $request->hubungikonten,
                'haDisplay'     => 'y',
                'haParent'      =>0,
                'haSession'     =>'open',
                'created_at'    =>date("Y-m-d H:i:s"),
            ];


            $save_hubungi=DB::table($this->table_hubungi_admin)->insert($payload);
            if($save_hubungi){
                return response()->json(['success'=>route('hubungi_admin.index')]);
                exit;
            }
            
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request,$id)
    {
        #DB::enableQueryLog();
        $data_get = DB::table($this->table_hubungi_admin)
                            ->where('haPermalink', $id)
                            ->first();
        $data_com = DB::table($this->table_hubungi_admin)
                        ->select($this->table_hubungi_admin.".*",$this->table_user.".name",$this->table_user.".id")
                        ->leftJoin($this->table_user, $this->table_hubungi_admin.'.id_user', '=', $this->table_user.'.id')
                        ->where('haParent', $data_get->haId)
                        ->orderBy($this->table_hubungi_admin.'.created_at', 'ASC')
                        ->get();

        #UPDATE COUNT VIEW.........................................................................
        $payload=[
            'haRead'        => 'y',
        ];
        // print "<pre>";
        // print $data_get->id_user;
        // print "<hr>";
        // print_r($data_get);
        // print_r($data_com);
        // exit;
        $update_view=DB::table($this->table_hubungi_admin)
                        ->where('haParent', $data_get->haId)
                        ->where('id_user', "NOT LIKE",$data_get->id_user)
                        ->update($payload);
        #END COUNT VIEW............................................................................
        #$query = DB::getQueryLog();
        $data=array(
            "summernote"=>array(
                array(
                    "class"=>".summernote",
                    "height"=>200
                )
            ),
            'data'      =>$data_get,
            'data_com'  =>$data_com,
            #'querys'    =>$query,
            "new_ajax"  =>"
                            $('#balasan').submit(function(e){
                                e.preventDefault(); 
                                //var lokasi_komentar= $('.post_comments').find('.list_reply_comments').val();//$(this).closest('form').find('.list_reply_comments').val();
                                //var kotak_komentar=$('.post_commentsx').val();
                                $.ajax({
                                    url:$(this).closest('form').attr('action'),
                                    type:\"post\",
                                    data:new FormData(this), 
                                    processData:false,
                                    contentType:false,
                                    dataType: \"json\",
                                    cache:false,
                                    async:false,
                                    success: function(data){
                                        //alert(data.success);
                                        //window.location.href = 'login.html';
                                        if($.isEmptyObject(data.errors)){
                                            //alert(data.success.id);
                                            if($.isEmptyObject(data.success.name)){
                                                window.location.href = data.success;
                                            }else{
                                                var html_append='<div class=\"itemdiv dialogdiv rightc\">'
                                                    +'<div class=\"body\">'
                                                    +'<div class=\"time\">'
                                                    +'        <a href=\"#\" style=\"font-size:14px; font-weight:600\">'+data.success.name+'</a>'
                                                    +'    </div>'
                                
                                                    +'    <div class=\"name\">'
                                                    +'        <i class=\"ace-icon fa fa-clock-o\"></i>'
                                                    +'        <span class=\"green\" style=\"font-size:11px;font-weight:bold\">'+data.success.datetime+' WIB</span>'
                                                    +'    </div>'
                                                    +'    <div class=\"text\" style=\"text-align:right\">'
                                                    +'        '+data.success.message+' '
                                                    +'    </div>'
                                                    +'</div>'
                                                    +'<div class=\"user right\">'
                                                    +'    <img alt=\"Alexas Avatar\" src=\"https://bkpsdm.pelalawankab.go.id/assets/themes/cms/images/avatars/avatar5.png\">'
                                                    +'</div>'
                                                    +'</div>';
                                                
                                                
                                                // alert(lokasi_komentar);
                                                var class_target='dialogs';
                                                  
                                                $('.widget-main').find('.'+class_target).append(html_append);
                                                $('.summernote').summernote('reset');
                                            }
                                        }else{
                                            swal({ 
                                                html:true,
                                                type: 'error',
                                                title: 'Error',
                                                text:'<span style=\"font-size:14px\">'+ data.errors +'</span>',
                                                text: data.errors,
                                            });
                                        }
                                    },
                                    error: function(err, exception) {
                                        swal({ 
                                                html:true,
                                                type: 'error',
                                                title: 'Error',
                                                text: '<span style=\"font-size:14px\">Gagal menambahkan data!</span>',
                                            });
                                    },
                                });
                            });

                            $('#trig').on('click', function () {
                                $('#colMain').toggleClass('col-sm-12 col-sm-10');
                                $('#colPush').toggleClass('span0 col-sm-2');
                            });

            ",
            
        );
        
        if(session()->get('USER_LOGIN.VERIFIED')=="y"){
            return view('front::hubungi_admin.show',['data'=>$data]);
        }else{
            return view('front::unverified.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('front::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
    #FOR COMMENTS
    public function post_comments(Request $request,$getid)
    {
        // $USER_LOGIN = [
        //     "ID"=>5,
        //     "NAME"=>"Alesha Farzana Rohman",
        //     "AVATAR"=>"https://bootdey.com/img/Content/avatar/avatar5.png",
        //     "NIP"=>"199002132023211016",  
        // ];
        // $request->session()->put('USER_LOGIN', $USER_LOGIN);
        
        $validator = \Validator::make($request->all(), [
            'hapesan'=>'required',
            #'g-recaptcha-response' => 'recaptcha',
        ], [
            'hapesan.required' => 'Kolom Pesan Wajib Di isi.',
            #'g-recaptcha-response.recaptcha' => 'Silahkan Klik Anda Bukan Robot.',
        ]);
        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            $data_get = DB::table($this->table_hubungi_admin)
                                ->select("haId","haPermalink")
                                ->where('haPermalink', $getid)
                                ->first();

            #$nextid     =$this->nextid($this->table_hubungi_admin,"haId");
            // return response()->json(['errors'=>$_POST['komentar']."<br>".$request->session()->get('USERNAME')."<br>".$getid."<br>".$nextid]);
            // exit;
            // print "<pre>";
            // print_r($_POST);
            // print $getid; exit;
            ####### START SAVE DATA  COMMENTS----------------------------------------------------------------
            $nextid             =$this->nextid("hubungi_admin","haId");
            #haId 	id_user 	haLockId 	haTicket 	haTicketId 	haTitle 	haPermalink 	haContent 	haDisplay 	haParent 	haSession 	created_at 	updated_at 	
            $payload=[
                'haId'            => $nextid,
                'haLockId'        =>0,
                #'cmPermalink'     => $nextid."-".sha1($nextid),
                #'pgId'            => $data_get->pgId,
                'id_user'         => session()->get('USER_LOGIN.ID'),
                'haParent'        => $data_get->haId,
                'haContent'       => $request->hapesan,
                'haDisplay'       => 'y',
                'haRead'          => 'n',
                'created_at'      => date("Y-m-d H:i:s"),
            ];

            $save_reply=DB::table($this->table_hubungi_admin)->insert($payload);
            ####### END SAVE DATA -------------------------------------------------------------------
            
            #return response()->json(['success'=>route('materi.show',$data_get->pgPermalink)]);
            return response()->json([
                    'success'=>[
                        "id"=>$data_get->haId,
                        "photo"=>session()->get('USER_LOGIN.AVATAR'),
                        "name"=>session()->get('USER_LOGIN.NAME'),
                        "message"=>$request->hapesan,
                        "datetime"=>date("d M Y H:i:s"),
                        ]
                    ]);
        #return redirect()->route('pengetahuan.show',$data_get->pgPermalink);#route('profile', ['id' => 1]);
        #return view('ipanel::pengetahuan.show',['id'=>$data_get->pgPermalink]);
        }
    }
    public function nextid($tablename,$fieldname){
        $order =DB::table($tablename)->max($fieldname);
		return ($order + 1);
    }

    public function nextid_ticket($tablename,$fieldname){
        $order =DB::table($tablename)
                        ->where('created_at',"LIKE",date('Y-m-d')."%")
                        ->max($fieldname);
		return ($order + 1);
    }

    public static function count_comments($idparent){
        $query      =DB::table("hubungi_admin")->select(array("created_at","haRead"))->where('haParent', $idparent);
        
        $data_get   =$query->count();
        $data_last  = $query->orderBy('created_at', 'DESC')->limit(1)->first();
        $data_unread=$query->where('haRead', 'n')->where('id_user', "!=",session()->get('USER_LOGIN.ID'))->count();
        /*
        print "<pre>";
        print "DATA_LAST:";
        print_r($data_last);
        print "</pre>";
        exit;*/

        #return array("COUNT"=>($data_get ? $data_get : '0'),"LAST"=>(count($data_last)>0 ? $data_last : '-' ));
        return array("COUNT"=>($data_get ? $data_get : '0'),"LAST"=>$data_last,"UNREAD"=>$data_unread);
    }
}
