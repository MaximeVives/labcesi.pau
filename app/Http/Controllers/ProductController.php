<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Color;
use App\Material;

class ProductController extends Controller
{
    public function store()
    {
        $product = new Product;
        $product->name_product = request('name_product');
        $product->quantity = request('quantity');
        $product->description = request('description');
        $product->url_pic = request('url_pic');
        $product->save();

        return view('admi/page_admi');
    } 
}
