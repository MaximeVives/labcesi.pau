@extends('layouts\base')

@section('meta-description')
Labcesi permet aux entreprises, aux particuliers ou encore aux personnels soignants de s'approvisionner en produit anti-postillons ou encore en stylet de contact
@endsection

@section('currentpage-css')
    <link rel="stylesheet" href="css/home.css">
    <script lang="javascript" src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous">
    </script>
@endsection

@section('title')
    labcesi.pau.fr
@endsection

@section('page-title')
    LABCESI
@endsection

@section('content')

<p class="intro">En quelques mots, le <span class="lab">LabCesi</span> c'est : </p>

    


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
    <p>Un lieu de création, d'inovation et de développement pour les étudiants dans le cadre scolaire mais aussi dans leurs projets extra scolaires</p>
    

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