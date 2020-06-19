<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Product;

class admiController extends Controller
{
    public function admi()
    {
        return view('admi/page_admi');
    }  
    public function ajout_Produit()
    {
        return view('admi/Add_Product');
    }  
}

