@extends('layouts\base')

@section('currentpage-css')
    <link rel="stylesheet" href="css/myaccount.css">
@endsection

@section('meta-description')
Un problème avec votre compte Labcesi ? Vous pouvez venir modifier tout vos paramètres ici.
@endsection

@section('title')
    labcesi.pau.fr - Centre de commandement ADMIN
@endsection

@section('page-title')
    Tableau de bord admin
@endsection

@section('content')
    <div class="content">
        <div class="content-param" id="informations">
            <div class="encart"><a href="/modif">Modifier un produit</a></div>
        </div>
        <div class="content-param" id="donnees">
            <div class="encart"><a href="/ajout_produit">Ajouter un produit</a></div>
        </div>
        <div class="content-param" id="historique-commandes">
            <div class="encart"><a href="/liste-commande">Commandes en attente</a></div>
        </div>
        {{-- <div class="content-param" id="stop-cookies">
            <div class="encart"><a href="/">Commandes à valider</a></div>
        </div> --}}
    </div>

    
    @if(session()->has('add'))
    <script lang="javascript">
        alert("Votre Produit a été ajouté");
    </script>

    @endif

    @if(session()->has('modif'))
        <script lang="javascript">
            alert("Votre produit a été mis à jour");
        </script>
    @endif 

    @if(session()->has('suppr'))
        <script lang="javascript">
            alert("Votre produit a bien été supprimé");
        </script>
    @endif 
@endsection