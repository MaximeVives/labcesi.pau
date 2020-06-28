@extends('layouts\base')

@section('currentpage-css')
    <link rel="stylesheet" href="css/liste-commande.css">
@endsection

@section('meta-description')
Sur cette page, vous retrouverez tous les produits Lab'cesi de Pau. Visière cesi et stylet cesi sont nos seuls produits pour le moment...
@endsection

@section('page-title')
    Mes commandes - labcesi.pau.fr
@endsection


@section('title')
    labcesi.pau.fr - Mes commandes
@endsection

@section('page-title')
    PRODUITS
@endsection

@section('content')
<div class="content-solo">
    <div class="attente-confirmation">
        <h3>Commandes en attente de <span id="conf">validation</span></h3>

        <table class="content-table">
            <thead>
                <tr>
                    <th>Nom du produit</th>
                    <th>Couleur</th>
                    <th>Quantité</th>
                    <th>Date de Livraison</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_order as $order)
                {{-- {{ dd($order) }} --}}
                    @if (empty($order->date_delivery))
                    <tr>
                        <th>{{ $order->name_product }}</th>
                        <th>{{ $order->name_color }}</th>
                        <th>{{ $order->quantity_order }}</th>
                        <th>Non défini</th>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="attente-confirmation">
        <h3 style="margin-top: 80px;">Commandes en attente de <span id="conf">livraison</span></h3>

        <table class="content-table">
            <thead>
                <tr>
                    <th>Nom du produit</th>
                    <th>Couleur</th>
                    <th>Quantité</th>
                    <th>Date de Livraison</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_order as $order)
                {{-- {{ dd($order) }} --}}
                    @if (!(empty($order->date_delivery)))
                    <tr>
                        <th>{{ $order->name_product }}</th>
                        <th>{{ $order->name_color }}</th>
                        <th>{{ $order->quantity_order }}</th>
                        <th>{{ $order->date_delivery }}</th>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    

@endsection