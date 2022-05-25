<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class VehiculeController extends Controller
{
    //
    
// select t.nom as type, m.nom as marque, v.numero, v.modele
// from vehicule as v
// join type as t on v.idType=t.id
// join marque as m on v.idType=m.id

    public static function index(){
        $vehicule = DB::table('listevoiture')->get();
        return view('vehicules', ['vehicule'=>$vehicule]);
    }

    public function fiche($numero){
        $vehicule = DB::table('listeVoiture')
            ->where('numero','=',$numero)
            ->get();

        $disponibilite = true;
        $listeDispo = DB::table('vehiculeDisponibles')
            ->where('numero','=',$numero)
            ->get();
        if($listeDispo->isEmpty())$disponibilite=false;

        $echeances = DB::table('listeEcheance')
            ->where('numero','=',$numero)
            ->get();

        $maintenances = DB::table('listeMaintenance')
            ->where('numero','=',$numero)
            ->get();

        $distance = DB::table('dashboard')
            ->where('numero','=',$numero)
            ->get();
        // dd($distance);
        return view('fiche',['vehicule'=>$vehicule,'disponibilite'=>$disponibilite,'echeances'=>$echeances,'maintenances'=>$maintenances,'distance'=>$distance]);
    }

    public static function disponibles(){
        $vehicule = DB::table('vehiculedisponibles')->get();
        return view('vehiculeDisponible', ['vehicule'=>$vehicule]);
    }

    public function form(){
        $type = DB::table('type')->get();
        $marque = DB::table('marque')->get();
        return view('vehicule',['type'=>$type,'marque'=>$marque]);
    }

    public function export($id){
        $vehicule = DB::table('listetrajet')
            ->where('numero','=',$id)
            ->get();
        $pdf = PDF::loadView('trajetVehicule', ['vehicule'=>$vehicule]);
        return view('trajetVehicule', ['vehicule'=>$vehicule]);
        // return $pdf->stream();
        // return $pdf->download(\Str::slug($vehicule[0]->numero).".pdf");
    }

    public function valider(Request $request){
        $type = $request->input('type');
        $marque = $request->input('marque');
        $numero = $request->input('numero');
        $modele = $request->input('modele');
        DB::table('vehicule')->insert([
            'numero' => $numero,
            'modele' => $modele,
            'idType' => $type,
            'idMarque' => $marque
        ]);
        return $this->form();
    }
}
