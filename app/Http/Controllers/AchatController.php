<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AchatController extends Controller
{
    //
    public function index(){
        return view('achat');
    }

    public function achat(){
        $liste = DB::table('matierepremiere')->get();
        return view('achat',['liste'=>$liste]);
    }

    public function valider(Request $request){
        $id = $request->input('id');
        $quantite = $request->input('quantite');
        DB::table('stock')->insert([
            'idMatiere' => $id,
            'entree' => $quantite
        ]);
        return $this->achat();
    }
}
