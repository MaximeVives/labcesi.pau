<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;
use App\Http\Requests;
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
    public function store(Request $request)
    {
    // $file = $request->file('image');

        $request->validate([
            'name_product' => ['required'],
            'quantity' => ['required'],
            'description' => ['required'],
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2000',
        ]);


        $file = $request->image;
        $filename = rand().'.'.$file->getClientOriginalExtension();
        $stock = public_path("storage\image");
        // dd($stock);
        // $path = $request->image->path();

        $file->move($stock, $filename);

        $product = new Product;
        $product->name_product = request('name_product');
        $product->quantity = request('quantity');
        $product->description = request('description');
        $product->url_pic = $filename;

        $product->save();

        return redirect('/admi')->with('add', "Produit ajouté");


        // request()->validate([
        //     'ID_product' => ['required'],
        //     'name_product' => ['required'],
        //     'quantity' => ['required'],
        //     'description' => ['required'],
        //     'url_pic' => ['required|image|max:2000'],
        // ]);

        // $product = new Product;
        // $product->name_product = request('name_product');
        // $product->quantity = request('quantity');
        // $product->description = request('description');
        // $product->url_pic = request('url_pic');


        // Storage::disk("public")->put('image/'.$product->url_pic, request('url_pic'));
        // Sauvegarder du nouveau produit
        // $product->save();
        // Renvoie vers la page d'adminstration
        // return redirect('/admi');
    }


    public function update(Request $request)
    {
        // récupération de l'ID_product
        request()->validate([
            'ID_product' => ['required'],
            'name_product' => ['required'],
            'quantity' => ['required'],
            'description' => ['required'],
            'url_pic' => ['required'],
        ]);
        // Récupération de la ligne correspondante
        $product = Product::find(request('ID_product'));
        // dd($product);
        // Récolte des nouvelles informations
        $product->name_product = request('name_product');
        $product->quantity = request('quantity');
        $product->description = request('description');
        $product->url_pic = request('url_pic');
        // Sauvegarder les modifications
        $product->save();
        // Renvoie vers la page d'adminstration
        return redirect('/admi')->with('modif', "Produit modifié");
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
        return redirect('/admi')->with('suppr', "Produit supprimé");
    }

}
