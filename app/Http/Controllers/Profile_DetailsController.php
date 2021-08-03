<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;


class Profile_DetailsController extends Controller
{
    public function details(){

        $id = DB::table('users')
            ->select('id')
            ->where('email','=',Auth::user()->email)
            ->get();

/*        $pila = array();
        $path = public_path('storage/files/' . $id[0]->id);
        if (is_dir($path) != false) {
            $files = File::allFiles($path);
            foreach ($files as $file) {
                array_push($pila, $file->getRelativePathname());
            }
        }*/


        $data = DB::table('pictures as p')
            ->join('users as u','p.user_id','=','u.id')
            ->select('p.*')
            ->where('u.email','=',Auth::user()->email)
            ->get();


        return view('profile_details',)->with([
            'data' => $data,
        ]);
    }
}