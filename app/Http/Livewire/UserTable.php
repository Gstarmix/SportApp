<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View; // Ajout de l'import pour la classe View


class UserTable extends Component
{
    use WithPagination;

    public function render()
    {
        $users = DB::table("users")->leftJoin("user_data","users.id","=","user_data.user_id")->paginate(5);
        return view('livewire.user-table', [
            "users" => $users
        ]);
    }
}
