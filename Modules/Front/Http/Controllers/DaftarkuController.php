<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;

class DaftarkuController extends Controller
{
    public $table_pengetahuan           ="pengetahuan";
    public $table_pengetahuan_activity  ="pengetahuan_activity";
    public $table_pengetahuan_category  ="pengetahuan_category";
    public $table_pengetahuan_content   ="pengetahuan_content";
    public $table_pengetahuan_like      ="pengetahuan_like";
    public $table_pengetahuan_pinned    ="pengetahuan_pinned";
    public $table_pengetahuan_readlist  ="pengetahuan_readlist";
    public $table_pengetahuan_readlist_content ="pengetahuan_readlist_content";
    
    public $paging                      =20;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('front::index');
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
    public function show($id)
    {
        return view('front::show');
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
        $data_get = DB::table($this->table_pengetahuan_like)
                            ->where('lkId', $id)
                            ->first();
        if(!$data_get){                    
            return response()->json(['errors'=>"Gagal Menghapus Data"]);
            exit;
        }else{ 
            $run_queryx=DB::table($this->table_pengetahuan_like)->where('lkId', $data_get->lkId)->delete();
            if($run_queryx){
                #return response()->json(['success'=>route('daftarku/disukai','disukai')]);#daftarku/disukai/sukai
                return redirect()->to('/front/daftarku/disukai/sukai');
                exit;
            }else{
                return response()->json(['errors'=>"Gagal Menghapus Data.."]);
                exit;
            }
        }
    }

    public function disukai(request $request)
    {
        ##TEST USER LOGIN SESSION...........................................
        // $USER_LOGIN = [
        //     "ID"    =>5,
        //     "NAME"  =>"Alesha Farzana Rohman",
        //     "AVATAR"=>"https://bootdey.com/img/Content/avatar/avatar5.png",
        //     "NIP "  =>"199002132023211016",
        // ];
        // $request->session()->put('USER_LOGIN', $USER_LOGIN);
        
        $data_get = DB::table($this->table_pengetahuan_like)
                        ->select($this->table_pengetahuan.".pgId",$this->table_pengetahuan.".pgImage",$this->table_pengetahuan.".pgType",$this->table_pengetahuan.".pgTitle",$this->table_pengetahuan.".pgPermalink",$this->table_pengetahuan.".pgTimePost",$this->table_pengetahuan.".pgDescription",$this->table_pengetahuan.".pgEstimation",$this->table_pengetahuan.".pgViewed",
                                    $this->table_pengetahuan_category.".catId",$this->table_pengetahuan_category.".catName",$this->table_pengetahuan_category.".catPermalink",
                                    //$this->table_pengetahuan_content.".pcContentType",$this->table_pengetahuan_content.".pcText",$this->table_pengetahuan_content.".pcVideo",$this->table_pengetahuan_content.".pcDocuments",
                                    $this->table_pengetahuan_like.".*"
                                    )
                        ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_like.'.pgId', '=', $this->table_pengetahuan.'.pgId')            
                        ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                        //->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                        //->leftJoin($this->table_user, $this->table_pengetahuan.'.id_user', '=', $this->table_user.'.id')
                        ->where($this->table_pengetahuan_like.'.id_user', session()->get('USER_LOGIN.ID'))
                        ->orderBy($this->table_pengetahuan_like.'.created_at', 'DESC')
                        ->paginate($this->paging);
        $data=array(
            "data"=>$data_get,
        );
        
        if(session()->get('USER_LOGIN.VERIFIED')=="y"){
            return view('front::daftarku.disukai',['data'=>$data]);
        }else{
            return view('front::unverified.index');
        }
    }

    public function ditandai(request $request)
    {
        ##TEST USER LOGIN SESSION...........................................
        // $USER_LOGIN = [
        //     "ID"    =>5,
        //     "NAME"  =>"Alesha Farzana Rohman",
        //     "AVATAR"=>"https://bootdey.com/img/Content/avatar/avatar5.png",
        //     "NIP "  =>"199002132023211016",
        // ];
        // $request->session()->put('USER_LOGIN', $USER_LOGIN);
        
        $data_get = DB::table($this->table_pengetahuan_pinned)
                        ->select($this->table_pengetahuan.".pgId",$this->table_pengetahuan.".pgImage",$this->table_pengetahuan.".pgType",$this->table_pengetahuan.".pgTitle",$this->table_pengetahuan.".pgPermalink",$this->table_pengetahuan.".pgTimePost",$this->table_pengetahuan.".pgDescription",$this->table_pengetahuan.".pgEstimation",$this->table_pengetahuan.".pgViewed",
                                    $this->table_pengetahuan_category.".catId",$this->table_pengetahuan_category.".catName",$this->table_pengetahuan_category.".catPermalink",
                                    //$this->table_pengetahuan_content.".pcContentType",$this->table_pengetahuan_content.".pcText",$this->table_pengetahuan_content.".pcVideo",$this->table_pengetahuan_content.".pcDocuments",
                                    $this->table_pengetahuan_pinned.".*"
                                    )
                        ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_pinned.'.pgId', '=', $this->table_pengetahuan.'.pgId')            
                        ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                        //->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                        //->leftJoin($this->table_user, $this->table_pengetahuan.'.id_user', '=', $this->table_user.'.id')
                        ->where($this->table_pengetahuan_pinned.'.id_user', session()->get('USER_LOGIN.ID'))
                        ->orderBy($this->table_pengetahuan_pinned.'.created_at', 'DESC')
                        ->paginate($this->paging);
        $data=array(
            "data"=>$data_get,
        );
        
        if(session()->get('USER_LOGIN.VERIFIED')=="y"){
            return view('front::daftarku.ditandai',['data'=>$data]);
        }else{
            return view('front::unverified.index');
        }
    }

    public function daftar_baca(request $request)
    {
        $data_get = DB::table($this->table_pengetahuan_readlist)
                        ->select($this->table_pengetahuan.".pgId",$this->table_pengetahuan.".pgImage",$this->table_pengetahuan.".pgType",$this->table_pengetahuan.".pgTitle",$this->table_pengetahuan.".pgPermalink",$this->table_pengetahuan.".pgTimePost",$this->table_pengetahuan.".pgDescription",$this->table_pengetahuan.".pgEstimation",$this->table_pengetahuan.".pgViewed",
                                    $this->table_pengetahuan_category.".catId",$this->table_pengetahuan_category.".catName",$this->table_pengetahuan_category.".catPermalink",
                                    //$this->table_pengetahuan_content.".pcContentType",$this->table_pengetahuan_content.".pcText",$this->table_pengetahuan_content.".pcVideo",$this->table_pengetahuan_content.".pcDocuments",
                                    $this->table_pengetahuan_readlist.".*"
                                    )
                        ->leftJoin($this->table_pengetahuan_readlist_content, $this->table_pengetahuan_readlist.'.rlId', '=', $this->table_pengetahuan_readlist_content.'.rlId')          
                        ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_readlist_content.'.pgId')
                        ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                        //->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')  
                        //->leftJoin($this->table_user, $this->table_pengetahuan.'.id_user', '=', $this->table_user.'.id')
                        ->where($this->table_pengetahuan_readlist.'.id_user', session()->get('USER_LOGIN.ID'))
                        ->orderBy($this->table_pengetahuan_readlist_content.'.created_at', 'DESC')
                        ->paginate($this->paging);
        $data=array(
            "data"=>$data_get,
        );
        
        if(session()->get('USER_LOGIN.VERIFIED')=="y"){
            return view('front::daftarku.daftar_baca',['data'=>$data]);
        }else{
            return view('front::unverified.index');
        }
    }
}
