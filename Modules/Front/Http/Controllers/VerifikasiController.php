<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Session;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;


class VerifikasiController extends Controller
{
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

    public static function getLogin()
    {
        if (Auth::check()) {
            if(auth()->user()->hasRole('user')=='user'){
                $log_data=array(
                    "ID"        =>auth()->user()->id,
                    "NAME"      =>auth()->user()->name,
                    "EMAIL"     =>auth()->user()->email,
                    "VERIFIED"  =>'y',
                    "ROLES"     =>array(
                        "ID"    =>auth()->user()->role,
                        "NAME"  =>(auth()->user()->hasRole('user')=='user' ? 'user' : ''),
                    ),
                    "ID"        =>auth()->user()->id,
                );
                
                $save=Session::put('USER_LOGIN',$log_data);
                if($save){
                    return $log_data;
                }
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $code         = Input::get('vcode');
        $email        = Input::get('email');

        $query     = DB::table("users")
                            ->where('verify_key',$code)
                            ->where('email',$email);
        $get_data  =$query->first();                    
        if($query->count()>0){
            if($get_data->verified=='n'){
                $payload=array(
                    "verified"          =>'y',
                    "email_verified_at" =>date("Y-m-d H:i:s"),
                );
                #$update_s='y';
                $update_s=DB::table("users")->where('id', $get_data->id)->update($payload);
                if($update_s){
                    $AUTH_CHECK=$this->getLogin();
                    // print "<pre>";
                    // print_r($AUTH_CHECK);
                    // exit;
                    
                    $response=[
                        "status"=>"success",
                        "message"=>"Anda Berhasil Melakukan Verifikasi Akun Anda, Terimakasih",
                        "message_add"=>""
                    ];

                    if(!$AUTH_CHECK){
                        $response['message_add']="Silahkan Melakukan Login ke dalam Sistem dan menggunakan Fitur yang tersedia.. ";
                    }
                }
            }else{
                $response=[
                    "status"=>"fail",
                    "message"=>"Kode Verifikasi tidak Valid dan sudah pernah digunakan, silahkan periksa kode verifikasi yang anda gunakan",
                    "message_add"=>"",
                ];
            }
        }else{
            $response=[
                "status"=>"fail",
                "message"=>"Kode Verifikasi tidak Valid, silahkan periksa kode verifikasi yang anda gunakan",
            ];
        }
        return view('front::verifikasi.show',['data'=>$response]);
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
    public function resend_code()
    {
        
        if (Auth::check()) {
            if(auth()->user()->hasRole('user')=='user'){
                $query     = DB::table("users")
                            ->where('id',session()->get('USER_LOGIN.ID'));
                $get_data  =$query->first();                    
                if($query->count()>0){
                    $payload=array(
                        "name"=>$get_data->name,
                        "email"=>$get_data->email,
                        "code"=>$get_data->verify_key,
                    );
                    $sendmail=$this->send_thismail($payload);
                    if($sendmail){
                        return response()->json(['success'=>"ok"]);
                    }
                    exit;
                }
            }else{
                return response()->json(['errors'=>"silahkan login menggunakan akun dengan level user"]);
            exit;
            }
        }else{
            return response()->json(['errors'=>"silahkan login dahulu untuk meminta kirim ulang kode verifikasi"]);
            exit;
        }
    }

    public function send_thismail($payload){
        $email_body='<table width="100%" border="0">
            <tr>
              <td>
                  <img src="http://godemo.my.id/assets/img/email-header.jpg" width="100%">
              </td>
            </tr>
            <tr>
              <td><table width="100%" border="0">
                <tr>
                  <td style="text-align:center"><h1>EMAIL VERIFIKASI</h1></td>
                </tr>
                <tr>
                  <td style="text-align:center">&nbsp;</td>
                </tr>
                <tr>
                  <td style="text-align:center">
                      Terimakasih Bapak/Ibu '.$payload['name'].' Telah melakukan Pendaftaran ke Gurindam BKN Kanreg XII Pekanbaru<br><br>
                      
                      Silahkan lakukan verifikasi akun anda dengan mengklik tautan di bawah ini:<br><br>
                      <a href="'.(url('front/verifikasi/pendaftararan/?vcode='.$payload['code'].'&email='.$payload['email'])).'"><strong>LINK VERIFIKASI GURINDAM BKN KANREG XII PEKANBARU</strong></a>
                  </td>
                </tr>
                <tr>
                  <td style="text-align:center">&nbsp;</td>
                </tr>
                <tr>
                  <td style="text-align:center">&nbsp;</td>
                </tr>  
                <tr>
                  <td style="text-align:center">
                      <a href="https://www.facebook.com/kanreg12bkn/">Facebook</a>
                      &nbsp;
                      <a href="https://twitter.com/kanreg12bkn">Twitter</a>
                      &nbsp;
                      <a href="https://www.instagram.com/kanreg12bkn/">Instagram</a>
                      &nbsp;
                      <a href="https://www.youtube.com/@kanreg12bkn">Youtube</a>
                      &nbsp;
                      <a href="https://www.tiktok.com/@kanreg12bkn">Tiktok</a>
                      
                  </td>
                </tr>
              </table></td>
            </tr>
            <tr bgcolor="#999999" style="background-color:#FFFFFF">
              <td valign="middle" style="text-align:center; height:40px; vertical-align:middle center">&amp;copy; 2023 - Gurindam BKN Kanreg XII Pekanbaru</td>
            </tr>
          </table>';

            $MSG['FROM']['EMAIL']    ="gurindam@gmail.com";
            $MSG['FROM']['NAME']    ="Gurindam Kanreg XII Pekanbaru";
            $MSG['TO']      =$payload['email'];
            $MSG['SUBJECT'] ="Gurindam XII BKN Pekanbaru - Verifikasi Email Pendaftaran";
            $MSG['HTML']    =$email_body;
            $send_mail=Mail::send([], [], function ($message) use ($MSG) {
                $message->from($MSG['FROM']['EMAIL'],$MSG['FROM']['NAME'])
                        ->to($MSG['TO'])
                        ->subject($MSG['SUBJECT'])
                        ->html($MSG['HTML'])
                        ->text('NO-TEXT');
            });

    }

    public function change_email(){
        $code         = Input::get('vcode');
        $email        = Input::get('email');

        $query     = DB::table("users")
                            ->where('verify_key',$code);
        $get_data  =$query->first();                    
        if($query->count()>0){
            $payload=array(
                "verified"          =>'y',
                "email"          =>$email,
            );
            #$update_s='y';
            $update_s=DB::table("users")->where('id', $get_data->id)->update($payload);
            if($update_s){
                $AUTH_CHECK=$this->getLogin();
                // print "<pre>";
                // print_r($AUTH_CHECK);
                // exit;
                
                $response=[
                    "status"=>"success",
                    "message"=>"Anda Berhasil Melakukan Verifikasi Akun Anda, Terimakasih",
                    "message_add"=>""
                ];

                if(!$AUTH_CHECK){
                    $response['message_add']="Silahkan Melakukan Login ke dalam Sistem dan menggunakan Fitur yang tersedia.. ";
                }
            }
            
        }else{
            $response=[
                "status"=>"fail",
                "message"=>"Kode Verifikasi tidak Valid, silahkan periksa kode verifikasi yang anda gunakan",
            ];
        }
        return view('front::verifikasi.show',['data'=>$response]);
    }

    
}
