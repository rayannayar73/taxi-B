<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    //
    public function matieres(){
        $liste = DB::table('listestock')->get();
        return view('stock',['liste'=>$liste]);
    }
    
    public function produits(){
        $liste = DB::table('listestockproduitfini')->get();
        return view('stockProduit',['liste'=>$liste]);
    }

    public function courses(){
        $liste = DB::table('courses')->get();
        return view('courses',['liste'=>$liste]);
    }
}
