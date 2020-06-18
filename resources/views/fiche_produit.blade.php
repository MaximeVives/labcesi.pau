@extends('layouts/base')

@section('currentpage-css')
    <link rel="stylesheet" href="../css/fiche_prod.css">
    <script lang="javascript" src="https://code.jquery.com/jquery-3.5.1.js"
integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
crossorigin="anonymous"></script>
    {{-- <script src="../js/fiche_produit.js"></script> --}}
@endsection

@section('meta-description')
Cette page vous fait découvrir la création CESI : {{ $data_produit->name_product}}. Nous espérons qu'il vous plaira. 
@endsection

@section('title')
    labcesi.pau.fr - Produits
@endsection

{{-- @section('page-title')
    PRODUITS : {{ $n_prod }}
@endsection --}}

@section('content')
    <div class="prod-content">
        <div class="prod-fiche-left">
            <img src="image/{{ $data_produit->url_pic }}" alt="visiere_cesi">
        </div>
        <div class="prod-fiche-right">
            <div class="prod-fiche-title">
                <h3>{{ $data_produit->name_product }}</h3>
            </div>
            <div class="prod-fiche-descr">
                <p>{{ $data_produit->description}}</p><br><br>
                <p>Ce produit est fait en {{ $data_produit->ID_material }}</p>
            </div>
            <form action="post">

                {{-- Pour la couleur et la quantité il faudra faire une autre requete SQL
                    Afin d'avoir la table couleur/qty en fonction de l'id produit
                    Ce qui est plus simple que de récupérer la couleur/qty depuis produit --}}


                <div class="prod-fiche-detail">
                    <div class="prod-fiche-list-color">
                        <select id="color-select" class="color" name="color-select">
                            <option id="default_size" value="0" disabled selected>Couleur :</option>
                            <option value="rouge">Rouge</option>
                            <option value="vert">Vert</option>
                            <option value="bleu">Bleu</option>
                        </select>
                    </div>
                    <div class="prod-fiche-list-quantity">
                        <select id="quantity-select" class="qty" name="quantity-select">
                            <option id="default_qty" value="0"  disabled selected>Quantité :</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                </div>
                <div class="prod-fiche-addcart">
                    <input type="submit" value="Ajouter au panier">
                </div>
            </form>
        </div>
    </div>
@endsection