<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\FabricationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/stock/matiere1ere', [StockController::class, 'matieres'])->name('matieres');
Route::get('/stock', [StockController::class, 'courses'])->name('courses');

Route::get('/stock/produits', [StockController::class, 'produits'])->name('produits');

Route::get('/achat/form', [AchatController::class, 'achat'])->name('achat.liste');
Route::get('/achat/submit', [AchatController::class, 'valider'])->name('achat.valider');

Route::get('/fabrication/form', [FabricationController::class, 'form'])->name('fabrication');
Route::get('/fabrication/submit', [FabricationController::class, 'valider'])->name('fabrication.valider');
