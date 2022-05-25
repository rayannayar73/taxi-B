<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AchatController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TrajetController;
use App\Http\Controllers\EcheanceController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\FabricationController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\TypeEcheanceController;
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

Route::get('/', [UtilisateurController::class, 'index'])->name('login');
Route::get('/login/valider', [UtilisateurController::class, 'valider'])->name('login.valider');
Route::get('/logout', [UtilisateurController::class, 'deconnexion'])->name('logout');

Route::get('/vehicules', [VehiculeController::class, 'index'])->name('vehicules');
Route::get('/vehicule/fiche/{id}', [VehiculeController::class, 'fiche']);
Route::get('/vehicule/disponibles', [VehiculeController::class, 'disponibles'])->name('vehicule.disponibles');
Route::get('/vehicule/form', [VehiculeController::class, 'form'])->name('vehicule.form');
Route::get('/vehicule/valider', [VehiculeController::class, 'valider'])->name('vehicule.valider');
Route::get('/vehicule/export/{id}', [VehiculeController::class, 'export']);

Route::get('/trajet/form', [TrajetController::class, 'form'])->name('trajet.form');
Route::get('/trajet/arriver', [TrajetController::class, 'validerArriver'])->name('trajet.arriver');
Route::get('/trajet/depart', [TrajetController::class, 'validerDepart'])->name('trajet.depart');
Route::get('/trajet/carburant', [TrajetController::class, 'validerCarburant'])->name('trajet.carburant');

Route::get('/echeance/form', [EcheanceController::class, 'form'])->name('echeance.form');
Route::get('/echeance/valider', [EcheanceController::class, 'valider'])->name('echeance.valider');

Route::get('/maintenance/form', [MaintenanceController::class, 'form'])->name('maintenance.form');
Route::get('/maintenance/valider', [MaintenanceController::class, 'valider'])->name('maintenance.valider');
