@extends('layouts\base')

@section('currentpage-css')
    <link rel="stylesheet" href="css/liste-commande.css">
@endsection

@section('meta-description')
Un problème avec votre compte Labcesi ? Vous pouvez venir modifier tout vos paramètres ici.
@endsection

@section('title')
    labcesi.pau.fr - Commandes en attente
@endsection

@section('page-title')
    Commandes
@endsection

@section('content')
    <div class="content">
        <div class="attente-confirmation">
            <h3>Commandes en attente de <span id="conf">confirmation</span></h3>

            <table class="content-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nom du produit</th>
                        <th>Couleur</th>
                        <th>Quantité</th>
                        <th>Choisir la date de livraison</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_order as $order)
                    {{-- {{ dd($order) }} --}}
                    @if (empty($order->date_delivery))
                    <tr>
                        <th>{{ $order->lastname }}</th>
                        <th>{{ $order->firstname }}</th>
                        <th>{{ $order->name_product }}</th>
                        <th>{{ $order->name_color }}</th>
                        <th>{{ $order->quantity_order }}</th>
                        <th>
                            <form action="/transform-delivery" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="ID_order" value="{{ $order->ID_order }}">
                                <input type="hidden" name="ID_user" value="{{ $order->ID_user }}">
                                <input type="hidden" name="ID_product" value="{{ $order->ID_product }}">
                                <input type="hidden" name="color" value="{{ $order->ID_color }}">
                                <input type="hidden" name="qty" class="qty" value="{{ $order->quantity_order }}">
                                <input type="date" id="start" name="date_delivery"
                                {{-- value="" --}}
                                min="2018-01-01" max="2090-12-31" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" required>
                                <button type="submit" class="bouton">Valider la commande</button>
                            </form>
                        </th>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="attente-livraison">
            <h3>Commandes en attente de <span id="livr">livraison</span></h3>

            <table class="content-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
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
                            <th>{{ $order->lastname }}</th>
                            <th>{{ $order->firstname }}</th>
                            <th>{{ $order->name_product }}</th>
                            <th>{{ $order->name_color }}</th>
                            <th>{{ $order->quantity_order }}</th>
                            <th>{{ $order->date_delivery }}</th>
                        </tr>
                        @endif
                    @endforeach
                </tbody>

            </table>            
        </div>
    </div>

    @if(session()->has('validate'))
        <script lang="javascript">
            alert("La commande a été validée");
        </script>
    @endif
@endsection