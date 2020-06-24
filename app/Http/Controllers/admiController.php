<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Product;
use App\Color;
use App\Material;

class admiController extends Controller
{
    public function admi()
    {
            $produits = Product::all();
            $colors = Color::all();
            $materials = Material::all();
            // Renvoie vers la page d'adminstration
            return view('admi/page_admi', array('data_produit' => $produits, 'data_color' => $colors, 'data_material' => $materials));
    }  
    public function ajout_Produit()
    {
        return view('admi/Add_Product');
    }  
    public function store()
    {
        $product = new Product;
        $product->name_product = request('name_product');
        $product->quantity = request('quantity');
        $product->description = request('description');
        $product->url_pic = request('url_pic');
        // Sauvegarder du nouveau produit
        $product->save();
        // Renvoie vers la page d'adminstration
        return redirect('/admi');
    }
    public function delete()
    {
        // récupération de l'ID_product
        request()->validate([
            'ID_product' => ['required'],
        ]);
         // Récupération de la ligne correspondante
        $product = Product::find(request('ID_product'));
        // Suprresion de la ligne
        $product->delete();
        // Renvoie vers la page d'adminstration
        return redirect('/admi');
    } 
    public function update()
{
    // récupération de l'ID_product
    request()->validate([
        'ID_product' => ['required'],
    ]);
       // Récupération de la ligne correspondante
       $product = Product::find(request('ID_product'));
       // Récolte des nouvelles informations
       $product->name_product = request('name_product');
       $product->quantity = request('quantity');
       $product->description = request('description');
       $product->url_pic = request('url_pic');
       // Sauvegarder les modifications
       $product->save();
       // Renvoie vers la page d'adminstration
        return redirect('/admi');
} 
}

