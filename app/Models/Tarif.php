<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    protected $fillable = [
        'obligatoire',
        'nom',
        'description',
        'price',
    ];

    public function suscriptions()
    {
        return $this->belongsToMany(Suscription::class, 'suscriptions_tarifs');
    }
}
