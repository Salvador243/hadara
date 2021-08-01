<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;
use App\User;

class HomeController extends Controller
{
    /**
     * Show the index page with all the pictures
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request) {
        //Get the type of result that will return
        $results;
        $type = 1;

        if(isset($_GET['radioSearch']) && $request->input('radioSearch') == 'profiles'){
            $results = User::where('name', 'like', '%'.$request->input('search').'%')->get();
            $type = 0;
        }else{
            $results = Picture::where('title', 'like', '%'.$request->input('search').'%')
            ->orwhere('description', 'like', '%'.$request->input('search').'%')
            ->get();
        }

        return view('index')->with([
            'results' => $results,
            'type' => $type,
        ]);        
    }
}
