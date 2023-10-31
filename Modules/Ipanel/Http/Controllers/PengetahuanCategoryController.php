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

class PengetahuanCategoryController extends Controller
{
    use ImageManager;
    public $table_pengetahuan              ="pengetahuan";
    public $table_pengetahuan_category     ="pengetahuan_category";

    public $assets_pengetahuan_category    ="images/assets_pengetahuan_category/";#"public/images/assets_pengetahuan_category/";#"app/public/documents/assets_pengetahuan_category/";
    public $paging                         =10;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        #$this->middleware(['role_or_permission:useadministratorr|view pengetahuan_categoryController']);
    }
    public function index()
    {
        
        if(isset($_GET['search'])){
            $query      = DB::table($this->table_pengetahuan_category)->where('catName',"like","%".$_GET['search']."%")->paginate($this->paging);
        }else{
            $query      = DB::table($this->table_pengetahuan_category)->paginate($this->paging);
        }
        $data['data']           =$query;
        $data['assets_storage'] ="storage/".$this->assets_pengetahuan_category;
        
        return view('ipanel::pengetahuan_category.index',['data_category'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data=array(
            "assets_storage"    =>$this->assets_pengetahuan_category,
            "summernote"=>array(
                array(
                    "class"=>".summernote",
                    "height"=>200
                )
            ),
            "form_ajax_upload"=>array(
                "theid"=>"#pengetahuan_category",
                "thebutton"=>".btn-submit"
            ),
            "file_upload_theme_two" => "file_upload_theme_two",
        );
        return view('ipanel::pengetahuan_category.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    #public function store(Request $request): JsonResponse
    {
        // print \Str::slug($request->pername);
        // print "<pre>";
        // print $this->nextid();
        //  exit;
        $validator = \Validator::make($request->all(), [
            'pername'=>'required',
            'perdesc'=>'required',
            'perfile' => 'image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'pername.required' => 'Kolom Nama Kategori Wajib Di isi.',
            'perdesc.required' => 'Kolom Keterangan Wajib Di isi.',
        ]);


        if ($validator->fails()){
            // print_r($validator->errors()->all());exit;
            // print "error";exit;

            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            $data['image']="";;
            $path       = storage_path($this->assets_pengetahuan_category);
            $path_new   ="public/".$this->assets_pengetahuan_category;
            
            // !is_dir($path_new) &&
            //     mkdir($path_new, 0777, true);
            
            if($file = $request->file('perfile')) {
                // if(!is_dir($path_new.date("Y"))){
                //     mkdir($path_new.date("Y"));
                // }
                // if(!is_dir($path_new.date("Y")."/".date("m"))){
                //     mkdir($path_new.date("Y")."/".date("m"));
                // }
                // if(!is_dir($path_new.date("Y")."/".date("m")."/".date("Ymd"))){
                //     mkdir($path_new.date("Y")."/".date("m")."/".date("Ymd"));
                // }

                /*###################################################*/

                $folder_    =date("Y")."/".date("m")."/".date("Ymd")."/";
                
                if($request->file('perfile')){
                    $file= $request->file('perfile');
                    /*
                    #$filename= date('YmdHi')."_".preg_replace('/\s+/', '-',(strtolower($file->getClientOriginalName())));
                    $filename= date('YmdHi')."_".preg_replace('/\s+/', '-',(strtolower($file->getClientOriginalName())));#date('YmdHi')."_".\Str::slug($file->getClientOriginalName());
                    #$file-> move(public_path('assets/documents/assets_pengetahuan_category/'.date("Y")."/".date("m")."/".date("Ymd")), $filename);
                    $file-> move($path.$folder_, $filename);
                    $data['image']= $filename;
                    */
                    $fileNames=uniqid().'.'.$file->getClientOriginalExtension();
                    $file->storeAs($path_new.$folder_,$fileNames);
                    $data['image']=$fileNames;
                }
            }
           
            #SSAVE DATA
            #pengetahuan_categoryController::create($request->all());
            #Modelpengetahuan_category::create($request->all());
            $cat_id    =$this->nextid();
            $cat_title = $cat_id."-".\Str::slug($request->pername);
           
            DB::table($this->table_pengetahuan_category)->insert([
                'catId'             => $cat_id,
                'catName'           => $request->pername,
                'catShort'          =>'',
                'catPermalink'      => $cat_title,
                'catDescription'    => $request->perdesc,
                'catImage'          => $folder_.$data['image'],
                'catStatus'         =>'y',
            ]);

            return response()->json(['success'=>route('pengetahuan_category.index')]);
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
        return view('ipanel::pengetahuan_category.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($getid)
    {
       # $datax = Modelpengetahuan_category::find($getid);
        #$data_get=DB::table($this->table_pengetahuan_category)->get(); 
        $data_get = DB::table($this->table_pengetahuan_category)->where('catPermalink', $getid)->first();
        $data=array(
            "data"=>$data_get,
            "assets_storage"    =>$this->assets_pengetahuan_category,
            "summernote"=>array(
                array(
                    "class"=>".summernote",
                    "height"=>200
                )
            ),
            "form_ajax_upload"=>array(
                "theid"=>"#pengetahuan_category",
                "thebutton"=>".btn-submit"
            ),
            "file_upload_theme_two" => "file_upload_theme_two",
        );
        return view('ipanel::pengetahuan_category.edit',['data'=>$data]);
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
            'pername'=>'required',
            'perdesc'=>'required',
            'perfile' => 'image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'pername.required' => 'Kolom Nama Kategori Wajib Di isi.',
            'perdesc.required' => 'Kolom Keterangan Wajib Di isi.',
        ]);

        
        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            $data_get = DB::table($this->table_pengetahuan_category)->where('catPermalink', $id)->first();
            $data['image']=$data_get->catImage;
            #$path       = storage_path("app/public/documents/assets_pengetahuan_category/");
            $path_new   ="public/".$this->assets_pengetahuan_category;
            
            // !is_dir($path_new) &&
            //     mkdir($path_new, 0777, true);

            // if(!is_dir($path_new.date("Y"))){
            //     mkdir($path_new.date("Y"));
            // }
            // if(!is_dir($path_new.date("Y")."/".date("m"))){
            //     mkdir($path_new.date("Y")."/".date("m"));
            // }
            // if(!is_dir($path_new.date("Y")."/".date("m")."/".date("Ymd"))){
            //     mkdir($path_new.date("Y")."/".date("m")."/".date("Ymd"));
            // }
            /*###################################################*/

            $folder_    =date("Y")."/".date("m")."/".date("Ymd")."/";
            
            if($file = $request->file('perfile')) {
                if($request->file('perfile')){
                    $file= $request->file('perfile');
                    /*
                    $filename= date('YmdHi')."_".preg_replace('/\s+/', '-',(strtolower($file->getClientOriginalName())));
                    $file->move(public_path('assets/documents/assets_pengetahuan_category/'), $filename);
                    $data['image']= $filename;*/

                    $fileNames=uniqid().'.'.$file->getClientOriginalExtension();
                    $file->storeAs($path_new.$folder_,$fileNames);
                    $data['image']=$fileNames;

                    #$delete_file=unlink(asset('storage/images/assets_pengetahuan_category/'.$data_get->catImage));
                    $delete_file=$this->removeImage($this->assets_pengetahuan_category,$data_get->catImage);
                    #@unlink(public_path('assets/documents/assets_pengetahuan_category/').$data_get->catImage);
                }
            }

            $cat_title = preg_replace('/\s+/', '-',(strtolower($request->pername)));
            
            $run_query=DB::table($this->table_pengetahuan_category)->where('catPermalink', $id)->update([
                'catName'           => $request->pername,
                'catPermalink'      => $cat_title,
                'catDescription'    => $request->perdesc,
                'catImage'          => $folder_.$data['image'],
            ]);
            
            return response()->json(['success'=>route('pengetahuan_category.index')]);
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
        #$post = Modelpengetahuan_category::findOrFail($id);
        $data_get = DB::table($this->table_pengetahuan_category)->where('catPermalink', $id)->first();
        if(($data_get->catId)>0){
            $run_query=DB::table($this->table_pengetahuan_category)->where('catPermalink', $id)->delete();
            if($run_query){
                $this->removeImage($this->assets_pengetahuan_category,$data_get->catImage);
            }
            return response()->json(['success'=>route('pengetahuan_category.index')]);
            exit;
        }else{

        }
    }

    public function nextid(){
        $order =DB::table('pengetahuan_category')->max('catId');
		return ($order + 1);
    }

    public function removeImage($folder_,$file_){  
        if(\Storage::exists($folder_.$file_)){
            \Storage::delete($folder_.$file_);
        }else{
            return "Gagal Hapus File";
        }
    }
}
