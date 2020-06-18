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
    <div class="description-param">
        <div class="description">
            <h2>Description</h2>
            <p>Le LabCesi se mobilise et vient apporter son aide dans cette période de crise.<br><br>
                Nous vous proposons donc une gamme de produit que nous avons conçu, développer, et imprimer pour vous. <br><br>
                Nous avons voulu allez plus loin en vous proposant ces produits totalement gratuitement !
            </p>
        </div>
        <div class="discover">
            <p>Découvrir notre collection</p>
            <p><a href="#ancre"><i class="fas fa-arrow-down"></i></a></p> 
        </div>
    </div>
        <div class="product-page" id="ancre">

        </div>
@endsection