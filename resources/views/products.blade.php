@extends('layouts\base')

@section('currentpage-css')
    <link rel="stylesheet" href="css/products.css">
@endsection

@section('meta-description')
Sur cette page, vous retrouverez tous les produits Lab'cesi de Pau. Visière cesi et stylet cesi sont nos seuls produits pour le moment...
@endsection

@section('title')
    labcesi.pau.fr - Produits
@endsection

@section('page-title')
    PRODUITS
@endsection

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($data_produit as $produit)
            <div class="product-grid">
                <div class="product-image" style="background-image: url('storage/image/{{ $produit->url_pic }}')">
                    <div class="name-product">
                        <h4>{{ $produit->name_product }}</h4>
                    </div>
                </div>
                <div class="link-prod">
                    <a class="discover" href="/{{ $produit->ID_product }}">Découvrir</a>
                    @if ($produit->quantity > 5)
                        <div class="product-availability"><span><span class="dot-stock green-dot"></span> En Stock</span></p></div>
                    @elseif(($produit->quantity <= 5) && ($produit->quantity >= 1))
                        <div class="product-availability"><span><span class="dot-stock orange-dot"></span> Quantité limitée</span></p></div>
                    @elseif($produit->quantity <= 0)
                        <div class="product-availability"><span><span class="dot-stock red-dot"></span> Rupture de stock</span></p></div>
                    @endif
                </div>
            </div>
            @endforeach

        </div>
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success')}}
        </div>

    @endif
@endsection
