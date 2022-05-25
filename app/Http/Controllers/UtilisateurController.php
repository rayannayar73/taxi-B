<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function valider(Request $request){
        $login = $request->input('login');
        $mdp = $request->input('mdp');
        $utilisateur = Utilisateur::where('login','=',$login)
            ->where('mdp','=',sha1($mdp))
            ->first();
        if($utilisateur == null)return view('login',['error'=>"erreur"]);
        session(['admin' => $utilisateur]);
        return Vehiculecontroller::index();
    }

    public function deconnexion(Request $request){
        session()->forget('admin');
        return $this->index();
    }
}