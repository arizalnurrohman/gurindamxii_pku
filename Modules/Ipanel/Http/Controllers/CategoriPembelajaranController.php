<?php

namespace Modules\Ipanel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ipanel\Entities\ModelCategoriPembelajaran;
use Modules\Ipanel\Entities\ModelPembelajaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use App\Helper\ImageManager;
#use Intervention\Image\Facades\Image as Image;
use Spatie\Permission\Traits\HasRoles;

class CategoriPembelajaranController extends Controller
{
    use ImageManager;
    use HasRoles;

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function __construct()
    {
        #$this->middleware(['role_or_permission:useadministratorr|view CategoriPembelajaranController']);
    }
    public function index()
    {
        
        # $categori=CategoriPembelajaranController::all();
        # $abcdef=array("aa"=>1,"xxx"=>2);
        // $query      = DB::table('ms_pembelajaran_categori');
        // print $_GET['search']."<br>";
        // if(isset($_GET['search'])){
        //     $query   =$query->where('catName',"=",$_GET['search']);
        // }
        // $query      =$query->toSql();
        // dd($query);exit;
        if(isset($_GET['search'])){
            $query      = DB::table('ms_pembelajaran_categori')->where('catName',"like","%".$_GET['search']."%")->paginate(10);
        }else{
            $query      = DB::table('ms_pembelajaran_categori')->paginate(10);
        }
        return view('ipanel::categori_pembelajaran.index',['categori_pembelajaran'=>$query]);#,['categori_pembelajaran'=>$query]
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
                "theid"=>"#categori_pembelajaran",
                "thebutton"=>".btn-submit"
            ),
            "file_upload_theme_two" => "file_upload_theme_two",
        );
        return view('ipanel::categori_pembelajaran.create',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    #public function store(Request $request): JsonResponse
    {
        // print "<pre>";
        // print_r($_POST);
        // print_r($_FILES);
        // exit;
        #catId 	catName 	catPermalink 	catImage 	catDescription
        // $req=$request->validate([
        //     'pername'=>'required',
        //     'perdesc'=>'required',
        // ]);

        /*
        $validator = Validator::make($request->all(), [
            'pername'=>'required',
            'perdesc'=>'required',
        ]);*/
        
        // $validator = Validator::make($request->all(), [
        //     'pername'=>'required',
        //     'perdesc'=>'required',
        // ]);
        
        

        // $request->validate([
        //     'pername'=>'required',
        //     'perdesc'=>'required',
        // ]);

        // CategoriPembelajaranController::create([
        //     'catName' => $request->pername,
        //     'catDescription' => $request->perdesc,
        // ]);
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
            // $filename = request('image')->getClientOriginalName();
            // request()->file('image')->move(public_path() . '/images/' , $filename);

            /*
            message	"Unable to create a directory at 
            E:\\xampp\\htdocs\\pembelajaran\\storage\\app/public\\E:/xampp/htdocs/pembelajaran/public/assets/documents."
            */
            $data['image']="";;
            $path = storage_path("app/public/documents/kategori_pembelajaran/");
            
            !is_dir($path) &&
                mkdir($path, 0777, true);
            
            if($file = $request->file('perfile')) {
                // print_r($path);
                // exit;
                // $fileData = $this->uploads($file,$path);
                // Image::create([
                //     'name' => $fileData['fileName'],
                //     'type' => $fileData['fileType'],
                //     'path' => $fileData['filePath'],
                //     'size' => $fileData['fileSize']
                // ]);

               # $data= new ModelCategoriPembelajaran();

                if($request->file('perfile')){
                    $file= $request->file('perfile');
                    // print "<pre>";
                    // print_r($file);
                    // exit;
                    $filename= date('YmdHi')."_".preg_replace('/\s+/', '-',(strtolower($file->getClientOriginalName())));
                    #$file-> move(public_path('public/assets/documents/kategori_pembelajaran/'), $filename);
                    $file-> move(public_path('assets/documents/kategori_pembelajaran/'), $filename);
                    $data['image']= $filename;
                }
                // print "<pre>";
                // print_r($file);
                // #$data->save();
                // exit;
            }
           
            #SSAVE DATA
            #CategoriPembelajaranController::create($request->all());
            #ModelCategoriPembelajaran::create($request->all());

            $cat_title = preg_replace('/\s+/', '-',(strtolower($request->pername)));

            DB::table('ms_pembelajaran_categori')->insert([
                'catName'           => $request->pername,
                'catPermalink'      => $cat_title,
                'catDescription'    => $request->perdesc,
                'catImage'          => $data['image'],
            ]);

            return response()->json(['success'=>route('categoripembelajaran.index')]);
            exit;
        }

        #return response()->json(['success' => 'Post created successfully.']);
        // return response()->json([
        //     'status' => 200,
        //     'message' => 'Crew Education Has Been Added'
        // ]);

        
        // // Check validation failure
        // if ($validator->fails()) {
        //     return response()->json(['error'=>$validator->messages()]);
        // }
    
        // // Check validation success
        // if ($validator->passes()) {
        //     return response()->json(['success'=>"yey berhasil"]);
        // }
    
        // // Retrieve errors message bag
        // $errors = $validator->errors();
        
        // #SSAVE DATA
        // Book::create($request->all());

        // #REDIRECT RETURN HALAMAN AWAL
        // return redirect()->route('books.index')->with('success','book added successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('ipanel::categori_pembelajaran.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($getid)
    {
       # $datax = ModelCategoriPembelajaran::find($getid);
        #$data_get=DB::table('ms_pembelajaran_categori')->get(); 
        $data_get = DB::table('ms_pembelajaran_categori')->where('catPermalink', $getid)->first();
        //  print "<pre>";
        // print_r($data_get);
        //  exit;
        $data=array(
            "data"=>$data_get,
            "summernote"=>array(
                array(
                    "class"=>".summernote",
                    "height"=>200
                )
            ),
            "form_ajax_upload"=>array(
                "theid"=>"#categori_pembelajaran",
                "thebutton"=>".btn-submit"
            ),
            "file_upload_theme_two" => "file_upload_theme_two",
        );
        return view('ipanel::categori_pembelajaran.edit',['data'=>$data]);
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
            // print "<pre>";
            // #print_r($request);
            // print_r($id);
            // exit;
            $data_get = DB::table('ms_pembelajaran_categori')->where('catPermalink', $id)->first();
            // print "<pre>";
            // #print_r($request);
            // print_r($data_get);
            // exit;
            $data['image']=$data_get->catImage;
            $path = storage_path("app/public/documents/kategori_pembelajaran/");
            
            !is_dir($path) &&
                mkdir($path, 0777, true);
            
            if($file = $request->file('perfile')) {
                if($request->file('perfile')){
                    $file= $request->file('perfile');
                    $filename= date('YmdHi')."_".preg_replace('/\s+/', '-',(strtolower($file->getClientOriginalName())));
                    $file->move(public_path('assets/documents/kategori_pembelajaran/'), $filename);
                    $data['image']= $filename;

                    @unlink(public_path('assets/documents/kategori_pembelajaran/').$data_get->catImage);
                }
            }

            $cat_title = preg_replace('/\s+/', '-',(strtolower($request->pername)));
            
            $run_query=DB::table('ms_pembelajaran_categori')->where('catPermalink', $id)->update([
                'catName'           => $request->pername,
                'catPermalink'      => $cat_title,
                'catDescription'    => $request->perdesc,
                'catImage'          => $data['image'],
            ]);
            
            return response()->json(['success'=>route('categoripembelajaran.index')]);
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
        #$post = ModelCategoriPembelajaran::findOrFail($id);
        $data_get = DB::table('ms_pembelajaran_categori')->where('catPermalink', $id)->first();
        if(($data_get->catId)>0){
            $run_query=DB::table('ms_pembelajaran_categori')->where('catPermalink', $id)->delete();
            if($run_query){
                @unlink(public_path('assets/documents/kategori_pembelajaran/').$data_get->catImage);
            }
            return response()->json(['success'=>route('categoripembelajaran.index')]);
            exit;
        }else{

        }
    }

    public function nextid(){
        $order =DB::table('pengetahuan_category')->max('catId');
		return ($order + 1);
    }
}
