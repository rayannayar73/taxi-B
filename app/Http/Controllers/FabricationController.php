<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FabricationController extends Controller
{
    public function form(){
        $liste = DB::table('produitFini')->get();
        return view('fabrication',['liste'=>$liste]);
    }

    public function valider(Request $request){
        $id = $request->input('id');
        $quantite = $request->input('quantite');

        DB::table('fabrication')->insert([
            'idProduit' => $id,
            'quantite' => $quantite
        ]);

        $formule = DB::table('formule')
        ->where('idProduit','=',$id)
        ->get();

        foreach($formule as $insertion){
            DB::table('stock')->insert([
                'idMatiere' => $insertion->idMatiere,
                'sortie' => $this->regleDeTrois($quantite,$insertion->pourcentage)
            ]);
        }
        return $this->form();
    }

    function regleDeTrois($total,$pourcentage){
        return $total*$pourcentage/100;
    }
}
