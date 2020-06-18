<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class admiController extends Controller
{
    public function admi()
    {
        return view('admi/page_admi');
    }  
    public function modif()
    {
        return view('admi/edit');
    }  
}

