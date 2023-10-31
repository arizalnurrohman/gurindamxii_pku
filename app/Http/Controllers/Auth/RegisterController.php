<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        // return User::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password']),
        // ]);
        $str = Str::random(100);

        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verify_key'    =>$str,
            'verified'  =>'n',
        ]);

        $assign_this=$user->assignRole('user');
        if($assign_this){
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
                      Terimakasih Bapak/Ibu '.$data['name'].' Telah melakukan Pendaftaran ke Gurindam BKN Kanreg XII Pekanbaru<br><br>
                      
                      Silahkan lakukan verifikasi akun anda dengan mengklik tautan di bawah ini:<br><br>
                      <a href="'.(url('front/verifikasi/pendaftararan/?vcode='.$str.'&email='.$data['email'])).'"><strong>LINK VERIFIKASI GURINDAM BKN KANREG XII PEKANBARU</strong></a>
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
          </table>
          
          ';

            $MSG['FROM']    ="gurindam@gmail.com";
            $MSG['TO']      =$data['email'];
            $MSG['SUBJECT'] ="Gurindam XII BKN Pekanbaru - Verifikasi Email Pendaftaran";
            $MSG['HTML']    =$email_body;
            $send_mail=Mail::send([], [], function ($message) use ($MSG) {
                $message->from('aishaazzahrarohman@example.com','Gurindam Kanreg XII Pekanbaru')
                        ->to($MSG['TO'])
                        ->subject($MSG['SUBJECT'])
                        ->html($MSG['HTML'])
                        ->text('NO-TEXT');
            });

            return $user;    
        }
       

    }
}
