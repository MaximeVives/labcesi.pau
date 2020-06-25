@extends('layouts\base')

@section('currentpage-css')
    <link rel="stylesheet" href="css/products.css">
    <link rel="stylesheet" href="css/liste-commande.css">
@endsection

@section('meta-description')
Sur cette page, vous retrouverez tous les produits ajoutés au panier.
@endsection

@section('title')
    labcesi.pau.fr - Panier
@endsection

@section('page-title')
    PANIER
@endsection

@section('content')
    <div class="content-cart">
        @if (Cart::count() > 0)
                <div class="px-4 px-lg-0">
                    <div class="pb-5">
                    {{-- <div class="container"> --}}
                        {{-- <div class="row"> --}}
                        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                
                            <!-- Shopping cart table -->
                            <div class="table-responsive">
                            <table class="table content-table">
                                <thead>
                                <tr>
                                    <th scope="col" class="border-0 bg-light">Produit</th>
                                    <th scope="col" class="border-0 bg-light">Couleur</th>
                                    <th scope="col" class="border-0 bg-light">Quantité</th>
                                    <th scope="col" class="border-0 bg-light">Supprimer</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach (Cart::content() as $product)
                                <tr>
                                    <th scope="row">
                                    <div class="p-2">
                                        <img src="storage/image/{{ $product->model->url_pic }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                                        <div class="ml-3 d-inline-block align-middle">
                                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block">{{ $product->name }}</a></h5>
                                        </div>
                                    </div>
                                    <th><strong>{{ $product->options->color}}</strong></th>
                                    <th>
                                        <select name="qty" id="qty" class="custom-select">
                                            <?php 
                                            if (Auth::user()->ID_type == 1) { 
                                                $max = 5;
                                            }
                                            elseif (Auth::user()->ID_type == 2) { 
                                                $max = 10;
                                            }
                                            else 
                                            {
                                                $max = 20;
                                            }?>
                                            @for ($i = 1 ; $i <= $max; $i++)
                                                @if ($i == $product->qty )
                                                <option value="{{ $i }}" selected>{{ $i}}</option>
                                                @else 
                                                <option value="{{ $i }}">{{ $i}}</option>
                                                @endif
                                            @endfor
                                    </th>
                                    <th>
                                        <form action="{{ route('cart.destroy', $product->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bouton"><i class="fa fa-trash"></i></a>
                                            </form>
                                    </th>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                            <!-- End -->
                        </div>
                        {{-- </div> --}}

                        <form class="btn" action="{{ route('order.add') }}" method="POST">
                            @csrf
                            {{-- <div class="row py-5 p-4 bg-white rounded shadow-sm"> --}}
                                <button type="submit" class="bouton">Confirmer la commande</button>
                            {{-- </div> --}}
                        </form>
                    {{-- </div> --}}
                    </div>
                </div>
        @else
            <p>Votre panier est vide.</p>
        @endif
    </div>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success')}}
        </div>
    @endif

@endsection