<?php

namespace Modules\Ipanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Ipanel\Entities\ModelPembelajaran;
use Modules\Ipanel\Entities\ModelCategoriPembelajaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use App\Helper\ImageManager;

class PembelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        #return view('ipanel::index');
        if(isset($_GET['search'])){
            $query      = DB::table('ms_pembelajaran')->where('pmTitle',"like","%".$_GET['search']."%")->paginate(10);
        }else{
            $query      = DB::table('ms_pembelajaran')->paginate(10);
        }
        return view('ipanel::materi_pembelajaran.index',['materi_pembelajaran'=>$query]);
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
            "kategori"  =>DB::table('ms_pembelajaran_categori')->get(),
            "select2combo" => "select2combo",
            "form_ajax_upload"=>array(
                "theid"=>"#materi_pembelajaran",
                "thebutton"=>".btn-submit"
            ),
            "file_upload_theme_two" => "file_upload_theme_two",
        );
        return view('ipanel::materi_pembelajaran.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // print "<pre>";
        // print_r($_POST);
        // print_r($_FILES);
        // exit;
        
        /*
        [_token] => SeHAvGObnB6TsVoBtkHByGznz7FkV2uSKIrCF6us
        [matcat] => 29
        [mattitle] => judil materinya
        [matdesc] => 

    keterangan materinya

        [matestimate] => 123
    )
*/
        $validator = \Validator::make($request->all(), [
            'matcat'=>'required',
            'mattitle'=>'required',
            'matfile' => 'image|mimes:jpeg,png,jpg|max:2048',
            'matdesc'=>'required',
            'matestimate'=>'required|numeric',
        ], [
            'matcat.required' => 'Kolom Judul Wajib Di isi.',
            'matdesc.required' => 'Kolom Keterangan Wajib Di isi.',
        ]);


        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            $data['image']="";;
            $path = storage_path("app/public/documents/materi_pembelajaran/");
            
            !is_dir($path) &&
                mkdir($path, 0777, true);
            
            if($file = $request->file('matfile')) {
                if($request->file('matfile')){
                    $file= $request->file('matfile');
                    $filename= date('YmdHi')."_".preg_replace('/\s+/', '-',(strtolower($file->getClientOriginalName())));
                    $file-> move(public_path('assets/documents/materi_pembelajaran/'), $filename);
                    $data['image']= $filename;
                }

            }

            $mat_permalink = preg_replace('/\s+/', '-',(strtolower($request->mattitle)));
            $save_data=DB::table('ms_pembelajaran')->insert([
                'user_id'           =>1,
                'catId'             => $request->matcat,
                'pmTitle'           => $request->mattitle,
                'pmPermalink'       => $mat_permalink,
                'pmImage'           => $data['image'],
                'pmDescription'     => $request->matdesc,
                'pmEstimation'      => $request->matestimate,
                'pmStatus'          => 'y',
            ]);
            if($save_data){
                return response()->json(['success'=>route('mpembelajaran.index')]);
                exit;
            }else{
                return response()->json(['errors'=>"Gagal menyimpan data..!"]);
                exit;
            }
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $datais=DB::table('ms_pembelajaran')
                        ->leftJoin('ms_pembelajaran_categori', 'ms_pembelajaran.catId', '=', 'ms_pembelajaran_categori.catId')
                        ->where('pmPermalink', $id)
                        ->first();
        $datadt=DB::table('ms_pembelajaran_detail')
                        ->where('pbId', $datais->id)
                        ->get();                
        $data=array(
            "data"  =>$datais,
            "datadt"  =>$datadt,
        );
        return view('ipanel::materi_pembelajaran.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($getid)
    {
        $data_get = DB::table('ms_pembelajaran')->where('pmPermalink', $getid)->first();
        $data=array(
            "data"=>$data_get,
            "summernote"=>array(
                array(
                    "class"=>".summernote",
                    "height"=>200
                )
            ),
            "kategori"  =>DB::table('ms_pembelajaran_categori')->get(),
            "form_ajax_upload"=>array(
                "theid"=>"#materi_pembelajaran",
                "thebutton"=>".btn-submit"
            ),
            "file_upload_theme_two" => "file_upload_theme_two",
        );
        return view('ipanel::materi_pembelajaran.edit',['data'=>$data]);
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
            'matcat'=>'required',
            'mattitle'=>'required',
            'matfile' => 'image|mimes:jpeg,png,jpg|max:2048',
            'matdesc'=>'required',
            'matestimate'=>'required|numeric',
        ], [
            'matcat.required' => 'Kolom Judul Wajib Di isi.',
            'matdesc.required' => 'Kolom Keterangan Wajib Di isi.',
        ]);

        
        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            $data_get = DB::table('ms_pembelajaran')->where('pmPermalink', $id)->first();
            $data['image']=$data_get->pmImage;
            $path = storage_path("app/public/documents/materi_pembelajaran/");
            
            !is_dir($path) &&
                mkdir($path, 0777, true);
            
            if($file = $request->file('matfile')) {
                if($request->file('matfile')){
                    $file= $request->file('matfile');
                    $filename= date('YmdHi')."_".preg_replace('/\s+/', '-',(strtolower($file->getClientOriginalName())));
                    $file->move(public_path('assets/documents/materi_pembelajaran/'), $filename);
                    $data['image']= $filename;

                    @unlink(public_path('assets/documents/materi_pembelajaran/').$data_get->catImage);
                }
            }

            $mat_permalink = preg_replace('/\s+/', '-',(strtolower($request->mattitle)));
            $save_data=DB::table('ms_pembelajaran')->where('pmPermalink', $id)->update([
                'catId'             => $request->matcat,
                'pmTitle'           => $request->mattitle,
                'pmPermalink'       => $mat_permalink,
                'pmImage'           => $data['image'],
                'pmDescription'     => $request->matdesc,
                'pmEstimation'      => $request->matestimate,
                'pmStatus'          => 'y',
            ]);
            
            return response()->json(['success'=>route('mpembelajaran.index')]);
            exit;
            if($save_data){
                return response()->json(['success'=>route('mpembelajaran.index')]);
                exit;
            }else{
                return response()->json(['errors'=>"Gagal menyimpan data..!".$save_data]);
                exit;
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $data_get = DB::table('ms_pembelajaran')->where('pmPermalink', $id)->first();
        if(($data_get->catId)>0){
            $run_query=DB::table('ms_pembelajaran')->where('pmPermalink', $id)->delete();
            if($run_query){
                @unlink(public_path('assets/documents/materi_pembelajaran/').$data_get->pmImage);
            }
            return response()->json(['success'=>route('mpembelajaran.index')]);
            exit;
        }else{

        }
    }

    // #UNTUK SUB MATERI
    public function tambahdata($getid)
    {
        print $getid; exit;
        $data=array();
        return view('ipanel::materi_pembelajaran.tambahdata',['data'=>$data]);
    }

    public function create_submateri($getid)
    {
        $data_get = DB::table('ms_pembelajaran')
                        ->select('id as pmId', 'pmPermalink','pmTitle')
                        ->where('pmPermalink', $getid)
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
                "theid"             =>"#detail_pembelajaran",
                "thebutton"         =>".btn-submit"
            ),
            "file_upload_theme_two" => "file_upload_theme_two",
        );
        return view('ipanel::materi_pembelajaran.create_submateri',['data'=>$data]);
    }

    public function store_submateri(Request $request,$getid)
    {
        $data_get = DB::table('ms_pembelajaran')
                        ->select('id as pmId', 'pmPermalink','pmTitle')
                        ->where('pmPermalink', $getid)
                        ->first();

        $validator = \Validator::make($request->all(), [
            'pdsubmateri'=>'required',
            'pddesc'=>'required',
            'pdfile' => 'mimes:ppt,pdf|max:2048',
            'pdurl'=>'required',
            'pdestimate'=>'required|numeric',
        ], [
            'pdsubmateri.required' => 'Kolom Judul Wajib Di isi.',
            'pddesc.required' => 'Kolom Keterangan Wajib Di isi.',
        ]);


        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            $data['files']="";
            $path = storage_path("app/public/documents/submateri_pembelajaran/");
            
            !is_dir($path) &&
                mkdir($path, 0777, true);
            
            if($file = $request->file('pdfile')) {              
                if($request->file('pdfile')){
                    $file= $request->file('pdfile');
                    $filename= date('YmdHi')."_".preg_replace('/\s+/', '-',(strtolower($file->getClientOriginalName())));
                    $move_file=$file-> move(public_path('assets/documents/submateri_pembelajaran/'), $filename);
                    $data['files']= $filename;
                }
            }

            $mat_permalink = preg_replace('/\s+/', '-',(strtolower($request->pdsubmateri)));
            $save_data=DB::table('ms_pembelajaran_detail')->insert([
                'pbId'          => $data_get->pmId,
                'pdTitle'       => $request->pdsubmateri,
                'pdPermalink'   => $mat_permalink,
                'pdImage'       => "none",
                'pdFile'        => $data['files'],
                'pdVideo'       => $request->pdurl,
                'pdDescription' => $request->pddesc,
                'pdDuration'    => $request->pdestimate,
                'pdStatus'      => 'y',
            ]);
            if($save_data){
                return response()->json(['success'=>route('mpembelajaran.show',$data_get->pmPermalink)]);
                exit;
            }else{
                return response()->json(['errors'=>"Gagal menyimpan data..!"]);
                exit;
            }
        }
    }   
    public function destroy_submateri($id)
    {
        $data_get = DB::table('ms_pembelajaran_detail')
                        ->leftJoin('ms_pembelajaran', 'ms_pembelajaran.id', '=', 'ms_pembelajaran_detail.pbId')
                        ->where('pdPermalink', $id)
                        ->first();
        if(($data_get->pdId)>0){
            $run_query=DB::table('ms_pembelajaran_detail')->where('pdPermalink', $id)->delete();
            if($run_query){
                @unlink(public_path('assets/documents/submateri_pembelajaran/').$data_get->pdImage);
                @unlink(public_path('assets/documents/submateri_pembelajaran/').$data_get->pdFile);
            }
            return response()->json(['success'=>route('mpembelajaran.show',$data_get->pmPermalink)]);
            exit;
        }else{

        }
    }

    public function edit_submateri($getid)
    {
        $data_get = DB::table('ms_pembelajaran_detail')->where('pdPermalink', $getid)->first();
        $data=array(
            "data"=>$data_get,
            "summernote"=>array(
                array(
                    "class"=>".summernote",
                    "height"=>200
                )
            ),
            "form_ajax_upload"=>array(
                "theid"=>"#detail_pembelajaran",
                "thebutton"=>".btn-submit"
            ),
            "file_upload_theme_two" => "file_upload_theme_two",
        );
        return view('ipanel::materi_pembelajaran.edit_submateri',['data'=>$data]);
    }
    public function update_submateri(Request $request, $id)
    {
        // print "<pre>";
        // print_r($id);
        // exit;
        
        $validator = \Validator::make($request->all(), [
            'pdsubmateri'=>'required',
            'pddesc'=>'required',
            'pdfile' => 'mimes:ppt,pdf|max:2048',
            'pdurl'=>'required',
            'pdestimate'=>'required|numeric',
        ], [
            'pdsubmateri.required' => 'Kolom Judul Wajib Di isi.',
            'pddesc.required' => 'Kolom Keterangan Wajib Di isi.',
        ]);

        
        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            $data_get = DB::table('ms_pembelajaran_detail')
                        ->leftJoin('ms_pembelajaran', 'ms_pembelajaran.id', '=', 'ms_pembelajaran_detail.pbId')
                        ->where('pdPermalink', $id)
                        ->first();
            // print "<pre>";
            // print_r($data_get);
            // exit;            
            $data['files']=$data_get->pdFile;
            $path = storage_path("app/public/documents/submateri_pembelajaran/");
            
            !is_dir($path) &&
                mkdir($path, 0777, true);
            
            if($file = $request->file('pdfile')) {
                if($request->file('pdfile')){
                    $file= $request->file('pdfile');
                    $filename= date('YmdHi')."_".preg_replace('/\s+/', '-',(strtolower($file->getClientOriginalName())));
                    $file->move(public_path('assets/documents/submateri_pembelajaran/'), $filename);
                    $data['files']= $filename;

                    @unlink(public_path('assets/documents/submateri_pembelajaran/').$data_get->pdFile);
                }
            }

            $mat_permalink = preg_replace('/\s+/', '-',(strtolower($request->pdsubmateri)));
            $save_data=DB::table('ms_pembelajaran_detail')->where('pdPermalink', $id)->update([
                'pdTitle'       => $request->pdsubmateri,
                'pdPermalink'   => $mat_permalink,
                'pdImage'       => "none",
                'pdFile'        => $data['files'],
                'pdVideo'       => $request->pdurl,
                'pdDescription' => $request->pddesc,
                'pdDuration'    => $request->pdestimate,
                'pdStatus'      => 'y',
            ]);
            
            // return response()->json(['success'=>route('mpembelajaran.show')]);
            // exit;
            if($save_data){
                return response()->json(['success'=>route('mpembelajaran.show',$data_get->pmPermalink)]);
                exit;
            }else{
                return response()->json(['errors'=>"Gagal menyimpan data..!"]);
                exit;
            }
        }
    }
}
