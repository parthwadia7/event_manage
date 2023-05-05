<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Hash;

class EventController extends Controller
{
    public function index(){
        $event_list = DB::table('event')->orderBy('id', 'DESC')->get();
        return view('admin.event.index',['data' => $event_list]);
    }

    public function addevent(){
        return view('admin.event.add');
    }

    public function storeevent(Request $request){
        $image_id = DB::table('event')->insertGetId([
            'event_name' => $request->event_name,
            'event_description' => $request->event_description,
            'event_start_date' => $request->event_start_date,
            'event_end_date' => $request->event_end_date,
            'event_recurrence_type' => $request->event_recurrence_type,
        ]);

        if(!is_null($image_id)) {
            return redirect('admin/list-event')->with("success", "Category created successfully.");
        }

        else {
            return back()->with("failed", "Error! Delivery Person  not created.");
        }
    }

     public function editevent($id){
        $event = DB::table('event')->where('id', $id)->first();
        return view('admin.event.edit',compact('event'));
    }

    public function updateevent(Request $request)
    {
        $upd = DB::table('event')->where('id', $request->id)
            ->update([
                'event_name' => $request->event_name,
                'event_description' => $request->event_description,
                'event_start_date' => $request->event_start_date,
                'event_end_date' => $request->event_end_date,
                'event_recurrence_type' => $request->event_recurrence_type,
            ]);
        if(isset($upd)){
             return redirect('admin/list-event')->with(['success' => 'Category updated successfully.']);
        }
        else{
            return back()->with("failed", "Error! Sub Category not update.");
        }
    }

    public function deleteevent(Request $request)
    {
        $id = $request->id;

        $del = DB::table('event')->where('id', $id)->delete();

        if($del){
            return response('success');
        }
        else{
            return response('error');
        }
    }
}
