<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $product = "0";
        // $order = "0";
        // $review = "0";
        // return view('vendor.dashboard',compact('product','order','review'));
    }

    public function adminHome()
    {
        $category = DB::table('category')->count();
        $image = DB::table('image')->count();
        $video =DB::table('video')->count();
        return view('admin.adminDashboard',compact('category','image','video'));
    }

    public function admin_logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
    
    public function myAccount()
    {
       $get_data = User::where('id', Auth::id())->first();
        return view('common.profile',compact('get_data'));
    }

    public function updateProfile(Request $request)
    {
        //dd($request);
        $id = Auth::id();

        if ($request->hasFile('avatar')) {
            $path = "public/uploads/profile";
            $fielname = $request->file('avatar')->getClientOriginalName();
            $file = $request->file('avatar');
            $file->move($path, $fielname);
        }else{
            $get_data = User::where('id', $id)->first();
            $path = "public/uploads/profile";
            $fielname = $get_data->image;
        }

        User::whereId($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'image' => $fielname,
            'path' => $path,
        ]);

        return back()->with('success','You have successfully updated profile .!');
    }

    public function changePwd(){
        return view('common.change-password');
    }

    public function updatePwd(Request $request){

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required| min:8'
        ]);

        if ($validator->fails()) {
            // return $validator->errors();
            return back()->withErrors($validator->errors());
        }

        $user_id = Auth::id();

        $chk = User::where('id', $user_id)->select('password')->first();
        // return $admin;
        if (Hash::check($request->current_password, $chk->password)) {
            $new_pwd = User::where('id', $user_id)
                    ->update([
                        'password' => bcrypt($request->password)
                    ]);

            if($new_pwd){
                return back()->with(['success' => 'Password updated successfully.']);
            }
        }
        else{
            return back()->withErrors('Invalid old password.');
        }
    }

}
