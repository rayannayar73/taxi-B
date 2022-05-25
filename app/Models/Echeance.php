<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Echeance extends Model
{
    use HasFactory;

    protected $fillable = ['idType', 'idVehicule','payement', 'montant','expiration'];
    public $timestamps  = false;
}
