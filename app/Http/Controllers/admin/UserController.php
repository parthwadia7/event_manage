<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    
    public function userList(){
       
    	$data = User::where('role_id','3')->orderBy('id', 'DESC')->get();
        
       return view('admin.user.index',compact('data'));
    }


    public function userAccountStatus(Request $request){
        $id = $request->id;

        $ex = explode('__', $id);
        $user_id = $ex[0];
        $status = $ex[1];

        if($status == 1 || $status == '1'){
            $set_status = 0;
        }
        else{
            $set_status = 1;
        }
        // return $set_status;
        $active = User::where('id', $user_id)->update(['is_active' => $set_status]);

        // return response($id);

        if($active){
            return response('success');
        }
        else{
            return response('error');
        }
    }

    public function vendorList(){
       
        $data = User::where('role_id','2')->orderBy('id', 'DESC')->get();
       return view('admin.vendor.index',compact('data'));
    }

    public function accountStatus(Request $request){
        $id = $request->id;

        $ex = explode('__', $id);
        $user_id = $ex[0];
        $status = $ex[1];

        if($status == 1 || $status == '1'){
            $set_status = 0;
        }
        else{
            $set_status = 1;
        }
        // return $set_status;
        $active = User::where('id', $user_id)->update(['is_active' => $set_status]);

        // return response($id);

        if($active){
            return response('success');
        }
        else{
            return response('error');
        }
    }

  




}
