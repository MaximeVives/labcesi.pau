<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mentionController extends Controller
{
    public function mention()
    {
        return view('mention/condition');
    }  
    public function vente()
    {
        return view('mention/condition_de_vente');
    } 
}
class venteController extends Controller
{
    public function ventes()
    {
        return view('mention/condition_de_vente');
    }  
}
