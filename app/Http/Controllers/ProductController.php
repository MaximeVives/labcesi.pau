<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function store(){
        $product = new Product;
        $product->name_product = request('name_product');
        $product->ID_color = request('ID_color');
        $product->quantity = request('quantity');
        $product->description = request('description');
        $product->ID_material = request('ID_material');
        $product->url_pic = request('url_pic');
        $product->save();

        return view('admi');
    }
}
