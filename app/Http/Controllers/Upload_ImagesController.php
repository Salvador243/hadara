<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Upload_ImagesController extends Controller
{
    public function upload(){
        return view('upload_images');
    }
}
