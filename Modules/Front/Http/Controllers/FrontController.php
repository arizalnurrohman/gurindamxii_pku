<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Ipanel\Entities\PengetahuanCategoryModel;
use Modules\Ipanel\Entities\PengetahuanModel;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;


class FrontController extends Controller
{
    
    #use ImageManager;
    public $table_pengetahuan           ="pengetahuan";
    public $table_pengetahuan_content   ="pengetahuan_content";
    public $table_pengetahuan_category  ="pengetahuan_category";
    public $table_pengetahuan_highlight ="pengetahuan_highlight";

    public $table_pengetahuan_like              ="pengetahuan_like";
    public $table_pengetahuan_pinned            ="pengetahuan_pinned";
    public $table_pengetahuan_readlist          ="pengetahuan_readlist";
    public $table_pengetahuan_readlist_content  ="pengetahuan_readlist_content";

    public $assets_pengetahuan          ="public/images/assets_pengetahuan/";
    public $paging                      =12;

    public $id_user                     =5;
    // use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public static function getLogin()
    {
        if (Auth::check()) {
            if(auth()->user()->hasRole('user')=='user'){
                $log_data=array(
                    "ID"        =>auth()->user()->id,
                    "NAME"      =>auth()->user()->name,
                    "EMAIL"     =>auth()->user()->email,
                    "VERIFIED"  =>auth()->user()->verified,
                    "ROLES"     =>array(
                        "ID"    =>auth()->user()->role,
                        "NAME"  =>(auth()->user()->hasRole('user')=='user' ? 'user' : ''),
                    ),
                    "ID"        =>auth()->user()->id,
                );
                if(!session()->get('USER_LOGIN')){
                    Session::put('USER_LOGIN',$log_data);
                }
                return $log_data;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function index(request $request)
    {
        $AUTH_CHECK=$this->getLogin();
        // print "<pre>";
        // print_r($AUTH_CHECK);
        // exit;
        /*
        if (Auth::check()) {
            // if($user->hasRole('user')){
            $id = auth()->user()->id;#Auth::user()->getId();

            if( auth()->user()->role ==2) {   
                print "User dia";
            }else{
                print "admin dia beroah";
            }
            print "<hr>";
            print "user role id: ".auth()->user()->role;
            print "<hr>";
            if(\Illuminate\Support\Facades\Auth::user()->hasRole('user')  == 'user'){
                print "user";
            }
            print "<hr>";
            if(\Illuminate\Support\Facades\Auth::user()->hasRole('administrator')  == 'administrator'){
                print "admin";
            }
            
            print "<hr>";
            print "udah ada user";
            print "<hr>";
            print "ID login ynya : ".$id;
            print "<hr>";
            print_r($this->getLogin());
            print "<pre>";
            #print_r(auth()->user());
            print_r(auth()->user());
            print "</pre>";
            exit;
        }else{
            print "Belum ada user login";exit;
        }
        */
        #DB::enableQueryLog();
        $query              = DB::table($this->table_pengetahuan)
                                ->select(
                                    $this->table_pengetahuan.".*",
                                    $this->table_pengetahuan_category.".*",
                                    //$this->table_pengetahuan_content.".pcContentType",
                                //    $this->table_pengetahuan_like.".lkId",
                                //    $this->table_pengetahuan_pinned.".pnId",
                                //    $this->table_pengetahuan_readlist.".rlId",
                                )
                                #->select($this->table_pengetahuan_category.".*")
                                #->select($this->table_pengetahuan_content.".pcContentType")
                                ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                                //->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan_content.'.pgId', '=', $this->table_pengetahuan.'.pgId')

                                //->leftJoin($this->table_pengetahuan_like, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_like.'.pgId')
                                //->leftJoin($this->table_pengetahuan_pinned, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_pinned.'.pgId')

                                ->where('pgTimePost',"<",date('Y-m-d H:i:s'));
//->groupby($this->table_pengetahuan_content.'.pgId')
        // if (!Auth::check()) {
        //     $query          =$query->where("pgType","Public");
        // }
        $query              =$query->orderBy('pgId', 'DESC')->paginate($this->paging);

                                
        // $query_log = DB::getQueryLog();
        // print "<pre>";
        // print_r($query_log); exit;                        

        $query_populer      = DB::table($this->table_pengetahuan)
                                ->select(
                                    $this->table_pengetahuan.".*",
                                    $this->table_pengetahuan_category.".*",
                                    //$this->table_pengetahuan_content.".pcContentType"
                                )
                                ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                                //->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                                ->where('pgTimePost',"<",date('Y-m-d H:i:s'))
//->groupby($this->table_pengetahuan.'.pgId')
                                ->orderBy('pgViewed', 'DESC')
                                ->paginate(4);

        $query_category      = DB::table($this->table_pengetahuan_category)
                                ->select("catName","catPermalink")
                                ->where('catStatus','y')
                                ->orderBy('catName', 'ASC')
                                ->get();

        $query_highlight      = DB::table($this->table_pengetahuan_highlight)
                                ->select(
                                    $this->table_pengetahuan.".pgTitle",
                                    $this->table_pengetahuan.".pgPermalink",
                                    $this->table_pengetahuan.".pgImage",
                                    $this->table_pengetahuan.".pgDescription",
                                )
                                ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan_highlight.'.pgId', '=', $this->table_pengetahuan.'.pgId')
                                ->where('hlStart',"<",date('Y-m-d H:i:s'))
                                ->where('hlEnd',">",date('Y-m-d H:i:s'))
                                ->orderBy('hlStart', 'ASC')
                                ->get();                        
        
        $data['data']           =$query;
        $data['populer']        =$query_populer;
        $data['category']       =$query_category;
        $data['highlight']       =$query_highlight;                        
        $data['assets_storage'] ="storage/".$this->assets_pengetahuan;
        
        // print "<pre>";
        // print_r($data);
        // exit;
        return view('front::index',['data_pengetahuan'=>$data]);
        #return view('front::inxdex');
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

    public function post_contactus($id)
    {
        //
        print "hai daa";
        exit;
    }

    public static function get_typecontent($paid){
        $data_img=DB::table("pengetahuan_content","pcId")
                ->select('pcContentType')
                ->where('pgId', $paid)
                ->groupBy('pcContentType')
                ->get();
        return $data_img;   
    }
    public static function get_count($id){
        $query=DB::table("pengetahuan_comment")->select('cmId')->where("pgId",$id)->count();
        return $query;
    }
}
