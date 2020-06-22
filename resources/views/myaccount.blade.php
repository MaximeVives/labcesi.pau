@extends('layouts\base')

@section('currentpage-css')
    <link rel="stylesheet" href="css/myaccount.css">
@endsection

@section('meta-description')
Un problème avec votre compte Labcesi ? Vous pouvez venir modifier tout vos paramètres ici.
@endsection

@section('title')
    labcesi.pau.fr - Paramètres du compte
@endsection

@section('page-title')
    Paramètres
@endsection

@section('content')
    <div class="content">
        <div class="content-param" id="informations">
            <div class="encart"><a href="/mes-infos">Mes informations</a></div>
        </div>
        <div class="content-param" id="donnees">
            <div class="encart"><a href="/mes-donnees">Mes données</a></div>
        </div>
        <div class="content-param" id="historique-commandes">
            <div class="encart"><a href="/mes-commandes">Mes commandes</a></div>
        </div>
        <div class="content-param" id="stop-cookies">
            <div class="encart"><a href="/fin-cookies">Utilisation des cookies</a></div>
        </div>
    </div>

    @if(session()->has('up'))
        <script lang="javascript">
            alert("Vos nouveaux paramètres ont bien été appliqués");
        </script>
    @endif 

    @if(session()->has('export'))
        <script lang="javascript">
            alert("Le fichier a bien été téléchargé");
        </script>
    @endif 
@endsection