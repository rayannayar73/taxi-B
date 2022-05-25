<?php

namespace App\Http\Controllers;

use App\Models\Echeance;
use App\Models\TypeEcheance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EcheanceController extends Controller
{
    //
    
    public function index(){
        return view('vehicule');
    }
    
    public function form(){
        $liste = TypeEcheance::all();
        $vehicule = DB::table('vehicule')->get();
        return view('echeance',['liste'=>$liste,'vehicule'=>$vehicule]);
    }
    
    public function errorForm($msg){
        $liste = TypeEcheance::all();
        $vehicule = DB::table('vehicule')->get();
        return view('echeance',['liste'=>$liste,'vehicule'=>$vehicule,'error'=>$msg]);
    }

    public function valider(Request $request){
        $vehicule = $request->input('vehicule');
        $type = $request->input('type');
        $montant = $request->input('montant');
        $payement = $request->input('payement');
        $expiration = $request->input('expiration');
        
        
        if($montant<0){
            return $this->errorForm("le montant doit etre positif");
        }

        Echeance::create([
            'idType' => $type,
            'idVehicule' => $vehicule,
            'payement' => $payement,
            'montant' => $montant,
            'expiration' => $expiration
        ]);
        return $this->form();
    }
}
