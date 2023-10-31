<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;
use Modules\Ipanel\Entities\PengetahuanCategoryModel;
use Modules\Ipanel\Entities\PengetahuanModel;

use Illuminate\Support\Facades\Input;

class RiwayatBacaController extends Controller
{
    public $table_pengetahuan           ="pengetahuan";
    public $table_pengetahuan_activity  ="pengetahuan_activity";
    public $table_pengetahuan_category  ="pengetahuan_category";
    public $table_pengetahuan_content   ="pengetahuan_content";
    public $paging                      =20;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        ##TEST USER LOGIN SESSION...........................................
        // $USER_LOGIN = [
        //     "ID"    =>5,
        //     "NAME"  =>"Alesha Farzana Rohman",
        //     "AVATAR"=>"https://bootdey.com/img/Content/avatar/avatar5.png",
        //     "NIP "  =>"199002132023211016",
        // ];
        // $request->session()->put('USER_LOGIN', $USER_LOGIN);
        $search = Input::get('search');
        $query = DB::table($this->table_pengetahuan_activity)
                        ->select($this->table_pengetahuan.".pgId",$this->table_pengetahuan.".pgImage",$this->table_pengetahuan.".pgType",$this->table_pengetahuan.".pgTitle",$this->table_pengetahuan.".pgPermalink",$this->table_pengetahuan.".pgTimePost",$this->table_pengetahuan.".pgDescription",$this->table_pengetahuan.".pgEstimation",$this->table_pengetahuan.".pgViewed",
                                    $this->table_pengetahuan_category.".catId",$this->table_pengetahuan_category.".catName",$this->table_pengetahuan_category.".catPermalink",
                                    $this->table_pengetahuan_activity.".*"
                                    )
                        ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_activity.'.refId', '=', $this->table_pengetahuan.'.pgPermalink')            
                        ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                        ->where($this->table_pengetahuan_activity.'.id_user', session()->get('USER_LOGIN.ID'))
                        ->orderBy($this->table_pengetahuan_activity.'.created_at', 'DESC');
                
        if($search){
            $query=$query->where("pgTitle","LIKE","%".$search."%");
        }
        $data_get=$query->paginate($this->paging);        
        $data=array(
            "data"=>$data_get,
            "search"=>$search ? $search :'',
            "new_ajax"  =>"

            ",
        );
        
        if(session()->get('USER_LOGIN.VERIFIED')=="y"){
            return view('front::riwayat_baca.index',['data'=>$data]);
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
        return view('front::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show()
    {
        ##TEST USER LOGIN SESSION...........................................
        // $USER_LOGIN = [
        //     "ID"=>5,
        //     "NAME"=>"Alesha Farzana Rohman",
        //     "AVATAR"=>"https://bootdey.com/img/Content/avatar/avatar5.png",
        // ];
        // $request->session()->put('USER_LOGIN', $USER_LOGIN);

        $data_get = DB::table($this->table_pengetahuan_activity)
                        ->select($this->table_pengetahuan.".pgId",$this->table_pengetahuan.".pgType",$this->table_pengetahuan.".pgTitle",$this->table_pengetahuan.".pgPermalink",$this->table_pengetahuan.".pgTimePost",$this->table_pengetahuan.".pgDescription",$this->table_pengetahuan.".pgEstimation",$this->table_pengetahuan.".pgViewed",
                                    $this->table_pengetahuan_category.".catId",$this->table_pengetahuan_category.".catName",$this->table_pengetahuan_category.".catPermalink",
                                    $this->table_pengetahuan_content.".pcContentType",$this->table_pengetahuan_content.".pcText",$this->table_pengetahuan_content.".pcVideo",$this->table_pengetahuan_content.".pcDocuments",$this->table_user.".name"
                                    )
                        ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_activity.'.pgId', '=', $this->table_pengetahuan_activity.'.pgId')            
                        ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                        ->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                        ->leftJoin($this->table_user, $this->table_pengetahuan.'.id_user', '=', $this->table_user.'.id')
                        ->where('id_user', )
                        ->first();

        $data=array(
            "data"=>array(),
            "new_ajax"  =>"

            ",
        );
        return view('front::riwayat_baca.show',['data'=>$data]);
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
        
        $data_get = DB::table($this->table_pengetahuan_activity)
                            ->where('paId', $id)
                            ->first();
        if(!$data_get){                    
            return response()->json(['errors'=>"Gagal Menghapus Data"]);
            exit;
        }else{ 
            $run_queryx=DB::table($this->table_pengetahuan_activity)->where('paId', $data_get->paId)->delete();
            if($run_queryx){
                return response()->json(['success'=>route('riwayat_baca.index')]);
                exit;
            }else{
                return response()->json(['errors'=>"Gagal Menghapus Data.."]);
                exit;
            }
        }
    }
}
