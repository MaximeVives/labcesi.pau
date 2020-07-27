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
        <h2>Ajouter un événement</h2>
        <form action="#" method="post">
            <p>Date de début</p>
            <input type="datetime" value="#TODO"> {{--Non modifiable--}}

            <p>Date de fin</p>
            <input type="datetime" value="datedebut + 2h">
        </form>
    </div>
@endsection