<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



use App\User;
use App\Order;

class accountController extends Controller
{
    public function myaccount(){return view('myaccount');}

    public function infos(){return view('param/infos');}
    public function donnees(){return view('param/donnees');}

    public function cookies(){return view('param/cookies');}




    public function commandes(){
        $order = Order::join('users', 'orders.ID_user', '=', 'users.id')
                        ->join('products', 'orders.ID_product', '=', 'products.ID_product')
                        ->join('colors', 'orders.ID_color', '=', 'colors.ID_color')
                        ->orderBy('date_delivery', 'asc')
                        ->orderBy('ID_order', 'asc')
                        ->where("ID_user", auth()->user()->id) //Fonctionne pour un utilisateur qui veut voir ces commandes3
                        ->get();
        return view('param/commandes', array('data_order' => $order));
    }

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
        return redirect('/myaccount')->with('up', $message);
    }

    public function supprData()
    {
        $utilisateur = auth()->user();
        $utilisateur->delete();

        $message = 'done';
        return redirect('/')->with('suppr', $message);
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
        $file_path = strval(public_path().$file);
        $content = "Prenom;"."Nom;"."E-mail;"."date de creation;"."\n".$firstname.";".$lastname.";".$email.";".$date_creation.";";
        
        Storage::disk("public")->deleteDirectory('temp');
        Storage::makeDirectory('temp');
        Storage::disk("public")->put('temp/'.$file, $content);

        return Storage::disk("public")->download('temp/'.$file, $file);
    }
}
