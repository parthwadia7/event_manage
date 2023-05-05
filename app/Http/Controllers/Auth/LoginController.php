<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Socialite;
use Exception;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function admin_singup(){
        return view('auth.admin_singup');
    }
    public function admin_create(Request $request){
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'mobile' => 'required|numeric|min:10',
            'email' =>  'required|email|unique:users,email',
            'password' => 'required|min:8|max:16',
            'confirm_password' =>  'required|same:password',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }
        $user = User::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' =>  bcrypt($request->password),
                'mobile' => $request->mobile,
                'role_id'=>'1',
            ]);

          if ($user) {
            Auth::login($user);
            return redirect()->route('admin.list_event');
          }else{
            return back()->with('error', 'Error! User account not created.');
          }
    }  


    public function admin_signin(){
       return view('auth.admin_login');
    }

    public function admin_login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if($user = User::where('email', $request->email)->first()) {

            if(Hash::check($request->password, $user->password)) {

                if ($user->role_id == '3') {
                    return back()->with('error', 'Error occured..!!');
                }
                if ($user->role_id == '2') {
                    return redirect('/admin/login')->with('error','Sorry you are not an user..!!');
                }
                if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
                {

                    return redirect()->route('admin.list_event');
                }

            }else{
                 return redirect()->back()->with('error', 'Sorry your password does not match our record..!!');
            }

        }else{
             return redirect()->back()->with('error', 'Sorry you are not an user..!!');
        }



    }

    public function admin_forgotPass(){
        return view('auth.forgot-password');
    }


    public function admin_postForgotPass(Request $request){
        // return $request;
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        $adm = User::where('email', $request->email)->where('role_id','1')->first();

            if(isset($adm->id)){
                // return $adm;
                // $adm =  $adm[0];
                  $current_time = time();

                $token = base64_encode(convert_uuencode(base64_encode($adm['email']."___".$current_time)));
                // dd($token);
                $adm_email = $adm['email'];



                $url = route('admin.reset_pwd',[$token ]);
                //return $url;
                Mail::send('mails.reset_pwd', ['token' => $url, 'name' => $adm->first_name." ".$adm->last_name, ], function ($message) use ($adm_email)
                {

                    $message->from('support@testdomain.com', 'Test Admin Support');
                    $message->subject("reset password requested.");
                    $message->to($adm_email);
                });


                if(empty(array_filter(Mail::failures()))) {
                    return back()->with(['success' => 'Success! password reset link has been sent to your email']);
                }
                else{
                    // return Mail::failures();
                    return back()->withErrors('Failed! there is some issue with email provider');
                }
            }
            else{
                return back()->withErrors("This email is not registered");
            }
    }


    public function admin_resetPassword($xstr){
        $decode = base64_decode(convert_uudecode(base64_decode($xstr)));

        $decode = explode('___', $decode);
        $email = $decode[0];
        $user = User::where('email',$email)->first();


        $link_time = $decode[1];
        $now = time();

        $interval  = abs($now - $link_time);
        $minutes   = round($interval / 60);

        if( $minutes > 240 ){
            return "this link has expired.";
        }
        else{

           return view('auth.newpassword', ['email' => $email]);
        }
    }

    public function admin_setNewPassword(Request $request){
        // return $request;
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|min:8'
        ]);

        if ($validator->fails()) {
            // return $validator->errors();
            return back()->withErrors($validator->errors());
        }

        $admin_chk = User::where('email', $request->email)->first();

        if(isset($admin_chk->id)){
            $admin_id = $admin_chk->id;
            $new_pass = bcrypt($request->password);
            $update_pass = User::where('id', $admin_id)->update([ 'password' => $new_pass]);

            if($update_pass){
                $update_otp = User::where('id', $admin_id);
                return redirect('/admin/login')->with(['success' => 'Success! password has been modified. Please login using your new password.']);
            }
            else{
                return back()->withErrors('Failed! there is some issue with password update.');
            }
        }
        else{
            return back()->withErrors('Failed! This admin email is not found.');
        }
    }

}
