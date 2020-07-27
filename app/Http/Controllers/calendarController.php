<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use Validator;

use App\Mail\validOrderMail;

use App\Product;
use App\Color;
use App\Material;
use App\Order;
use App\User;
use App\Reservation;
use App\Outil;


class calendarController extends Controller
{
    public function calendrier_reservation()
    {
        $reservation = Reservation::join('outils', 'reservations.ID_outil', '=', 'outils.ID_outil')
        ->get();

        return view('calendar/calendrier-reservation', array('data_reservation' => $reservation));
    }

    public function add_event(Request $request)
    {
        $request->validate([
            'ID_user' => ['required'],
            'title' => ['required'],
            'date_debut' => ['required'],
            'date_fin' => ['required'],
            'ID_outil' => ['required'],
        ]);
        $reservation = new Reservation;
        $reservation->ID_user = intval(request('ID_user'));
        $reservation->title = request('title');
        $reservation->date_debut = date(request('date_debut'));
        $reservation->date_fin = date(request('date_fin'));
        $reservation->ID_outil = intval(request('ID_outil'));
        $reservation->save();

        return redirect("/calendrier-reservation");

    }

    public function up_event()
    {
        // $request->validate([
        //     'idResa' => ['required'],
        //     'dateDebut' => ['required'],
        //     'dateFin' => ['required'],
        // ]);
        $reservation = Reservation::find(request('idResa'));
        $reservation->date_debut = request('dateDebut');
        $reservation->date_fin = request('dateFin');

        return redirect('/calendrier-reservation');
    }

    public function del_event(Request $request){
        $reservation = Reservation::delete(request('ID_resa'));
        return redirect('/calendrier-reservation');
    }
}
