@extends('layouts\base')

@section('currentpage-css')
    <link rel="stylesheet" href="css/donnees.css">
@endsection

@section('meta-description')
Sur cette page, vous retrouverez tous les produits Lab'cesi de Pau. Visière cesi et stylet cesi sont nos seuls produits pour le moment...
@endsection

@section('title')
    labcesi.pau.fr - Mes données
@endsection

@section('page-title')
    Mes données personnelles
@endsection

@section('content')
    <div class="content">
        <div class="content-param delete-account">
            <div class="cond">
                <h3>Demande d'effacement</h3>
                <p>Vous avez le droit de modifier toutes les informations personnelles figurant sur la page "Mon compte".
                    Vous pouvez également supprimer votre compte ainsi que les données vous concernant en cliquant sur "Supprimer le compte".
                </p>
                <div class="form">
                    <a href="/suppr-account" class="button suppr">Supprimer le compte</a>
                </div>
            </div>
        </div>
        <div class="content-param get-data-account">
            <div class="cond">
                <h3>Accès aux données personnelles</h3>
                <p>
                    Vous pouvez à n'importe quel moment, accéder aux données que vous avez renseignées sur ce site.
                    Cliquez sur "Exporter mes données" pour télécharger une copie de vos données personnelles dans un fichier csv.
                </p>
                <div class="form">
                    <a href="/perso-data" class="button export">Exporter mes données</a>
                </div>
            </div>
        </div>
    </div>
@endsection