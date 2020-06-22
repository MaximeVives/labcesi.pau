<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



use App\User;

class accountController extends Controller
{
    public function myaccount(){return view('myaccount');}

    public function infos(){return view('param/infos');}
    public function donnees(){return view('param/donnees');}
    public function commandes(){return view('param/commandes');}
    public function cookies(){return view('param/cookies');}

    public function Upinfos()
    {
        request()->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required'],
        ]);

        $utilisateur = auth()->user();
        $utilisateur->email = request('email');
        $utilisateur->password = bcrypt(request('password'));
        $utilisateur->save();

        $message = 'done';
        return redirect('/myaccount')->with('jsAlert', $message);
    }

    public function supprData()
    {
        $utilisateur = auth()->user();
        $utilisateur->delete();

        $message = 'done';
        return redirect('/')->with('jsAlert', $message);
    }

    public function exportData()
    {
        $utilisateur = auth()->user();
        $firstname = $utilisateur->firstname;
        $lastname = $utilisateur->lastname;
        $email = $utilisateur->email;
        $date_creation = $utilisateur->created_at;
        $date_now = date('d-m-y_h_i_s');

        $file = strval("personalData".$date_now.".csv");
        $file_path = strval(public_path()."".$file);

        Storage::put($file, $file_path);

        // dd(storage_path()."/app/public/".$file);
        return Storage::download(strval(storage_path()."/app/".$file), $file);
    }
}
