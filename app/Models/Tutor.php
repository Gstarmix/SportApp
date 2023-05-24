<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'telephone',
        'userData_id',
    ];

    public function userData()
    {
        return $this->belongsTo(UserData::class, 'userData_id');
    }
}