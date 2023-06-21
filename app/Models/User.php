<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const ROLE_ADMIN = 0;
    const ROLE_MEMBRE_ASSO = 1;
    const ROLE_SPORTIF = 2;
    const ROLE_TUTEUR = 3;
    const ROLE_MONITEUR = 4;

    public $roles = [
        self::ROLE_ADMIN => 'admin',
        self::ROLE_MEMBRE_ASSO => 'membre asso',
        self::ROLE_SPORTIF => 'sportif',
        self::ROLE_TUTEUR => 'tuteur',
        self::ROLE_MONITEUR => 'moniteur'
    ];

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'tutor_id',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function getRole () {
        return $this->roles[$this->role];
    }

    public function userData()
    {
        return $this->hasOne(UserData::class);
    }
    
    public function suscriptions()
    {
        return $this->hasMany(Suscription::class);
    }
    
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_participants');
    }
    
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    
    public function tutor()
    {
        return $this->belongsTo(User::class, 'tutor_id');
    }
    
    public static function getRoles() {
        return (new static)->roles;
    }
}
