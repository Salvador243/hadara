<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\isEmpty;

class Profile_EditController extends Controller
{
   public function edit($user){
      $data = User::where('email','=', $user)->get();
        return view('edit_profile')->with([
            'user' => $data,
        ]);
    }

    public function update(Request $datos){
        if(request('avatar') != null ){
            User::where('email','=',request('email'))->update([
                'avatar' => request('avatar')
            ]);
        }
        if(request('signature') != null ){
            User::where('email','=',request('email'))->update([
               'enableSignature' => '1',
               'signature' => request('signature')
            ]);
        }

      User::where('email','=',request('email'))->update([
         'name' => request('name'),
         'email' => request('email')
      ]);
      return redirect()->route('Pdetails');
    }
}
