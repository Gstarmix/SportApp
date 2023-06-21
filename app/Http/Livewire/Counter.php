<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\UserData;
use Illuminate\Support\Str;

class Counter extends Component
{
    public User $user;
    public $mineur = false;

    public UserData $user_data;

    protected $rules = [
        'user.name' => 'required|string',
        'user.email' => 'required|email|unique:users,email,',
        'user.role' => 'required|integer',
        'user_data.nom' => 'required|string',
        'user_data.prenom' => 'required|string',
        'user_data.date_naissance' => 'required|date',
        'user_data.telephone' => 'required|string',
        'user_data.tuteur_nom' => 'required_if:mineur,true|string',
        'user_data.tuteur_prenom' => 'required_if:mineur,true|string',
        'user_data.tuteur_email' => 'required_if:mineur,true|email',
        'user_data.tuteur_telephone' => 'required_if:mineur,true|string',
    ];

    public function submit()
    {
        $this->validate();
    
        $birthDate = new \DateTime($this->user_data->date_naissance);
        $today = new \DateTime();
        $age = $birthDate->diff($today)->y;
    
        if ($age < 18){
            $this->mineur = true;
    
            $tuteur = new User();
            $tuteur->name = $this->user_data->tuteur_nom;
            $tuteur->email = $this->user_data->tuteur_email;
            $tuteur->role = User::ROLE_TUTEUR; // Assurez-vous d'avoir ce rôle défini dans votre modèle User
            $tuteur->password = Str::random(40);
            $tuteur->save();
            
            $this->user->role = User::ROLE_SPORTIF;
            $this->user->password = Str::random(40);
            $this->user->save();
            
            $this->user_data->user_id = $this->user->id;
            $this->user_data->save();
        } else {
            $this->user->password = Str::random(40);
            $this->user->save();
            $this->user_data->user_id = $this->user->id;
            $this->user_data->save();
        }
    }

    
    public function render()
    {
        return view('livewire.counter');
    }
    public function mount()
    {
        $this->user = new User();
        $this->user->role=0;
        $this->user_data = new UserData();
        $this->roles = User::getRoles();
    }
}
