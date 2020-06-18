<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class mainController extends Controller
{
    public function home(){return view('home');}
    public function products(){return view('products');}  
    public function sponsors(){return view('sponsors');}
    
    // Fiche technique par produit -> URL dynamique
    public function fiche_tech($n){
        $produits = Product::find($n);
        return view('fiche_produit', array('data_produit' => $produits));
    }  
}
