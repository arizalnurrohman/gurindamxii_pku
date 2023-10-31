<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public $table_pengetahuan           ="pengetahuan";
    public $table_pengetahuan_activity  ="pengetahuan_activity";
    public $table_pengetahuan_category  ="pengetahuan_category";
    public $table_pengetahuan_content   ="pengetahuan_content";
    public $table_pengetahuan_like      ="pengetahuan_like";
    public $table_pengetahuan_pinned    ="pengetahuan_pinned";
    public $table_pengetahuan_readlist  ="pengetahuan_readlist";
    public $table_pengetahuan_readlist_content ="pengetahuan_readlist_content";

    public $table_pengetahuan_read          ="pengetahuan_read";

    public $paging                      =5;
    
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(request $request)
    {
        /*
        print "hahah:";print "<br>";
        echo asset("storage/file.txt");
        print "<br>";
        $contents = Storage::get("file.jpg");
        print "CNT:".$contents;
        print "<br>";
        $exists = Storage::disk("local")->exists("storage/images/assets_pengetahuan/2023/10/20231002/651a303a34f1b.JPG");
        $contents = Storage::get("storage/images/assets_pengetahuan/2023/10/20231002/651a303a34f1b.JPG");
        if($exists){
            print "ada";
        }else{
            print "gak ada";
        }
        print '<br><img src="'.$contents.'">';
        exit;
        */

        ##TEST USER LOGIN SESSION...........................................
        // $USER_LOGIN = [
        //     "ID"    =>5,
        //     "NAME"  =>"Alesha Farzana Rohman",
        //     "AVATAR"=>"https://bootdey.com/img/Content/avatar/avatar5.png",
        //     "NIP "  =>"199002132023211016",
        // ];
        // $request->session()->put('USER_LOGIN', $USER_LOGIN);
        #-------------------------------------------------------------------
        
        $data_like = DB::table($this->table_pengetahuan_like)
                        ->select($this->table_pengetahuan.".pgId",$this->table_pengetahuan.".pgImage",$this->table_pengetahuan.".pgType",$this->table_pengetahuan.".pgTitle",$this->table_pengetahuan.".pgPermalink",$this->table_pengetahuan.".pgTimePost",$this->table_pengetahuan.".pgDescription",$this->table_pengetahuan.".pgEstimation",$this->table_pengetahuan.".pgViewed",
                                    $this->table_pengetahuan_category.".catId",$this->table_pengetahuan_category.".catName",$this->table_pengetahuan_category.".catPermalink",
                                    //$this->table_pengetahuan_content.".pcContentType",$this->table_pengetahuan_content.".pcText",$this->table_pengetahuan_content.".pcVideo",$this->table_pengetahuan_content.".pcDocuments",
                                    $this->table_pengetahuan_like.".*"
                                    )
                        ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_like.'.pgId', '=', $this->table_pengetahuan.'.pgId')            
                        ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                        //->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                        ->where($this->table_pengetahuan_like.'.id_user', session()->get('USER_LOGIN.ID'))
                        ->orderBy($this->table_pengetahuan_like.'.created_at', 'DESC')
                        ->paginate($this->paging);

        $data_pin = DB::table($this->table_pengetahuan_pinned)
                        ->select($this->table_pengetahuan.".pgId",$this->table_pengetahuan.".pgImage",$this->table_pengetahuan.".pgType",$this->table_pengetahuan.".pgTitle",$this->table_pengetahuan.".pgPermalink",$this->table_pengetahuan.".pgTimePost",$this->table_pengetahuan.".pgDescription",$this->table_pengetahuan.".pgEstimation",$this->table_pengetahuan.".pgViewed",
                                    $this->table_pengetahuan_category.".catId",$this->table_pengetahuan_category.".catName",$this->table_pengetahuan_category.".catPermalink",
                                    //$this->table_pengetahuan_content.".pcContentType",$this->table_pengetahuan_content.".pcText",$this->table_pengetahuan_content.".pcVideo",$this->table_pengetahuan_content.".pcDocuments",
                                    $this->table_pengetahuan_pinned.".*"
                                    )
                        ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_pinned.'.pgId', '=', $this->table_pengetahuan.'.pgId')            
                        ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                        //->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                        ->where($this->table_pengetahuan_pinned.'.id_user', session()->get('USER_LOGIN.ID'))
                        ->orderBy($this->table_pengetahuan_pinned.'.created_at', 'DESC')
                        ->paginate($this->paging);

        $data_dbc = DB::table($this->table_pengetahuan_readlist)
                        ->select($this->table_pengetahuan.".pgId",$this->table_pengetahuan.".pgImage",$this->table_pengetahuan.".pgType",$this->table_pengetahuan.".pgTitle",$this->table_pengetahuan.".pgPermalink",$this->table_pengetahuan.".pgTimePost",$this->table_pengetahuan.".pgDescription",$this->table_pengetahuan.".pgEstimation",$this->table_pengetahuan.".pgViewed",
                                    $this->table_pengetahuan_category.".catId",$this->table_pengetahuan_category.".catName",$this->table_pengetahuan_category.".catPermalink",
                                    //$this->table_pengetahuan_content.".pcContentType",$this->table_pengetahuan_content.".pcText",$this->table_pengetahuan_content.".pcVideo",$this->table_pengetahuan_content.".pcDocuments",
                                    $this->table_pengetahuan_readlist.".*"
                                    )
                        ->leftJoin($this->table_pengetahuan_readlist_content, $this->table_pengetahuan_readlist.'.rlId', '=', $this->table_pengetahuan_readlist_content.'.rlId')          
                        ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_readlist_content.'.pgId')
                        ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                        //->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')  
                        ->where($this->table_pengetahuan_readlist.'.id_user', session()->get('USER_LOGIN.ID'))
                        ->orderBy($this->table_pengetahuan_readlist_content.'.created_at', 'DESC')
                        ->paginate($this->paging);
                        
        $data_rwy = DB::table($this->table_pengetahuan_activity)
                        ->select($this->table_pengetahuan.".pgId",$this->table_pengetahuan.".pgImage",$this->table_pengetahuan.".pgType",$this->table_pengetahuan.".pgTitle",$this->table_pengetahuan.".pgPermalink",$this->table_pengetahuan.".pgTimePost",$this->table_pengetahuan.".pgDescription",$this->table_pengetahuan.".pgEstimation",$this->table_pengetahuan.".pgViewed",
                                    $this->table_pengetahuan_category.".catId",$this->table_pengetahuan_category.".catName",$this->table_pengetahuan_category.".catPermalink",
                                    //$this->table_pengetahuan_content.".pcContentType",$this->table_pengetahuan_content.".pcText",$this->table_pengetahuan_content.".pcVideo",$this->table_pengetahuan_content.".pcDocuments",
                                    $this->table_pengetahuan_activity.".*"
                                    )
                        ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_activity.'.refId', '=', $this->table_pengetahuan.'.pgPermalink')            
                        ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                        //->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                        ->where($this->table_pengetahuan_activity.'.id_user', session()->get('USER_LOGIN.ID'))
                        ->orderBy($this->table_pengetahuan_activity.'.created_at', 'DESC')
                        ->paginate($this->paging); 
        
        #COUNT MATERI AND PERCENTAGE
        $querycmateri=DB::table($this->table_pengetahuan_read)
                                ->select("readContent","readActual","pgTitle","pgPermalink")
                                ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_read.'.pgId', '=', $this->table_pengetahuan.'.pgId')
                                ->where($this->table_pengetahuan_read.'.id_user', session()->get('USER_LOGIN.ID'))
                                ->orderby($this->table_pengetahuan_read.".created_at","DESC")
                                ->get();
        $jumlah_content=0;
        $jumlah_readcon=0; 
        $jumlah_readmat=0;                       
        foreach($querycmateri as $kymt=>$kyvl){
            $jumlah_content=$jumlah_content+$kyvl->readContent;
            $jumlah_readcon=$jumlah_readcon+$kyvl->readActual;
            if($kyvl->readActual == $kyvl->readContent){
                $jumlah_readmat=$jumlah_readmat+1;
            }
        }

        $cmateri    =$querycmateri->count();
        
        // print "<pre>";
        // print_r($querycmateri);
        // print_r($cmateri);
        // exit;
        #END COUNT MATERI AND PRECENTAGE

        $data_read=array(
            "total_materi"=>$cmateri,
            "total_persen"=>$jumlah_readmat>0? ($jumlah_readmat/count($querycmateri)*100) : 0 ,#$jumlah_readcon>0 ? ceil(($jumlah_readcon/$jumlah_content)*100) : 0,
            "materi"      =>$querycmateri,
        );
        $data=array(
            "new_ajax"  =>"",
            "dt_like"    =>$data_like,
            "dt_pinned"  =>$data_pin,
            "dt_dfbaca"  =>$data_dbc,
            "dt_riwayat" =>$data_rwy,
            "dt_read"    =>$data_read,
        );
        if(session()->get('USER_LOGIN.VERIFIED')=="y"){
            return view('front::dashboard.index',['data_dashboard'=>$data]);
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
        //
    }
}
