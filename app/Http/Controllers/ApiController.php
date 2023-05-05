<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\UserAuthToken;
use Hash;

class ApiController extends Controller
{
    public function categorylist(Request $request)
    {
        if ($request->type == 'video') {
            $category_list = DB::table('category')->select('id','name')->where("type",2)->get();
        }else {
            $category_list = DB::table('category')->select('id','name')->where('type',1)->get();
        }
        $detail['code'] = 200;
        $detail['status'] = 'succes';
        $detail['message'] = 'list fach';
        $detail['data'] = $category_list;
        return response()->json($detail);
    }

    public function colorlist(Request $request)
    {
        $color_list = DB::table('color')->select('id','name','code')->where("status",1)->get();
        $detail['code'] = 200;
        $detail['status'] = 'succes';
        $detail['message'] = 'list fach';
        $detail['data'] = $color_list;
        return response()->json($detail);
    }

    public function imagelist(Request $request)
    {
        $image_list = DB::table('image')->where("image.status",1);
        if (isset($request->category_id) && !empty($request->category_id) && $request->category_id != 0) {
            $image_list = $image_list->where('catrgory_id',$request->category_id);
        }
        $image_list = $image_list->select('id','image.name','image.image_path','image.image_name','shopify_url')->get();
        $image = array();
        foreach ($image_list as $key => $value) {
            $color = DB::table('color')->where("image_id",$value->id)->select('name',"code");
            if (isset($request->color_name) && !empty($request->color_name)) {
                $color = $color->where('name',$request->color_name);
            }
            $color = $color->get();
            if (count($color) > 0) {
                $image[] = array(
                    'id'=>$value->id,
                    'name'=>$value->name,
                    'image'=>asset($value->image_path).'/'.$value->image_name,
                    'shopify_url'=>$value->shopify_url,
                    'color'=>$color,
                );
            }
        }
        $detail['code'] = 200;
        $detail['status'] = 'succes';
        $detail['message'] = 'list fach';
        $detail['data'] = $image;
        return response()->json($detail);
    }

    public function videolist(Request $request)
    {
        $video_list = DB::table('video')->where("video.status",1);
        if (isset($request->category_id) && !empty($request->category_id) && $request->category_id != 0) {
            $video_list = $video_list->where('catrgory_id',$request->category_id);
        }
        $video_list = $video_list->select('id','video.name','video.video_url','video.videoid','shopify_url')->get();
        $video = array();
        foreach ($video_list as $key => $value) {
            $color = DB::table('color')->where("video_id",$value->id)->select('name',"code");
            if (isset($request->color_name) && !empty($request->color_name)) {
                $color = $color->where('name',$request->color_name);
            }
            $color = $color->get();
            if (count($color) > 0) {
                $video[] = array(
                    'id'=>$value->id,
                    'name'=>$value->name,
                    'shopify_url'=>$value->shopify_url,
                    'video'=>$value->video_url,
                    'videoid'=>$value->videoid,
                    'color'=>$color,
                );
            }
        }
        $detail['code'] = 200;
        $detail['status'] = 'succes';
        $detail['message'] = 'list fach';
        $detail['data'] = $video;
        return response()->json($detail);
    }

}
