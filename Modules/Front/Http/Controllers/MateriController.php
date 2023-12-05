<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;
use Modules\Front\Entities\PengetahuanCategoryModel;
use Modules\Front\Entities\PengetahuanModel;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;


class MateriController extends Controller
{
    public $table_pengetahuan               ="pengetahuan";
    public $table_pengetahuan_content       ="pengetahuan_content";
    public $table_pengetahuan_category      ="pengetahuan_category";
    public $table_pengetahuan_comment       ="pengetahuan_comment";
    public $table_user                      ="users";
    public $table_pengetahuan_activity      ="pengetahuan_activity";
    public $table_pengetahuan_read          ="pengetahuan_read";
    public $table_pengetahuan_read_content  ="pengetahuan_read_content";
    public $table_pengetahuan_rating        ="pengetahuan_rating";


    public $table_pengetahuan_readlist              ="pengetahuan_readlist";
    public $table_pengetahuan_readlist_content      ="pengetahuan_readlist_content";

    public $assets_pengetahuan              ="public/images/assets_pengetahuan/";
    public $paging                          =4;
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
                    "ROLES"      =>array(
                        "ID"    =>auth()->user()->role,
                    "NAME"  =>(auth()->user()->hasRole('user')=='user' ? 'user' : ''),
                    ),
                    "ID"        =>auth()->user()->id,
                );
                return $log_data;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
    public function index(Request $request)
    {
        #print $this->variable_panggil; exit;
        /*
        if(app('request')->input('cari_materi') or app('request')->input('cari_filter')){
            $query  = DB::table($this->table_pengetahuan)
                ->select(
                    $this->table_pengetahuan.".*",
                    $this->table_pengetahuan_category.".*",
                )
                ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                ->where('pgTimePost',"<",date('Y-m-d H:i:s'))
                #->where(function (Builder $xquery) {
                #    $xquery->where('pgTitle', 'like', '%'.app('request')->input('cari_materi').'%');
                #})
                ->where('pgTitle', 'like', '%'.app('request')->input('cari_materi').'%')
                ->whereIn('catPermalink', [implode(",",app('request')->input('cari_filter'))])
                ->where('pgTimePost',"<",date('Y-m-d H:i:s'))
                ->orderBy('pgId', 'DESC')
                ->paginate($this->paging);

        }else{
            $query  = DB::table($this->table_pengetahuan)
                ->select(
                    $this->table_pengetahuan.".*",
                    $this->table_pengetahuan_category.".*",
                    //$this->table_pengetahuan_content.".pcContentType"
                )
                #->select($this->table_pengetahuan_category.".*")
                #->select($this->table_pengetahuan_content.".pcContentType")
                ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                //->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                ->where('pgTimePost',"<",date('Y-m-d H:i:s'))
                ->orderBy('pgId', 'DESC')
                ->paginate($this->paging);
        }*/
        #DB::enableQueryLog();
        #print "<pre>";
        $query  = DB::table($this->table_pengetahuan)
                ->select(
                    $this->table_pengetahuan.".*",
                    $this->table_pengetahuan_category.".*",
                )
                ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId');
        
        if(app('request')->input('cari_materi')){
            $query=$query->where(function($query){
                $query=$query->where('pgTitle', 'like', '%'.app('request')->input('cari_materi').'%');
                $query=$query->orWhere('pgDescription', 'like', '%'.app('request')->input('cari_materi').'%');
            });
        }
        if(app('request')->input('cari_filter')){
            $query=$query->where(function($query){
                foreach(app('request')->input('cari_filter') as $kx=>$xl){
                    $query=$query->orWhere('catPermalink', $xl);
                }
            });
            
        }
        #IF NOT LOGIN ##################################################################################
        // if (!Auth::check()) {
        //     $query          =$query->where("pgType","Public");
        // }
        #END IF NOT LOGIN ##############################################################################
        $query=$query->where('pgTimePost',"<",date('Y-m-d H:i:s'))->orderBy('pgId', 'DESC');        
        $query=$query->paginate($this->paging);
        #$query = DB::getQueryLog();
        
        #print_r($query);
        #exit;
        $query_category      = DB::table($this->table_pengetahuan_category)
                                ->select("catId","catName","catPermalink")
                                ->where('catStatus','y')
                                ->orderBy('catName', 'ASC')
                                ->get();
       
        $data['category']       =$query_category;
        $data['data']           =$query;
        $data['data_count']     =$query->count();
        $data['new_ajax']       ="";
        #$data['global']         =$this->variable_panggil;
        #print "<pre>";
        #print_r($data);
        #exit;
        return view('front::pengetahuan.index',['data'=>$data]);

        
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
    public function show(Request $request,$id)
    {
        ######################################################################################################################
        ##TEST USER LOGIN SESSION...........................................
        // $CHECK_LOGIN=$this->getLogin();
        // $id_user    =$CHECK_LOGIN['ID'];

        #OLD
        /* 
        $USER_LOGIN = [
            "ID"=>5,
            "NAME"=>"Alesha Farzana Rohman",
            "AVATAR"=>"https://bootdey.com/img/Content/avatar/avatar5.png",
            "NIP"=>"199002132023211016",  
        ];*/
        #$request->session()->put('USER_LOGIN', $USER_LOGIN);
        #$request->session()->put('USER_LOGIN',$CHECK_LOGIN);
        ##TEST USER LOGIN SESSION...........................................
        ######################################################################################################################
        // print "<pre>";
        // print_r(session()->get('USER_LOGIN'));
        // exit;
        $data_get = DB::table($this->table_pengetahuan)
                            #pgType 	pgTitle 	pgPermalink 	pgTimePost 	pgDescription 	pgEstimation	
                            ->select($this->table_pengetahuan.".pgId",$this->table_pengetahuan.".pgType",$this->table_pengetahuan.".pgTitle",$this->table_pengetahuan.".pgPermalink",$this->table_pengetahuan.".pgTimePost",$this->table_pengetahuan.".pgDescription",$this->table_pengetahuan.".pgEstimation",$this->table_pengetahuan.".pgViewed",$this->table_pengetahuan.".pgImage",
                                     $this->table_pengetahuan_category.".catId",$this->table_pengetahuan_category.".catName",$this->table_pengetahuan_category.".catPermalink",
                                     $this->table_pengetahuan_content.".pcContentType",$this->table_pengetahuan_content.".pcText",$this->table_pengetahuan_content.".pcVideo",$this->table_pengetahuan_content.".pcDocuments",$this->table_user.".name",
                                     $this->table_pengetahuan_read.".prId",$this->table_pengetahuan_read.".readContent"
                                     )
                            ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                            ->leftJoin($this->table_pengetahuan_content, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                            ->leftJoin($this->table_user, $this->table_pengetahuan.'.id_user', '=', $this->table_user.'.id')
                            ->leftJoin($this->table_pengetahuan_read, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_read.'.pgId')
                            ->where('pgPermalink', $id)
                            ->first();
        $data_get->content=DB::table($this->table_pengetahuan_content)
                            ->leftJoin($this->table_pengetahuan_read_content, $this->table_pengetahuan_content.'.pcId', '=', $this->table_pengetahuan_read_content.'.pcId')
                            ->where('pgId', $data_get->pgId)
                            ->orderby($this->table_pengetahuan_content.'.pcId', 'ASC')
                            ->get();
        
        #INSERT INTO LOG....................................................
        #paId 	id_user 	paType 	paModule 	refId 	created_at 	updated_at 	
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
        #END CHECK IP FIRST-------------------------------------------------------
        // print "IP:".$ip_access."<br>".$ip_address_access;
        // exit;
        #CHECK LOG----------------------------------------------------------------
        #if(session()->get('USER_LOGIN')){
            $check_log = DB::table($this->table_pengetahuan_activity)
                                ->where('paIP', $ip_access)
                                ->where('id_user', (session()->get('USER_LOGIN.ID')? session()->get('USER_LOGIN.ID') : 0))
                                ->where('refId', $id)
                                ->where('created_at',"LIKE",date('Y-m-d')."%")
                                ->count();
            if($check_log==0){                    
                $payload_activity=[
                    'paIP'            => $ip_access,
                    'id_user'         => (session()->get('USER_LOGIN.ID')? session()->get('USER_LOGIN.ID') : 0),
                    'paType'          => 'read',
                    'paModule'        => request()->segment(2),
                    'refId'           => $id,
                    'created_at'      => date("Y-m-d H:i:s"),
                ];

                $save_reply=DB::table($this->table_pengetahuan_activity)->insert($payload_activity);
            }
        #}
        #END OF INSERT LOG ACTIVITY.................................................. 
        $data_om    =DB::table($this->table_pengetahuan)
                            ->select($this->table_pengetahuan.".pgId",$this->table_pengetahuan.".pgType",$this->table_pengetahuan.".pgTitle",$this->table_pengetahuan.".pgPermalink",$this->table_pengetahuan.".pgTimePost",$this->table_pengetahuan.".pgEstimation",$this->table_pengetahuan.".pgImage",
                            $this->table_pengetahuan_category.".catId",$this->table_pengetahuan_category.".catName",$this->table_pengetahuan_category.".catPermalink")
                            ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId')
                            ->where('pgTimePost',"<",date('Y-m-d H:i:s'))
                            ->limit(8)
                            ->get();   
                            
        $data_com   =DB::table($this->table_pengetahuan_comment)
                        ->leftJoin($this->table_user, $this->table_pengetahuan_comment.'.id_user', '=', $this->table_user.'.id')
                        ->where('pgId', $data_get->pgId)
                        ->where('cmParent', 0)
                        ->orderBy($this->table_pengetahuan_comment.'.created_at',"DESC")
                        ->get();   
                        
        #UPDATE COUNT VIEW.........................................................................
        $payload=[
            'pgViewed'        => ($data_get->pgViewed)+1,
        ];
        $update_view=DB::table($this->table_pengetahuan)->where('pgPermalink', $id)->update($payload);
        #END COUNT VIEW............................................................................                
        #$(this).find("input[class='myClass']").val())
        $data=array(
            "summernote"=>array(
                array(
                    "class"=>".summernote",
                    "height"=>200
                )
            ),
            "data"          =>$data_get,
            "materi_lain"   =>$data_om,#array("asd","asdasd","asdasdas"),
            "komentar"      =>$data_com,
            "rating"        =>round((DB::table($this->table_pengetahuan_rating)->where("pgId",$data_get->pgId)->avg('rtRate')),1),
            "new_ajax"      =>"
                            $('.post_comments').submit(function(e){
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
                                                var html_append='<div class=\"post-comment\">'
                                                                    +'<img src=\"https://bootdey.com/img/Content/avatar/avatar7.png\" alt=\"\" class=\"profile-photo-sm\">'
                                                                        +'<p>'
                                                                            +'<a href=\"timeline.html\" class=\"profile-link\">'+data.success.name+'</a>'
                                                                            +'<i class=\"em em-laughing\"></i>'
                                                                            +' '+data.success.message+' '
                                                                        +'</p>'
                                                                +'</div>';
                                                // alert(lokasi_komentar);
                                                var class_target='list_reply_comments_'+data.success.id;               
                                                $('.post_comments').find('.'+class_target).append(html_append);
                                                $('.post_commentsx').val('');
                                            }
                                        }else{
                                            grecaptcha.reset();
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

                            function confirmMe(MSG){
                                if(!confirm(MSG)) return false;
                                return true;
                            }

                            $('.clicks').click(function(event){
                                event.preventDefault();
                                var title=$(this).attr('title');
                                //if(confirmMe('Are You Sure Want to Delete '+$(this).attr('title').replace('Hapus: ','')+'?')){
                                    $.get($(this).attr('href'),function(data){
                                        //var obj = JSON.parse(data);
                                        const splits=title.split('_');
                                        //if(obj.success){
                                        if($.isEmptyObject(data.errors)){
                                            $('.'+title).hide();
                                            $.gritter.add({
                                                text:data.notification,
                                              });
                                                $('.ttl_'+splits[1]).find('.js-accordion-header').append('<span class=\"title_check\"><i class=\"fa-solid fa-check\"></i>Selesai Dibaca</span>');  
                                            //swal({ 
                                            //    type: 'success',
                                            //    title: 'Success',
                                            //    text: 'Anda Berhasil Menghapus Data' 
                                            //},
                                            //  function(){
                                            //  window.location = obj.success;
                                            //});
                                        }else{
                                            swal({ 
                                                  html:true,
                                                  type: 'error',
                                                  title: 'Error',
                                                  text:'<span style=\"font-size:14px\">'+ data.notification +'</span>',
                                            });
                                        }
                                    })
                                //}
                            });

                            $('.kategorinama').on('click', function(){
                                alert($(this).val());
                            });
                            $('input[name=\"kategorinama\"]').on(\"click\", function(){
                                var category_id = $(this).val();
                                $.ajax({
                                    url:'https://jsonplaceholder.typicode.com/posts',
                                    type: \"GET\",
                                    success:function(result){
                                        $(\".data_materi\").empty();
                                        $.each(result,function(index, postObj){
                                            $(\".data_materi\").append(\"<li>\"+postObj.title+\"</li><p>\"+postObj.body+\"</p>\");
                                        });
                                    },
                                    error: function(error) {
                                        console.log(error.status)
                                    }
                                });
                            });

            ",
        );
        return view('front::pengetahuan.show',['data'=>$data]);
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

    public static function time_elapsed_string($datetime, $full = false) {
        $now = new \DateTime;
        $ago = new \DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'Tahun',
            'm' => 'Bulan',
            'w' => 'Minggu',
            'd' => 'Hari',
            'h' => 'Jam',
            'i' => 'Menit',
            's' => 'Detik',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' yang lalu' : 'beberapa saat lalu';
    }

    public static function get_comments($commentid) {
        $data_commentar=DB::table("pengetahuan_comment")
                        ->leftJoin("users", 'pengetahuan_comment.id_user', '=', 'users.id')
                        ->where('cmParent', $commentid)
                        ->get();
        return $data_commentar;                
    }

    public static function get_comments_byid($commentid) {
        $data_commentar=DB::table("pengetahuan_comment")
                        ->leftJoin("users", 'pengetahuan_comment.id_user', '=', 'users.id')
                        ->where('cmPermalink', $commentid)
                        ->first();
        return $data_commentar;                
    }

    #FOR COMMENTS
    public function post_comments(Request $request,$getid)
    {
        // $CHECK_LOGIN=$this->getLogin();
        // $id_user    =$CHECK_LOGIN['ID'];
        // print "<pre>";
        // print_r(session()->get('USER_LOGIN'));
        // exit;

        $validator = \Validator::make($request->all(), [
            'komentar'=>'required',
            'g-recaptcha-response' => 'recaptcha',
        ], [
            'komentar.required' => 'Kolom Komentar Wajib Di isi.',
            'g-recaptcha-response.recaptcha' => 'Silahkan Klik Anda Bukan Robot.',
        ]);
        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            if(strip_tags($request->komentar)==""){
                return response()->json(['errors'=>"Kolom Komentar Wajib Diisi"]);
                exit;
            }
            $data_get = DB::table($this->table_pengetahuan)
                                ->select("pgId","pgPermalink")
                                ->where('pgPermalink', $getid)
                                ->first();

            $nextid     =$this->nextid($this->table_pengetahuan_comment,"cmId");
            // return response()->json(['errors'=>$_POST['komentar']."<br>".$request->session()->get('USERNAME')."<br>".$getid."<br>".$nextid]);
            // exit;
            // print "<pre>";
            // print_r($_POST);
            // print $getid; exit;
            ####### START SAVE DATA  COMMENTS----------------------------------------------------------------
            $nextid             =$this->nextid("pengetahuan_comment","cmId");
            $payload=[
                'cmId'            => $nextid,
                'cmPermalink'     => $nextid."-".sha1($nextid),
                'pgId'            => $data_get->pgId,
                'id_user'         => session()->get('USER_LOGIN.ID'),
                'cmParent'        => 0,
                'cmComment'       => $request->komentar,
                'cmAddedDate'     => date("Y-m-d H:i:s"),
                'cmDisplay'       => 'y',
                'cmSort'          => 0,
                'created_at'      => date("Y-m-d H:i:s"),
            ];

            $save_reply=DB::table($this->table_pengetahuan_comment)->insert($payload);
            ####### END SAVE DATA -------------------------------------------------------------------
            
            return response()->json(['success'=>route('materi.show',$data_get->pgPermalink)]);
        #return redirect()->route('pengetahuan.show',$data_get->pgPermalink);#route('profile', ['id' => 1]);
        #return view('ipanel::pengetahuan.show',['id'=>$data_get->pgPermalink]);
        }
    }

    public function post_replycomments(Request $request,$getid)
    {
        $nextid     =$this->nextid($this->table_pengetahuan_comment,"cmId");
        $data_com   =$this->get_comments_byid($getid);
        // print "<pre>";
        // print_r($data_com);
        // exit;

        ####### START SAVE DATA  COMMENTS----------------------------------------------------------------
        # cmId 	cmPermalink 	pgId 	id_user 	cmParent 	cmComment 	cmAddedDate 	cmDisplay 	cmSort 	created_at 	updated_at
        $nextid             =$this->nextid("pengetahuan_comment","cmId");
        $payload=[
            'cmId'            => $nextid,
            'cmPermalink'     => $nextid."-".sha1($nextid),
            'pgId'            => $data_com->pgId,
            'id_user'         => session()->get('USER_LOGIN.ID'),
            'cmParent'        => $data_com->cmId,
            'cmComment'       => $request->balas_komentar,
            'cmAddedDate'     => date("Y-m-d H:i:s"),
            'cmDisplay'       => 'y',
            'cmSort'          => $this->nextid_sort("pengetahuan_comment","cmSort","cmId",$data_com->cmId),
            'created_at'      => date("Y-m-d H:i:s"),
        ];

        $save_reply=DB::table($this->table_pengetahuan_comment)->insert($payload);
        ####### END SAVE DATA -------------------------------------------------------------------

        return response()->json(['success'=>["id"=>$data_com->cmId,"photo"=>session()->get('USER_LOGIN.AVATAR'),"name"=>session()->get('USER_LOGIN.NAME'),"message"=>$request->balas_komentar]]);
        #return response()->json(['errors'=>$_POST['balas_komentar']."<br>".$request->session()->get('COMMENTS')."<br>".$getid."<br>".$nextid]);
        exit;
        print $getid; exit;
        $data=array();
        return view('ipanel::pengetahuan.show',['data'=>$data]);
    }

    public function nextid($tablename,$fieldname){
        $order =DB::table($tablename)->max($fieldname);
		return ($order + 1);
    }

    public function nextid_sort($tablename,$fieldname,$whereclouse,$wherevalue){
        $order =DB::table($tablename)->where($whereclouse, $wherevalue)->max($fieldname);
		return ($order + 1);
    }
    public static function get_typecontent($paid){
        $data_img=DB::table("pengetahuan_content")
                ->select('pcContentType',"pcId")
                ->where('pcId', $paid)
                ->get();
        return $data_img;   
    }

    public function get_content($contentlink){
        $data_ct=DB::table($this->table_pengetahuan_content)
                ->select("pcId",$this->table_pengetahuan_content.".pgId","pcTitle",$this->table_pengetahuan.".pgTitle",$this->table_pengetahuan.".pgType")
                ->leftJoin($this->table_pengetahuan, $this->table_pengetahuan.'.pgId', '=', $this->table_pengetahuan_content.'.pgId')
                ->where('pcPermalink', $contentlink)
                ->first();
        return $data_ct;
    }
    public function post_finish(Request $request, $id){
        $data_get   =$this->get_content($id);
        $ins_toread =$this->read_materi($data_get->pgId);
        $get_user   =DB::table($this->table_user)
                                ->where('id', session()->get('USER_LOGIN.ID'))
                                ->first();
        // print "<pre>";
        // print_r($data_get);
        // print "</pre>";
        // exit;
        if($get_user->verified=="n"){
            $notification ='<div style="text-align:center">
                            <img src="/assets/images/cross.png" width="50px">
                        </div>
                        <div style="text-align:justify">
                           Anda harus Memverifikasi Akun anda terlebih dahulu untuk dapat menggunakan Fitur ini.
                        </div>';
            return response()->json(['errors'=>["id"=>$id],"notification"=>$notification]);
            exit;
        }else{
        
            #CHECK LOG----------------------------------------------------------------
            $check_log = DB::table($this->table_pengetahuan_read)
                        ->where('pgId', $data_get->pgId)
                        ->where('id_user', session()->get('USER_LOGIN.ID'))
                        ->first();
                    
            if($check_log){
                $check_logx = DB::table($this->table_pengetahuan_read_content)
                    ->where('pcId', $data_get->pcId)
                    ->where('prId', $check_log->prId)
                    ->count();               
                if($check_logx===0){
                    $payload_actual=[
                        'prId'       => $check_log->prId,
                        'pcId'       => $data_get->pcId,
                        'created_at' => date("Y-m-d H:i:s"),
                    ];

                    $save_actual=DB::table($this->table_pengetahuan_read_content)->insert($payload_actual);

                    $payload=[
                        'readActual'        => ($check_log->readActual)+1,
                    ];
                    $update_cfinish=DB::table($this->table_pengetahuan_read)->where('prId', $check_log->prId)->update($payload);
                    if($update_cfinish){
                        #DELETE FROM BACA NANTI
                        $get_rl     =DB::table($this->table_pengetahuan_readlist)
                                                    ->where('id_user',session()->get('USER_LOGIN.ID'))
                                                    ->where('rlTitle', 'BACA_NANTI');
                                                    
                        if($get_rl->count()>0){
                            $get_rl=$get_rl->first();
                            $run_query=DB::table($this->table_pengetahuan_readlist_content)
                                                ->where('rlId', $get_rl->rlId)
                                                ->where('pgId',$data_get->pgId)
                                                ->delete();
                        }
                    }

                }
            }
            
            $notification ='<div style="text-align:center">
                                <img src="/assets/images/check.png" width="50px">
                            </div>
                            <div style="text-align:justify">
                            Sub Materi <strong style="color:#FFC451">'.$data_get->pcTitle.'</strong> pada Materi <strong style="color:#FFC451">'.$data_get->pgTitle.'</strong> berhasil ditandai sebagai Materi yang selesai dibaca/ dilihat
                            </div>';
            return response()->json(['success'=>["id"=>$id],"notification"=>$notification]);

            exit;
        }
    }

    public static function get_beread($contentlink){
        $data_ct=DB::table("pengetahuan_read_content")
                ->select("rcId")
                ->leftJoin("pengetahuan_content", 'pengetahuan_read_content.pcId', '=', 'pengetahuan_content.pcId')
                ->leftJoin("pengetahuan_read", 'pengetahuan_read_content.prId', '=', 'pengetahuan_read.prId')
                ->where('pengetahuan_content.pcPermalink', $contentlink)
                ->where('pengetahuan_read.id_user', session()->get('USER_LOGIN.ID'))
                ->get();
        return ($data_ct->count());
    }

    public function read_materi($id){
        $check_pg = DB::table($this->table_pengetahuan)
                            ->where('pgId', $id)
                            ->first();
        $check_cn = DB::table($this->table_pengetahuan_content)
                            ->where('pgId', $check_pg->pgId)
                            ->count();                    
        #INSERT TO ACTUAL READ MATERI................................................
        $check_rm = DB::table($this->table_pengetahuan_read)
                            ->where('id_user', session()->get('USER_LOGIN.ID'))
                            ->where('pgId', $check_pg->pgId)
                            ->count();
        if($check_rm==0){        
            $payload_rm=[
                'id_user'       => session()->get('USER_LOGIN.ID'),
                'pgId'          => $check_pg->pgId,
                'readContent'   => $check_cn,
                'readActual'    => 0,
                'created_at'    => date("Y-m-d H:i:s"),
            ];
            $save_reply=DB::table($this->table_pengetahuan_read )->insert($payload_rm);
        }
        #END OF INSERT TO ACTUAL READ MATERI.........................................
    }
    public static function get_count($id){
        $query=DB::table("pengetahuan_comment")->select('cmId')->where("pgId",$id)->count();
        return $query;
    }

    public function filter_category(Request $request,$id){
        $idexp              =explode("-",$id);
        $cari_materi        =Input::get('cari_materi');
        $_token             =Input::get('_token');
        $_id                =Input::get('id');
        $page               =Input::get('page') ? Input::get('page') : 0;
        $offset             =($page - 1) * $this->paging;
        $query  = DB::table($this->table_pengetahuan)
                ->select(
                    $this->table_pengetahuan.".*",
                    $this->table_pengetahuan_category.".*",
                )
                ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId');
        #print $cari_materi; exit;
        if(Input::get('cari_materi')){
            $query=$query->where(function($query){
                $query=$query->where('pgTitle', 'like', '%'.Input::get('cari_materi').'%');
                $query=$query->orWhere('pgDescription', 'like', '%'.Input::get('cari_materi').'%');
            });
        }
        if($id=="0-semua"){

        }else{
            $query=$query->orWhere('catPermalink', Input::get('id'));
        }
        $query      =$query->where('pgTimePost',"<",date('Y-m-d H:i:s'))->orderBy('pgId', 'DESC');
        $count_all  =$query->count();      
        $query=$query->offset($offset)->limit($this->paging)->get();
        #$query=$query->paginate($this->paging);
        #print "<pre>";
        // print_r($query);
        // exit;
        $no=0;
        $data_return=array();
        foreach($query as $key=>$val){
            $data_return[$no]=array(                
                            "title"     =>$val->pgTitle,
                            "img"       =>asset('storage/images/assets_pengetahuan/'.$val->pgImage),
                            "plink"     =>$val->pgPermalink,
                            "url"       =>url("front/materi/".$val->pgPermalink),
                            "estimate"  =>$val->pgEstimation,
                            "type"      =>$val->pgType,
                            "comments"  =>$this->get_count($val->pgId),
                            "star"      =>"4.7",
                            "view"      =>$val->pgViewed,
                            "cat"       =>$val->catName,
                            "caturl"    =>url("front/materi/?cari_filter[]=".$val->catPermalink),
                            "typec"     =>$this->get_typecontent($val->pgId),
                            );
            $no++;
        }

        // print "<pre>";
        // print_r($_GET);
        // exit;
        
        if($_token){        $_token    ="_token=".$_token;}
        if($cari_materi){   $cari_materi="&cari_materi=".$cari_materi;}
        if($_id){           $_id        ="&cari_filter[]=".$_id;}
        
        $data_return['success']     =$data_return;
        $data_return['idx']         =$idexp[0];
        $data_return['count']       =$query->count();
        $data_return['count_all']   =$count_all;
        $data_return['return_url']  =route('materi.index')."?".($_token ? $_token: '').($cari_materi ? $cari_materi: '').($_id ?$_id: '');

        /*
        $data_isi[0]['judul']   ="JUDUL SATU";
        $data_isi[0]['link']    ="121-link-satu";
        $data_isi[1]['judul']   ="JUDUL DUA";
        $data_isi[1]['link']    ="122-link-dua";
        $data_isi[2]['judul']   ="JUDUL TIGA";
        $data_isi[2]['link']    ="123-link-tiga";

        $object = new \stdClass();
        foreach ($data_isi as $key => $value){
            $object->$key = $value;
        }*/
        /*
        'success'=>[
                "id"=>111
            ],
            "notification"=>"hai hai hai",*/
        /*
        $asdad="ISINYA_ISINYA";
        $inireturn=
            [
            "success"=>[
                        [
                            "title"     =>$asdad,
                            "img"       =>$asdad,
                            "url"       =>$asdad,
                            "estimate"  =>$asdad,
                            "type"      =>$asdad,
                            "comments"  =>$asdad,
                            "star"      =>$asdad,
                            "view"      =>$asdad,
                            "cat"       =>$asdad,
                            "caturl"    =>$asdad,
                            "typec"     =>$asdad,
                        ],
                        [
                            "title"     =>$asdad,
                            "img"       =>$asdad,
                            "url"       =>$asdad,
                            "estimate"  =>$asdad,
                            "type"      =>$asdad,
                            "comments"  =>$asdad,
                            "star"      =>$asdad,
                            "view"      =>$asdad,
                            "cat"       =>$asdad,
                            "caturl"    =>$asdad,
                            "typec"     =>$asdad,
                        ]
                    ]
            ];
        */    
        //  print "<pre>";
        //  //print_r(json_encode($inireturn));
        //  print_r($data_isi);
        //  exit;
        #$for_send=str_replace("]","",str_replace("[","",json_encode($inireturn)));
        #$data_isi['success']=$data_isi;
        return response()->json($data_return);
    }

    function object_to_array($data){
        $result = [];
        foreach ($data as $key => $value){
            $result[$key] = (is_array($value) || is_object($value)) ? object_to_array($value) : $value;
        }
        return $result;
    }

    public function load_more(Request $request,$id){
        #print "<pre>";
        // print_r($_GET);
        // exit;
        $idexp              =explode("-",$id);
        $cari_materi        =Input::get('cari_materi');
        $_token             =Input::get('_token');
        $cari_filter        =Input::get('cari_filter');
        $page               =Input::get('page') ? Input::get('page') : 2;
        $offset             = ($page-1) * $this->paging ;
        
        #print $page; exit;
        #DB::enableQueryLog();
        $query  = DB::table($this->table_pengetahuan)
                ->select(
                    $this->table_pengetahuan.".*",
                    $this->table_pengetahuan_category.".*",
                )
                ->leftJoin($this->table_pengetahuan_category, $this->table_pengetahuan_category.'.catId', '=', $this->table_pengetahuan.'.catId');
        if(Input::get('cari_materi')){
            $query=$query->where(function($query){
                $query=$query->where('pgTitle', 'like', '%'.Input::get('cari_materi').'%');
                $query=$query->orWhere('pgDescription', 'like', '%'.Input::get('cari_materi').'%');
            });
        }
        if($cari_filter){
            if($cari_filter=="0-semua"){

            }else{
                $query=$query->orWhere('catPermalink', Input::get('cari_filter'));
            }
        }
        // if (!Auth::check()) {
        //     $query          =$query->where("pgType","Public");
        // }
        $query      =$query->where('pgTimePost',"<",date('Y-m-d H:i:s'))->orderBy('pgId', 'DESC');    
        $count_all  =$query->count();      
        $query=$query->offset($offset)->limit($this->paging)->get();
        #$query_log = DB::getQueryLog();
        // print "<pre>";
        // print_r($query);
        // exit;
        $no=0;
        $data_return=array();
        foreach($query as $key=>$val){
            $data_return[$no]=array(                
                            "title"     =>$val->pgTitle,
                            "img"       =>asset('storage/images/assets_pengetahuan/'.$val->pgImage),
                            "plink"     =>$val->pgPermalink,
                            "url"       =>url("front/materi/".$val->pgPermalink),
                            "estimate"  =>$val->pgEstimation,
                            "type"      =>$val->pgType,
                            "comments"  =>$this->get_count($val->pgId),
                            "star"      =>"4.7",
                            "view"      =>$val->pgViewed,
                            "cat"       =>$val->catName,
                            "caturl"    =>url("front/materi/?cari_filter[]=".$val->catPermalink),
                            "typec"     =>$this->get_typecontent($val->pgId),
                            );
            $no++;
        }
        $page                           =$page+1;
        if($_token){        $_token     ="_token=".$_token;}
        if($cari_materi){   $cari_materi="&cari_materi=".$cari_materi;}
        if($cari_filter){   $cari_filter="&cari_filter[]=".$cari_filter;}
        if($page){          $page       ="&page=".$page;}
        

        $data_return['success']     =$data_return;
        #$data_return['query_log']   =$query_log;
        $data_return['count']       =$query->count();
        $data_return['count_all']   =$count_all;
        $data_return['return_url']  =route('materi.index')."?".($_token ? $_token: '').($cari_materi ? $cari_materi: '').($cari_filter ?$cari_filter: '').($page ?$page: '');
        return response()->json($data_return);
    }

    

}
