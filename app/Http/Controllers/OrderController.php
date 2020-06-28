<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\validCartMail;



use App\Product;
use App\Color;
use App\Order;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {

        foreach (Cart::content() as $product) {

            $Color = Color::where('name_color', $product->options->color)->get('ID_color');
            foreach ($Color as $c) {
                $c = $c->ID_color;
            }
            $color = Color::find($c);
            // dd($color);


            $user = Auth::user();
            $produit = Product::find($product->id);

            $order = new Order;
            $order->ID_product = $product->id;
            $order->ID_color = $c;
            $order->ID_user = Auth::id();
            $order->quantity_order = request('quantity_MAJ_'.$order->ID_product);
            $order->isDelivered = 0;

            // dd($order->quantity);
            Mail::to(Auth::user()->email)->send(new validCartMail($order, $produit, $user, $color));

        //    #TODO : Décrémenter les stocks

            $order->save();

            Cart::destroy();
        }
        // Mail::to(Auth::user()->email)->send(new validCartMail()); 
        return redirect('/products')->with('success', 'Le produit a bien été ajouté.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
