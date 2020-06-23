<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Color;
use App\Material;

class mainController extends Controller
{
    public function home(){return view('home');}
    public function products(){return view('products');}
    public function sponsors(){return view('sponsors');}

    // Fiche technique par produit -> URL dynamique
    public function fiche_tech($n){
        $produits = Product::find($n);
        $colors = Color::all();
        $materials = Material::all();
        return view('fiche_produit', array('data_produit' => $produits, 'data_color' => $colors, 'data_material' => $materials));
    }
}
