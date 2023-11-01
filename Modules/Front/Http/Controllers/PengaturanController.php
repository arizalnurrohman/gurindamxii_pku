<?php

namespace Modules\Front\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class PengaturanController extends Controller
{
    public $table_user             ="users";
    public $table_newsletter_subs  ="newsletter_subscriber";
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $get_data= DB::table($this->table_user)
                    ->where('id',session()->get('USER_LOGIN.ID'))
                    ->first();
        $data=array(
            "data"=>$get_data,
            // "form_ajax_upload"=>array(
            //     "theid"=>"#post_pengaturan",
            //     "thebutton"=>".btn-submit"
            // ),
        );
        return view('front::pengaturan.index',['data'=>$data]);
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
        $get_data= DB::table($this->table_user)
                    ->where('id',session()->get('USER_LOGIN.ID'))
                    ->first();
        $errors     =array();
        $validator = \Validator::make($request->all(), [
            'prname'=>'required',
            'premail'=>'required|email' ,
        ], [
            'prname.required' => 'Kolom Nama Wajib Di isi.',
            'premail.required' => 'Kolom Email Keterangan Wajib Di isi.',
        ]);

        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors()->all()]);
            exit;
        }else{
            $add_msg="";
            if($get_data->email != $request->premail){
                $c_email= DB::table($this->table_user)
                    ->where('email',$request->premail);

                if($c_email->count()>0){
                    $error[]="Email yang anda masukkan sudah digunakan oleh akun lain..";
                }else{
                    $c_email=$c_email->first();

                    $str = Str::random(100);
                    $payloadx=array(
                        "name"=>$get_data->name,
                        "email"=>$request->premail,
                        "code"=>$str,
                    );
                    $sendmail=$this->send_thismail($payloadx);
                    if($sendmail){
                        $add_msg.="Silahkan Verifikasi Perubahan Email anda, dengan mengklik Kode tautan yang kami kirimkan ke email baru anda";
                    }else{
                        $error[]="ERROR GUYS";
                    }
                }
            }
            if($request->prpassword or $request->prrepassword or $request->oldpassword){
                if(empty($request->prpassword) or empty($request->prrepassword)){
                    $errors[]   ="Kolom Password Baru dan Password Baru (Ulang) wajib di isi";
                }
                if(strlen($request->prpassword)<6 or strlen($request->prrepassword)<6){
                    $errors[]   ="Kolom Password Minimal 6 karakter";
                }

                if (Hash::check($request->oldpassword, $get_data->password)) { 
                } else {
                    $errors[]   ="Kolom Password Lama tidak sama dengan password lama anda";
                }
            }
            
            
            if($errors){
                return response()->json(['errors'=>$errors]);exit;
            }else{
                if($request->prberlangganan=="y"){
                    if($get_data->email != $request->premail){
                        $c_email=DB::table($this->table_newsletter_subs)->where('nsubEmail',$request->premail)->where('nsubStatus','y')->first();
                        $update_c=DB::table($this->table_newsletter_subs)->where('nsubEmail', $c_email->nsubEmail)->update(['nsubStatus' => 'n','nsubUnSubsribe'=>date('Y-m-d H:i:s')]);
                        
                        $next_id    =$this->nextid("newsletter_subscriber","nsubId");
                        $payload_c=array(
                            "nsubId"        =>$next_id,
                            "nsubPermalink" =>$next_id."-".sha1($next_id),
                            "nsubEmail"     =>$request->premail,
                            "nsubStatus"    =>'y',
                            "nsubSubsribe"  =>date("Y-m-d H:i:s"),
                        );
                        $insert_c=DB::table($this->table_newsletter_subs)->insert($payload_c);
                    }else{
                        $c_email=DB::table($this->table_newsletter_subs)->where('nsubEmail',$request->premail)->where('nsubStatus','n');
                        if($c_email->count()>0){
                            $c_email =$c_email->first();
                            $update_c=DB::table($this->table_newsletter_subs)->where('nsubEmail', $c_email->nsubEmail)->update(['nsubStatus' => 'y','nsubUnSubsribe'=>date('Y-m-d H:i:s')]);
                        }else{
                            $next_id    =$this->nextid("newsletter_subscriber","nsubId");
                            $payload_c=array(
                                "nsubId"        =>$next_id,
                                "nsubPermalink" =>$next_id."-".sha1($next_id),
                                "nsubEmail"     =>$request->premail,
                                "nsubStatus"    =>'y',
                                "nsubSubsribe"  =>date("Y-m-d H:i:s"),
                            );
                            $insert_c=DB::table($this->table_newsletter_subs)->insert($payload_c);
                        }
                    }
                }else{
                    if($get_data->email != $request->premail){
                        $c_email=DB::table($this->table_newsletter_subs)->where('nsubEmail',$get_data->email)->where('nsubStatus','y')->first();
                        $update_c=DB::table($this->table_newsletter_subs)->where('nsubEmail', $c_email->nsubEmail)->update(['nsubStatus' => 'n','nsubUnSubsribe'=>date('Y-m-d H:i:s')]);

                        $c_email=DB::table($this->table_newsletter_subs)->where('nsubEmail',$request->premail)->where('nsubStatus','y')->first();
                        $update_c=DB::table($this->table_newsletter_subs)->where('nsubEmail', $c_email->nsubEmail)->update(['nsubStatus' => 'n','nsubUnSubsribe'=>date('Y-m-d H:i:s')]);
                    }else{
                        $c_email=DB::table($this->table_newsletter_subs)->where('nsubEmail',$get_data->email)->where('nsubStatus','y');
                        if($c_email->count()>0){
                            $c_email=$c_email->first();
                            $update_c=DB::table($this->table_newsletter_subs)->where('nsubEmail', $c_email->nsubEmail)->update(['nsubStatus' => 'n','nsubUnSubsribe'=>date('Y-m-d H:i:s')]);
                        }
                    }
                }

                $payload=array(
                    "name"      =>$request->prname,
                    "updated_at"=>date("Y-m-d H:i:s"),
                );
                
                if($get_data->email != $request->premail){
                   $payload['verify_key']  =$str;
                }
                if($request->prpassword or $request->prrepassword){
                    $payload['password']=Hash::make($request->prpassword);
                }
                
                $update=DB::table($this->table_user)->where('id', session()->get('USER_LOGIN.ID'))->update($payload);
                if($update){
                    return response()->json(['success'=>"Anda berhasil Melakukan perubahan data. ".$add_msg]);
                    exit;
                }
            }
        }

    }

    public function nextid($tablename,$fieldname){
        $order =DB::table($tablename)->max($fieldname);
		return ($order + 1);
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
                  <td style="text-align:center"><h1>KONFIRMASI PERUBAHAN EMAIL</h1></td>
                </tr>
                <tr>
                  <td style="text-align:center">&nbsp;</td>
                </tr>
                <tr>
                  <td style="text-align:center">
                      Terimakasih Bapak/Ibu '.$payload['name'].' Telah melakukan Pendaftaran ke Gurindam BKN Kanreg XII Pekanbaru<br><br>
                      
                      Silahkan lakukan verifikasi akun anda dengan mengklik tautan di bawah ini:<br><br>
                      <a href="'.(url('front/verifikasi/change_email/code?vcode='.$payload['code'].'&email='.$payload['email'])).'"><strong>LINK VERIFIKASI PERUBAHAN EMAIL GURINDAM BKN KANREG XII PEKANBARU</strong></a>
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
}
