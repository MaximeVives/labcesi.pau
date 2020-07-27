@extends('layouts\base')

@section('currentpage-css')
    {{-- <link rel="stylesheet" href="css/myaccount.css"> --}}
    <link rel="stylesheet" href="css/calendar.css">
    <link rel="stylesheet" href="FullCalendar/main.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{header("Access-Control-Allow-Origin: *")}}

@endsection

@section('meta-description')
    L'administration peut voir et gérer les réservations
@endsection

@section('title')
    labcesi.pau.fr - Calendrier des reservations
@endsection

@section('page-title')
    Calendrier des reservations
@endsection

@section('content')

    <div class="user" style="display: none;">
        <input class="id" type="hidden" value="{{Auth::user()->id}}">
    </div>
    @foreach ($data_reservation as $reservation)
            <div style="display: none;" class="compteur {{$reservation->ID_reservation}}">
                <input class="ID_reservation" type="hidden" value="{{$reservation->ID_reservation}}">
                <input class="ID_user" type="hidden" value="{{$reservation->ID_user}}">
                <input class="title" type="hidden" value="{{$reservation->title}}">
                <input class="date_debut" type="hidden" value="{{$reservation->date_debut}}">
                <input class="date_fin" type="hidden" value="{{$reservation->date_fin}}">
                <input class="ID_outil" type="hidden" value="{{$reservation->ID_outil}}">
                <input class="name_outil" type="hidden" value="{{$reservation->name_outil}}">
            </div>
    @endforeach
    <div id="calendar">
    </div>

    <div class="form-hidden">
        <form action="/addEvent" method="post" class="add-event">
            @csrf
            <input type="hidden" name="ID_user" value="{{$reservation->ID_user}}"> {{--Ici l'id de l'user doit être celui de la personne connectée --}}
            <input type="hidden" name="title" value="{{Auth::user()->firstname}} {{Auth::user()->lastname}}">
            <input type="hidden" name="date_debut">
            <input type="hidden" name="date_fin">
            <input type="hidden" name="ID_outil">
        </form>

        <form action="/upEvent" method="post" class="up-event">
            @csrf
            <input type="hidden" name="ID_Evenement">
            <input type="hidden" name="ID_user"> {{--Ici l'id de l'user doit être celui de l'event à modifier --}}
            <input type="hidden" name="title">
            <input type="hidden" name="date_debut">
            <input type="hidden" name="date_fin">
            <input type="hidden" name="ID_outil">
        </form>
    </div>
    <script src="FullCalendar/main.js"></script>
    <script lang="javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let event = [];

            let allHourStart = []; //Permet dechecker si la date de départ n'est pas déjà prise
            let allHourEnd = [];

            let bgColor = "";
            let txtColor ="";         


            let elem = document.getElementsByClassName("compteur");


            for (let i = 0; i < elem.length; i++) {
                
                let id_reser = elem[i].childNodes[1].value;
                let id_user = elem[i].childNodes[3].value;
                let title = elem[i].childNodes[5].value;
                let date_debut = elem[i].childNodes[7].value;
                let date_fin = elem[i].childNodes[9].value;
                let id_outil = elem[i].childNodes[11].value;
                let name_outil = elem[i].childNodes[13].value;
                let url = "/calendar/".concat(elem[i].classList[1]);
                // console.log(typeof id_outil);


                allHourStart[i] = Date.parse(date_debut); //On stocke toutes les heures de départ
                allHourEnd[i] = Date.parse(date_fin); // On stocke toutes les heures de fin


                switch (id_outil) {
                    case "1":
                        bgColor = "rgb(255, 200, 69)";
                        txtColor = "rgb(255, 200, 69)";
                        // console.log("1");
                        break;

                    case "2":
                        bgColor = "#5C8AD8";
                        txtColor = "#5C8AD8";
                        // console.log("2");
                        break;
                
                    default:
                        bgColor = "rgb(255, 200, 69)";
                        txtColor = "rgb(255, 200, 69)";
                        // console.log("default");
                        break;
                }

                // console.log(bgColor);
                // console.log(txtColor);
                
                let temp = [
                    
                    {
                        "id": id_reser,
                        "title": title,
                        "start": date_debut, //Date de départ en ISO SQL
                        "end": date_fin,
                        "backgroundColor": bgColor, //Idée : Une couleur pour chaque type de réservation
                        // => Jaune Cesi pour l'impression 3D et Bleu Cesi pour découpeuse laser ou par section qui l'utilises
                        "borderColor": txtColor,
                        "textColor": txtColor,
                        "allDay": false,
                        "url": url
                    },
                
                ]      //Objets en JSON

                event = event.concat(temp);
            }

            let calendarElement = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarElement, {
                initialView: 'dayGridMonth',
                locale: 'fr',
                fixedWeekCount: false,
                showNonCurrentDates: false,
                weekends: false,
                slotMinTime: "08:00:00",
                slotMaxTime: "18:00:00",
                allDaySlot: false,
                headerToolbar: {
                    left: "addEventButton",
                    center: 'prev title next',
                    right: 'today dayGridMonth,timeGridWeek,list',
                },
                // selectable: true,
                // selectHelper: true,
                // eventLimit: true,

                customButtons: {
                    addEventButton: {
                        text: 'Ajouter une réservation',
                        click: function () {
                            let form = document.getElementsByClassName("add-event");
                            // console.log(form[0].childNodes[5].value);
                            var choice = parseInt(prompt('Imprimante 3d (1) ou Découpeuse Laser (2)'));
                            let title;
                            let outil;
                            // console.log();

                            if (choice == 1) {
                                title = form[0].childNodes[5].value;
                                title = title.concat(" Imprimante 3D");
                                // console.log(title);
                            }

                            else if (choice == 2) {
                                title = form[0].childNodes[5].value;
                                title = title.concat(" Découpeuse Laser");
                                // console.log(title);
                            }

                            else{
                                alert("Erreur, la valeur que vous cherchez à rentrer est incorrect");
                                return;
                            }
                    //         //Le Fablab est réservé peu importe ce qui est utilisé

                            var dateDayStr = prompt('Entrer la date de debut ( format : AAAA-MM-JJ )');
                            var dateStartStr = prompt('Entrer l\'heure de début ( format : HH )');
                            var dateEndStr = prompt('Entrer l\'heure de fin ( format : HH )');
                            // console.log(title);
                            // var dateDay = new Date(dateDayStr); // will be in local time
                            if (dateDayStr === "" || dateStartStr === "" || dateEndStr === ""){
                                alert('La date est invalide.');
                            }
                            else {
                                let dateStart = dateDayStr.concat(' ', dateStartStr, ':00');
                                let dateEnd = dateDayStr.concat(' ', dateEndStr, ':00');

                                let dateFinalStart = dateStart.concat(":00");
                                let dateFinalEnd = dateEnd.concat(":00");

                                console.log(dateFinalStart, dateFinalEnd);
                                

                                dateStart = new Date(dateStart); 
                                dateEnd = new Date(dateEnd); 

                                console.log(dateStart, dateEnd);


                                if (!isNaN(dateStart.valueOf()) && !isNaN(dateEnd.valueOf())) { // valid?
                                    let dateStartParse = Date.parse(dateStart); //On transforme la date en int 
                                    let dateEndParse = Date.parse(dateEnd); //On transforme la date en int 

                                    let stop = false;
                                    let now = Date.parse(new Date());
                                    

                                    for (let i = 0; i < allHourStart.length; i++) {

                                        // ON CHECK QUE LA RESERVATION SOIT PAS INFERIEUR A LA DATE DU JOUR 
                                        if (dateStartParse < now && stop == false) {
                                            alert("Le créneau que vous essayez de réserver est déjà passé.");
                                            stop = true;
                                        }

                                        //Check avant le créneau
                                        else if (((dateStartParse < allHourStart[i]) && (dateEndParse <= allHourStart[i])) && stop == false) { 
                                            
                                            // Si c'est bon avant on peut valider le créneau car les dates sont bonnes
                                            // start: dateStart,
                                            // end: dateEnd,
                                            //LES BONNES VARIABLES
                                            console.log(title);
                                            form[0].childNodes[5].value = title;
                                            form[0].childNodes[7].value = dateFinalStart;
                                            form[0].childNodes[9].value = dateFinalEnd;
                                            form[0].childNodes[11].value = choice;
                                            form[0].submit();

                                            stop = true;
                                            return;
                                            

                                            // let form = document.getElementsByClassName("add-event");
                                            // console.log(form[0].childNodes[5]);

                                            // let title = form[0].childNodes[5].value;

                                                // alert('Great. Now, update your database...');
                                                //#TODO   Envoyer ces données en POST pour une page '/addEvent' -> Le controller stack les données (Ajax)   
                                        }
                                        // Collision de créneau
                                        else{
                                            if (stop == false) {
                                                if ((dateStartParse >= allHourStart[i] && dateStartParse <= allHourEnd[i]) || (dateEndParse >= allHourStart[i] && dateEndParse <= allHourEnd[i])) {
                                                    alert("Ce créneau est déjà pris par quelqu'un d'autre");
                                                    stop = true;
                                                }
                                            }
                                        }
                                    }
                                    // ICi on a check tous les creneaux et a aucun moment nos dates se situent avant ou pendant un créneau
                                    // Le créneau de l'user est après le dernier créneau

                                    if (stop == false) {
                                        //#TODO   Envoyer ces données en POST pour une page '/addEvent' -> Le controller stack les données
                                        console.log(title);
                                        form[0].childNodes[5].value = title;
                                        form[0].childNodes[7].value = dateFinalStart;
                                        form[0].childNodes[9].value = dateFinalEnd;
                                        form[0].childNodes[11].value = choice;
                                        form[0].submit();
                                        return;
                                    }
                                }
                                else {
                                    alert('La date est invalide.');
                                }
                            }
                        }
                    }                          
                },
                buttonText: {
                    today: "Aujourd'hui",
                    month: "Mois",
                    week: "Semaine",
                    list: 'Liste'
                },
                eventOverlap: false,
                events: event,
                nowIndicator: true,
                editable: true, //Déplacer les events
                eventDrop: (infos) =>{
                    // alert("L'événement a été déplacé au " + infos.event.start);
                    if(!confirm("Etes-vous sur de vouloir déplacer l'événement au "+ infos.event.start)){
                        infos.revert(); //Si pas de confirmation --> Annulé
                    }
                    else{
                        //#TODO Actualiser la BDD
                    }
                },
                eventResize: (infos) => {   //Réajuster la durée
                    let id_resa = infos.events.id;
                    // let title = infos.event.title;
                    let date_debut = infos.event.start;
                    let date_fin = infos.event.end;
                    
                },
                dateClick: (infos) => {
                    // #TODO redirect with date -> ajouter un event
                    // window.open('/cible'); //Permet d'ouvrir une page exemple /addEvent comme TODO plus haut mais avec la date en plus 
                },
                eventClick: (infos) => {
                    if (info.event.url) {
                        window.open(info.event.url); //#TODO page récap d'un évent
                    }
                }
            });


            calendar.render();
        });
    </script>

@endsection