<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Validator;

use App\Mail\validOrderMail;

use App\Product;
use App\Color;
use App\Material;
use App\Order;
use App\User;
use App\Reservation;
use App\Outil;


class admiController extends Controller
{

    public function admi()
    {
        return view('admi/adminboard');
    }

    public function modif_produit()
    {
            $produits = Product::all();
            $colors = Color::all();
            $materials = Material::all();
            // Renvoie vers la page d'adminstration      
    
            return view('admi/modif_produit', array('data_produit' => $produits, 'data_color' => $colors, 'data_material' => $materials));
    }
    public function ajout_Produit()
    {
        return view('admi/Add_Product');
    }

    public function liste_commande()
    {

        //$order = Order::where("ID_user", Auth::user()->id); //Fonctionne pour un utilisateur qui veut voir ces commandes3
        $order = Order::join('users', 'orders.ID_user', '=', 'users.id')
                        ->join('products', 'orders.ID_product', '=', 'products.ID_product')
                        ->join('colors', 'orders.ID_color', '=', 'colors.ID_color')
                        ->orderBy('date_delivery', 'asc')
                        ->orderBy('ID_order', 'asc')
                        // ->latest()
                        ->get();
        // dd($order);
        
        return view('admi/liste_commande', array('data_order' => $order));
    }


    public function valOrder(Request $request)
    {

        $request->validate([
            'ID_order' => ['required'],
            'ID_user' => ['required'],
            'ID_product' => ['required'],
            'color' => ['required'],
            'qty' => ['required'],
            'date_delivery' => ['required'],
        ]);

        $product=Product::find(request('ID_product'));
        $color=Color::find(request('color'));
        $order=Order::find(request('ID_order'));
        $mail=request('emailUser');
        // dd($mail);

        $order->ID_product = request('ID_product');
        $order->ID_color = request('color');
        $order->quantity_order = request('qty');
        $order->date_delivery = request('date_delivery');

        $order->save();
        

        Mail::to($mail)->send(new validOrderMail($order,$product,$color));
        return redirect('/liste-commande')->with('validate', "Commande confirmée");
    }


    public function valDelivery(Request $request)
    {

        $request->validate([
            'ID_order' => ['required'],
            'ID_product' => ['required'],
        ]);


        $order=Order::find(request('ID_order'));
        // dd($mail);

        $order->ID_product = request('ID_product');
        $order->isDelivered = 1;
   
        $order->save();
        

        // Mail::to($mail)->send(new validOrderMail($order,$product,$color));
        return redirect('/liste-commande')->with('delivered', "Commande livrée");
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




