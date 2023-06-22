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
    public $roles;
    public UserData $tuteur_data;
    public User $tuteur;

    protected function rules()
    {
        $rules = [
            'user.name' => 'required|string',
            'user.role' => 'required|integer',
            'user.email' => 'nullable|email|unique:users,email,',
            'user_data.nom' => 'required|string',
            'user_data.prenom' => 'required|string',
            'user_data.date_naissance' => 'required|date',
            'user_data.telephone' => 'required|string',
        ];
    
        if ($this->mineur) {
            $rules['tuteur_data.nom'] = 'required|string';
            $rules['tuteur_data.prenom'] = 'required|string';
            $rules['tuteur_data.email'] = 'required|email|unique:users,email';
            $rules['tuteur_data.telephone'] = 'required|string';
        }
    
        return $rules;
    }    

    public function updatedUserDataDateNaissance($value)
    {
        $birthDate = new \DateTime($value);
        $today = new \DateTime();
        $age = $birthDate->diff($today)->y;

        $this->mineur = $age < 18;
    }

    public function submit()
    {
        $this->validate();

        if ($this->mineur){
            $this->tuteur->name = $this->tuteur_data->nom.' '.$this->tuteur_data->prenom; 
            $this->tuteur->password = Str::random(40); 
            $this->tuteur->save();

            $this->tuteur_data->user_id = $this->tuteur->id;
            $this->tuteur_data->save();

            $this->user_data->tutor_id = $this->tuteur->id;
        }

        $this->user->email = $this->user->email ?? null; 
        $this->user->password = Str::random(40);
        $this->user->save();

        $this->user_data->user_id = $this->user->id;
        $this->user_data->save();
    }

    public function render()
    {
        return view('livewire.counter');
    }
    
    public function mount()
    {
        $this->user = new User();
        $this->user->role= User::ROLE_SPORTIF;
        $this->tuteur = new User();
        $this->tuteur->role= User::ROLE_TUTEUR;
        $this->user_data = new UserData();
        $this->tuteur_data = new UserData();
        $this->roles = User::getRoles();
    }
}
