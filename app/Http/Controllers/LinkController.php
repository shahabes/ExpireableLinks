<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerMedia;
use App\Models\Media;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Psy\Util\Str;

class LinkController extends Controller
{
    //

    public function index()
    {
        $media = Media::all();
        $customers = Customer::all();
        return view("links.index", compact(['media','customers']));
    }
    public function download($url)
    {

        $pivot = CustomerMedia::where("url_map",$url)->first();
        if ($pivot === null){
            return view('customer.not_found');
        }
        $mediaName = Media::find($pivot->media_id);
        if($pivot->active === 0){
            $title = $mediaName->title;
            return view('customer.downloaded',compact('title'));
        }
//        return File(public_path() . '/media/' . Media::find($pivot->media_id)->name);
        $pivot->active = 0;
        $pivot->save();
        return response()->download(public_path() . '/media/' . $mediaName->filename, $mediaName->filename);
    }

    public function create(Request $request)
    {
        $this->validate($request,
        [
           "user_id" => "required",
           "media_id" => "required",
        ]);

        $customer = Customer::find($request->user_id);
        $media = Media::find($request->media_id);

        if($media === null || $customer === null){
            return response()->json(["message"=>"customer or media is wrong."], 404);
        }

        $pivot = new CustomerMedia();
        $pivot->customer_id = $customer->id;
        $pivot->media_id = $media->id;
        $pivot->active = 1;
        $pivot->url_map = \Illuminate\Support\Str::random(10);
        $pivot->save();
        return response()->json(["message"=>"the link is added."],200);

    }
}
