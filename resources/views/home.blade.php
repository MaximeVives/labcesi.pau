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

<p class="intro">Bienvenue, en quelques mots, le <span class="lab">LabCesi</span> c'est : </p>

    


<div class="card-all">
        <div class="lab-descr noir imaginer">
            <h3>Imaginer</h3>
            <div class="word-descr">
                <div class="sur-image-text">
                    <h3>Imaginer</h3>
                    <p>Imaginer mais aussi créer et inventer, l'étape la plus importante de toute innovation.</p>
                </div>
            </div>
        </div>


  
        <div class="lab-descr jaune collaborer">
            <h3>Collaborer</h3>
            <div class="word-descr">
                <div class="sur-image-text">
                    <h3>Collaborer</h3>
                    <p>L’entraide et la coopération pour faire avancer d’avantage les projets.</p>
                </div>
            </div>
        </div>

        <div class="lab-descr noir experimenter">
            <h3>Expérimenter</h3>
            <div class="word-descr">
                <div class="sur-image-text">
                    <h3>Expérimenter</h3>
                    <p>Essayer et ne jamais s’arrêter avant d’atteindre le succès...</p>
                </div>
            </div>
        </div>
    </div>
    <p class="promo-product"><span class="lab">LabCesi</span> est solidaire, grâce à nos fablab manager le labcesi vient en aide aux commerçants locaux en proposant des produits permettant la distanciation sociale.</p>
    <p class="link-product">Venez découvrir <button class="bouton"><a href="/products">Nos produits</a></button> dès à présent</p>
    

    <script>
        $( ".lab-descr" ).mouseout(function() {
            $(this).children("div").children("div").addClass("counterAnim");
            console.log($(this).children("div").children("div").hasClass("counterAnim"));
        });


        $( ".lab-descr" ).mouseover(function() {
            $(this).children("div").children("div").removeClass("counterAnim");
            console.log($(this).children("div").children("div").hasClass("counterAnim"));
        });
    </script>

    @if(session()->has('jsAlert'))
    <script lang="javascript">
        alert("Votre compte a été supprimé");
    </script>
    @endif
@endsection