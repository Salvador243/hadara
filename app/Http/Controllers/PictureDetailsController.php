<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PictureDetailsController extends Controller
{
    public function showView(){
        return view('picture_details');
    }
}
