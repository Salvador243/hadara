<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Picture;

class HomeController extends Controller
{
    /**
     * Show the index page with all the pictures
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }
}
