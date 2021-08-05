<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        $modify = $datos->all();
        $modify = request()->except(['_token','_method']);
    
        if ($datos->hasFile('avatar')) {
            $image = $datos->file('avatar');
            $destination_path = public_path('storage/avatar_profiles');
            $image_name = $image->getClientOriginalName();
            $path = $datos->avatar->move($destination_path, $image_name);
            $modify['avatar'] = $image_name;
        }
        if($datos->signature == null){
            DB::table('users')
            ->where('email','=',$datos->email)
            ->update(['enableSignature' => 0,]);
        }else{
            DB::table('users')
               ->where('email','=',$datos->email)
               ->update(['enableSignature' => 1,]);
        }
        (new \App\User)->where('email','=',$modify['email'])->update($modify);
        
      return redirect()->route('Pdetails',$datos->email);
    }
}
