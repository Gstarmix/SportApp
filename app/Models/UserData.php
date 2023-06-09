<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $table = 'user_data';

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'telephone',
        'user_id',
        'email',
    ];

    protected $dates = [
        'date_naissance',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tuteur()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }
}