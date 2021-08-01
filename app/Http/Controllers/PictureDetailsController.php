<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use App\User;
use App\Comment;

class PictureDetailsController extends Controller
{
    public function showView($id){
        $picture = Picture::where('id', $id)->first();
        $user = User::where('id', $picture->user_id)->first();
        $comments = Comment::where('picture_id', $id)->with('user')->get(); 

        return view('picture_details')->with([
            'picture' => $picture,
            'upload_user' => $user,
            'comments' => $comments,
        ]);
    }
}
