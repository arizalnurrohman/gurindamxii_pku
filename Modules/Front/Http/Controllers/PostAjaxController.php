<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PostAjaxController extends Controller
{
    public $table_pengetahuan                   ="pengetahuan";
    public $table_pengetahuan_like              ="pengetahuan_like";
    public $table_pengetahuan_pinned            ="pengetahuan_pinned";
    public $table_pengetahuan_readlist          ="pengetahuan_readlist";
    public $table_pengetahuan_readlist_content  ="pengetahuan_readlist_content";

    public $table_newsletter_subscriber         ="newsletter_subscriber";
    
    // public static function getLogin()
    // {
    //     if (Auth::check()) {
    //         if(auth()->user()->hasRole('user')=='user'){
    //             $log_data=array(
    //                 "ID"        =>auth()->user()->id,
    //                 "NAME"      =>auth()->user()->name,
    //                 "EMAIL"     =>auth()->user()->email,
    //                 "ROLES"      =>array(
    //                     "ID"    =>auth()->user()->role,
    //                 "NAME"  =>(auth()->user()->hasRole('user')=='user' ? 'user' : ''),
    //                 ),
    //                 "ID"        =>auth()->user()->id,
    //             );
    //             return $log_data;
    //         }else{
    //             return false;
    //         }
    //     }else{
    //         return false;
    //     }
    // }
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
        #$CHECK_LOGIN=$this->getLogin();
        
        //
        // print "<pre>";
        // print_r($CHECK_LOGIN);
        // print_r($_POST);
        // exit;
        #CHECK IP FIRST-------------------------------------------------------
        if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
            $ip_access = $_SERVER['HTTP_CLIENT_IP'];  
        }  
        //if user is from the proxy  
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
            $ip_access =$_SERVER['HTTP_X_FORWARDED_FOR'];  
        }  
        //if user is from the remote address  
        else{  
            $ip_access =$_SERVER['REMOTE_ADDR'];  
        } 
        $ip_address_access=getenv($ip_access);

        $data_pg    = DB::table($this->table_pengetahuan)->where('pgPermalink', $request->id)->first();
        if($request->type_options ==="like"){
            $note_response="Sukai";
        }
        if($request->type_options ==="pin"){
            $note_response="Tandai";
        }
        if($request->type_options ==="read_later"){
            $note_response="Daftar Baca";
        }
        if(session()->get('USER_LOGIN')){
            $id_user    =session()->get('USER_LOGIN.ID');
            if($request->type_options ==="like"){
                $note_response="Sukai";
                $data_check = DB::table($this->table_pengetahuan_like)->where('pgId', $data_pg->pgId)->where('id_user', $id_user)->count();

                $payload=[
                    'id_user'     => $id_user,
                    'pgId'        => $data_pg->pgId,
                    'lkIP'        => $ip_access,
                    'created_at'  => date("Y-m-d H:i:s"),
                ];
                $table_name_for_saving=$this->table_pengetahuan_like;
            }
            if($request->type_options ==="pin"){
                $note_response="Tandai";
                $data_check = DB::table($this->table_pengetahuan_pinned)->where('pgId', $data_pg->pgId)->where('id_user', $id_user)->count();
                
                $payload=[
                    'id_user'     => $id_user,
                    'pgId'        => $data_pg->pgId,
                    'created_at'  => date("Y-m-d H:i:s"),
                ];
                $table_name_for_saving=$this->table_pengetahuan_pinned;
            }
            if($request->type_options ==="read_later"){
                $note_response="Daftar Baca";

                $data_check     = DB::table($this->table_pengetahuan_readlist)
                                            ->leftJoin($this->table_pengetahuan_readlist_content, $this->table_pengetahuan_readlist.'.rlId', '=', $this->table_pengetahuan_readlist_content.'.rlId')
                                            ->where($this->table_pengetahuan_readlist_content.'.pgId', $data_pg->pgId)
                                            ->where($this->table_pengetahuan_readlist.'.id_user', $id_user)
                                            ->count();
                
                $query_check    = DB::table($this->table_pengetahuan_readlist)
                                            ->select("rlId")
                                            ->where('id_user', $id_user);
                $data_readlist_id=$query_check->first();
                if($query_check->count()==0){
                    #rlId 	id_user 	rlTitle 	rlPermalink 	rlDescription 	created_at 	updated_at 	
                    $next_readlist=$this->nextid("pengetahuan_readlist","rlId");
                    $payload_readlist=[
                        'rlId'          =>$next_readlist,
                        'id_user'       =>$id_user,
                        'rlTitle'       =>"BACA_NANTI",
                        'rlPermalink'   =>$next_readlist."-".\Str::slug("BACA NANTI"),
                        'rlDescription' =>'Baca Nanti Description',
                        'created_at'    =>date("Y-m-d H:i:s"),
                    ];
                    $save_rltetc=DB::table($this->table_pengetahuan_readlist)->insert($payload_readlist);

                    $id_read_list=$next_readlist;
                }else{
                    $id_read_list=$data_readlist_id->rlId;
                }
                $payload=[
                    'id_user'     => $id_user,
                    'rlId'        => $id_read_list,
                    'pgId'        => $data_pg->pgId,
                    'created_at'  => date("Y-m-d H:i:s"),
                ];                            
                $table_name_for_saving=$this->table_pengetahuan_readlist_content;
            }
            
            if($data_check==0){
                $save_pinetc=DB::table($table_name_for_saving)->insert($payload);
                
                $response=[
                    'success'   =>"Berhasil",
                    "ID"        =>$request->id,
                    "TITLE"     =>$data_pg->pgTitle,
                    "NOTE"      =>($request->type_options !== "read_later" ? "ke dalam daftar yang anda ".$note_response : "ke dalam Daftar Baca Anda"),
                    "ICON"      =>"/assets/images/check.png",
                ];
            }else{
                $response=[
                    'success'   =>"Gagal",
                    "ID"        =>$request->id,
                    "TITLE"     =>$data_pg->pgTitle,
                    "NOTE"      =>($request->type_options !== "read_later" ? "karena Sudah ada di dalam daftar yang anda ".$note_response : "Karena Sudah ada di dalam Daftar Baca Anda"),
                    "ICON"      =>"/assets/images/cross.png",
                ];
            }
        }else{
            if($request->type_options ==="like"){
                $note_response="Sukai";
                $data_check = DB::table($this->table_pengetahuan_like)
                                  ->where('pgId', $data_pg->pgId)
                                  ->where('lkIP', $ip_access)
                                  ->where('created_at',"LIKE",date('Y-m-d')."%")
                                  ->count();

                $payload=[
                    'id_user'     => 0,
                    'pgId'        => $data_pg->pgId,
                    'lkIP'        => $ip_access,
                    'created_at'  => date("Y-m-d H:i:s"),
                ];
                $table_name_for_saving=$this->table_pengetahuan_like;

                if($data_check==0){
                    $save_pinetc=DB::table($table_name_for_saving)->insert($payload);
                    
                    $response=[
                        'success'   =>"Berhasil",
                        "ID"        =>$request->id,
                        "TITLE"     =>$data_pg->pgTitle,
                        "NOTE"      =>($request->type_options !== "read_later" ? "ke dalam daftar yang anda ".$note_response : "ke dalam Daftar Baca Anda"),
                        "ICON"      =>"/assets/images/check.png",
                    ];
                }else{
                    $response=[
                        'success'   =>"Gagal",
                        "ID"        =>$request->id,
                        "TITLE"     =>$data_pg->pgTitle,
                        "NOTE"      =>($request->type_options !== "read_later" ? "karena anda Sudah melakukan ".$note_response." pada materi ini" : "Karena Sudah ada di dalam Daftar Baca Anda"),
                        "ICON"      =>"/assets/images/cross.png",
                    ];
                }
            }else{
                $response=[
                    'success'   =>"Gagal",
                    "ID"        =>$request->id,
                    "TITLE"     =>$data_pg->pgTitle,
                    "NOTE"      =>"Anda harus <span style='color:#FFC451;font-weight:bold'>Login</span> terlebih dahulu untuk Menambahkan ke dalam ".$note_response,
                    "ICON"      =>"/assets/images/cross.png",
                ];
            }
        }
        // print_r($data_check);
        // exit;

        return response()->json($response);
        exit;
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

    public function nextid($tablename,$fieldname){
        $order =DB::table($tablename)->max($fieldname);
		return ($order + 1);
    }

    public function post_rating(Request $request,$id){
        $response=array("success"=>"ok");
        return response()->json($response);
        exit;
    }

    public function post_newsletter(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'email'=>'required',
        ], [
            'email.required' => 'Kolom email Wajib Di isi.',
        ]);
        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            $data_pg    = DB::table($this->table_newsletter_subscriber)->where('nsubEmail', $request->email)->where('nsubStatus', 'y')->first();
            if($data_pg){
                return response()->json(['errors'=>"Email yang anda masukkan sudah terdaftar.."]);exit;
            }else{
                #nsubId 	nsubEmail 	nsubStatus 	nsubSubsribe 	nsubUnSubsribe 	id_user 	created_at 	updated_at 	
                $payload=[
                    'nsubId'           => $this->nextid("newsletter_subscriber","nsubId"),
                    'nsubPermalink'    =>$this->nextid("newsletter_subscriber","nsubId")."-".sha1($this->nextid("newsletter_subscriber","nsubId")),
                    'nsubEmail'        => $request->email,
                    'nsubStatus'       => 'y',
                    'nsubSubsribe'     => date("Y-m-d H:i:s"),
                    'id_user'          =>0,
                    'created_at'       => date("Y-m-d H:i:s"),
                ];

                $save_subcribe=DB::table($this->table_newsletter_subscriber)->insert($payload);
                if($save_subcribe){
                    return response()->json(['success'=>"Alhamdulillah.."]);exit;
                }else{
                    return response()->json(['errors'=>"Gagal menyimpan data..!"]);exit;
                }
            }
        }
    }
}
