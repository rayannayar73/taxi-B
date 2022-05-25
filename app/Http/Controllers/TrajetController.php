<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class TrajetController extends Controller
{
    //
    
    public function index(){
        return view('trajet');
    }

    public function form(){
        $vehicule = DB::table('vehicule')->get();
        return view('trajet',['vehicule'=>$vehicule]);
    }

    public function errorForm($msg){
        $vehicule = DB::table('vehicule')->get();
        return view('trajet',['vehicule'=>$vehicule,'error'=>$msg]);
    }

    public function verifierKilometrage($idVehicule,$kilometrage){
        $kilometragePrecedent = DB::table('vehicule')
            ->where('id','=',$idVehicule)
            ->get("kilometrage");

        if($kilometrage<0){
            return $this->errorForm("le kilometrage doit etre positif");
        }
        else if($kilometrage <= $kilometragePrecedent[0]->kilometrage){
            return $this->errorForm("le kilometrage doit etre superireur au precedent : ".$kilometragePrecedent[0]->kilometrage." km");
        }
    }

    public function validerDepart(Request $request){
        $idVehicule = $request->input('idVehicule');
        $motif = $request->input('motif');
        $date = $request->input('date');
        $lieu = $request->input('lieu');
        $dateFormat = substr($date,0,10)." ".substr($date,11,18).':00';
        $idUtilisateur = 1;
        $kilometrage = $request->input('kilometrage');

        $numerovoiture = DB::table('vehicule')
        ->where('id','=',$idVehicule)
        ->get('numero');

        session(['idVehicule' => $idVehicule]);
        session(['numero' => $numerovoiture[0]->numero]);
        session(['motif' => $motif]);
        session(['date' => $date]);
        session(['lieu' => $lieu]);
        session(['kilometrage' => $kilometrage]);
        
        $listeDispo = DB::table('vehiculeDisponibles')
            ->where('id','=',$idVehicule)
            ->get();
        // if($listeDispo->isEmpty())return $this->errorForm("cette voiture n'est pas disponible");

        $kilometragePrecedent = DB::table('vehicule')
            ->where('id','=',$idVehicule)
            ->get("kilometrage");

        if($kilometrage<0){
            return $this->errorForm("le kilometrage doit etre positif");
        }
        else if($kilometrage < $kilometragePrecedent[0]->kilometrage){
            return $this->errorForm("le kilometrage doit etre superireur au precedent : ".$kilometragePrecedent[0]->kilometrage." km");
        }
        else if($kilometrage > $kilometragePrecedent[0]->kilometrage){
            return $this->errorForm("le kilometrage doit etre egale precedent : ".$kilometragePrecedent[0]->kilometrage." km");
        }
        
        $arrivePrecedent =  DB::table('trajet as t')
            ->join('arrive as d', 'd.idTrajet', '=', 't.id')
            ->where('idVehicule','=',$idVehicule)
            ->where('idUtilisateur','=',$idUtilisateur)
            ->orderBy('d.daty', 'desc')
            ->get();
        $depart= new DateTime($dateFormat);
        $arrive= new DateTime($arrivePrecedent[0]->daty);
        if($arrive>$depart){
            return $this->errorForm("la date doit etre apres la date de dernier trajet");
        }

        $idTrajet = DB::table('trajet')->insertGetId([
            'idUtilisateur' => $idUtilisateur,
            'idVehicule' => $idVehicule,
            'motif' => $motif
        ]);

        DB::table('depart')->insert([
            'daty' => $date,
            'kilometrage' => $kilometrage,
            'lieu' => $lieu,
            'idTrajet' => $idTrajet,
        ]);

        DB::table('vehicule')
        ->where('id','=',$idVehicule)
        ->update([
            'kilometrage' => $kilometrage,
        ]);
        session()->forget('idVehicule');
        session()->forget('numero');
        session()->forget('motif');
        session()->forget('date');
        session()->forget('lieu');
        session()->forget('kilometrage');
        return $this->form();
    }

    public function validerArriver(Request $request){
        $idVehicule = $request->input('idVehicule');
        $idUtilisateur = 1;
        $date = $request->input('date');
        $dateFormat = substr($date,0,10)." ".substr($date,11,18).':00';
        $lieu = $request->input('lieu');
        $kilometrage = $request->input('kilometrage');

        $listeDispo = DB::table('vehiculeDisponibles')
            ->where('id','=',$idVehicule)
            ->get();
        // if($listeDispo->isEmpty())return $this->errorForm("cette voiture n'est pas disponible");
        
        $kilometragePrecedent = DB::table('vehicule')
            ->where('id','=',$idVehicule)
            ->get();
        if($kilometrage<0){
            return $this->errorForm("le kilometrage doit etre positif");
        }
        else if($kilometrage <= $kilometragePrecedent[0]->kilometrage){
            return $this->errorForm("le kilometrage doit etre superireur au precedent : ".$kilometragePrecedent[0]->kilometrage." km");
        }
        $departPrecedent =  DB::table('trajet as t')
            ->join('depart as d', 'd.idTrajet', '=', 't.id')
            ->where('idVehicule','=',$idVehicule)
            ->where('idUtilisateur','=',$idUtilisateur)
            ->orderBy('d.daty', 'desc')
            ->get();
        $arrive= new DateTime($dateFormat);
        $depart= new DateTime($departPrecedent[0]->daty);
        if($arrive<$depart){
            return $this->errorForm("la date doit etre apres la date de depart");
        }
        $idTrajet = DB::table('trajet as t')
            ->join('depart as d', 'd.idTrajet', '=', 't.id')
            ->where('idVehicule','=',$idVehicule)
            ->where('idUtilisateur','=',$idUtilisateur)
            ->orderBy('d.daty', 'desc')
            ->get("t.id");
        $requete="select (((".$kilometrage."-d.kilometrage)*1000)/timestampdiff(second,d.daty,'".substr($date,0,10)." ".substr($date,11,18).":00'))*3.6 as KmH from trajet t join depart d on t.id=d.idTrajet where t.id=".$idTrajet[0]->id;
        $vitesse = DB::select($requete);
        if($vitesse[0]->KmH>72) return $this->errorForm("Vous etes arrivé trop tot");

        DB::table('arrive')->insertGetId([
            'daty' => $date,
            'kilometrage' => $kilometrage,
            'lieu' => $lieu,
            'idTrajet' => $idTrajet[0]->id,
        ]);
        DB::table('vehicule')
        ->where('id','=',$idVehicule)
        ->update([
            'kilometrage' => $kilometrage,
        ]);
        return $this->form();
    }

    public function validerCarburant(Request $request){
        $idUtilisateur = 1;
        $idVehicule = $request->input('idVehicule');
        $quantite = $request->input('quantite');
        $montant = $request->input('montant');
        $kilometrage = $request->input('kilometrage');

        $idTrajet = DB::table('trajet as t')
            ->join('depart as d', 'd.idTrajet', '=', 't.id')
            ->where('idVehicule','=',$idVehicule)
            ->where('idUtilisateur','=',$idUtilisateur)
            ->orderBy('d.daty', 'desc')
            ->get();
            
        DB::table('carburant')->insertGetId([
            'quantite' => $quantite,
            'montant' => $montant,
            'idVehicule' => $idTrajet[0]->idVehicule,
            'idTrajet' => $idTrajet[0]->id,
        ]);
        return $this->form();
    }
}