<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mainController extends Controller
{
    public function home(){return view('home');}
    public function products(){return view('products');}  
    public function sponsors(){return view('sponsors');}  
}
