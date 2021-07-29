<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Profile_DetailsController extends Controller
{
    public function details(){
        return view('profile_details');
    }
}
