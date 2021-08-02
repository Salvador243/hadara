<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImageController extends Controller
{
    public function store(Request $request, $email)
    {
        $id = DB::table('users')
            ->select('id')
            ->where('email','=',$email)
            ->get();
            
        $image = $request->file('file');
        $avatarName = $image->getClientOriginalName();

        //Crear carpeta de archivos si no existe
        $destination_path = public_path('storage/files');
        if(!file_exists($destination_path))
            mkdir($destination_path, 0777, true);


        //Crear carpeta de equipo si no existe
        $team_path = public_path('storage/files/'.$id[0]->id);
        if(!file_exists($team_path))
            mkdir($team_path, 0777, true);


        $image->move($team_path, $avatarName);
        
        $imageUpload = new Image();
        $imageUpload->filename = $avatarName;
        $imageUpload->save();






        


      //  return response()->json(['success'=>$avatarName]);
    }
}
