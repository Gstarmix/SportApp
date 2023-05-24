<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'license',
        'accepted',
        'member',
        'total_price',
        'payed',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tarifs()
    {
        return $this->belongsToMany(Tarif::class, 'suscription_tarif');
    }
}
