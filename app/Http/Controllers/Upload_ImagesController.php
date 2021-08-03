<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Picture;

class Upload_ImagesController extends Controller
{
    public function upload(){
        return view('upload_images');
    }

    public function save(Request $data, $email){

        $aux = $data->except(['_token']);
        $id = DB::table('users')
            ->select('id')
            ->where('email','=',$email)
            ->get();
        
        $aux = $data->all() + ['user_id' => $id[0]->id];

        if ($data->hasFile('path')) {
            $image = $data->file('path');
            $destination_path = public_path('storage/register/'.$id[0]->id);
            $image_name = $image->getClientOriginalName();
            $path = $data->path->move($destination_path, $image_name);
            $aux['path'] = $image_name;
        }


        (new \App\Picture)->create($aux);

        return view('upload_images');
    }
}
