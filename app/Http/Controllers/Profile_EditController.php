<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Profile_EditController extends Controller
{
   public function edit(Request $user){
        return view('edit_profile');
    }

    public function update(Request $email){
      return Request;
    }
}
