<?php

namespace App\Http\Controllers;

use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{


    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addMedia(Request $request){
        $this->validate($request,[
            "title"=>"string|required",
            "file"=>"file|required",
        ]);
        $media = new Media();
        $media->title = $request->title;
        $media->more = $request->more;
        $uploaded = $this->upload($request);
        $media->fileName = $uploaded["name"];
        $media->size = $uploaded["size"];
        $media->totalDownload = 0;
        $media->save();
        return response()->json(["response"=>"added successfully."],200);

    }

    private function upload(Request $request)
    {

        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $filename = time() . $file->getClientOriginalName();
            $path = public_path() . '/media/';
            $size = $file->getSize();
            $file->move($path, $filename);
            return ["name"=>$filename, "size"=>$size];
        }
        return false;
    }

}
