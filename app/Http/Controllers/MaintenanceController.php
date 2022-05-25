<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Models\TypeMaintenance;
use Illuminate\Support\Facades\DB;

class MaintenanceController extends Controller
{
    
    public function index(){
        return view('vehicule');
    }
    
    public function form(){
        $liste = TypeMaintenance::all();
        $vehicule = DB::table('vehicule')->get();
        return view('maintenance',['liste'=>$liste,'vehicule'=>$vehicule]);
    }

    public function valider(Request $request){
        $vehicule = $request->input('vehicule');
        $type = $request->input('type');
        $expiration = $request->input('expiration');
        Maintenance::create([
            'idType' => $type,
            'idVehicule' => $vehicule,
            'expiration' => $expiration
        ]);
        return $this->form();
    }
}
