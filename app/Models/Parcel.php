<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    // Définir l'accessibilité de nos propriétés
    protected $fillable = [
        'address_dep',
        'address_arr',
        'weight',
        'tracking_number',
        'tracking_status',
    ];
}
