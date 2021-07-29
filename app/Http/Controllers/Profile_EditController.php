<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Profile_EditController extends Controller
{
   public function edit(){
        return view('edit_profile');
    }
}
