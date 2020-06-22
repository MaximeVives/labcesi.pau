@extends('layouts\base')

@section('meta-description')
Labcesi permet aux entreprises, aux particuliers ou encore aux personnels soignants de s'approvisionner en produit anti-postillons ou encore en stylet de contact
@endsection

@section('currentpage-css')
    <link rel="stylesheet" href="css/home.css">
@endsection

@section('title')
    labcesi.pau.fr
@endsection

@section('page-title')
    LABCESI
@endsection

@section('content')

<p class="intro">En quelques mots, le <span class="lab">LabCesi</span> c'est : </p>

    <div class="lab-descr noir">
        <div class="word-descr">
            <div class="word-descr-left">
                <img src="image/signature_LABCESI.jpg" alt="imaginer">
            </div>
            <div class="word-descr-right">
                <h3>Imaginer</h3>
                <p>Le LabCesi c'est concevoir, grâce à d'ingénieuse personnes, des objets de demain pour tous.</p>
            </div>
        </div>
    </div>

    <div class="lab-descr jaune">
        <div class="word-descr">
            <div class="word-descr-left">
                <h3>Collaborer</h3>
                <p>Le LabCesi c'est concevoir, grâce à d'ingénieuse personnes, des objets de demain pour tous.</p>
            </div>
            <div class="word-descr-right">
                <img src="image/signature_LABCESI.jpg" alt="imaginer">
            </div>
        </div>
    </div>

    <div class="lab-descr noir">
        <div class="word-descr">
            <div class="word-descr-left">
                <img src="image/signature_LABCESI.jpg" alt="imaginer">
            </div>
            <div class="word-descr-right">
                <h3>Expérimenter</h3>
                <p>Le LabCesi c'est concevoir, grâce à d'ingénieuse personnes, des objets de demain pour tous.</p>
            </div>
        </div>
    </div>

    @if(session()->has('jsAlert'))
    <script lang="javascript">
        alert("Votre compte a été supprimé");
    </script>
    @endif
@endsection