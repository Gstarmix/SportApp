<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Tarif;
use App\Models\Course;
use Livewire\Component;
use App\Models\Category;
use App\Models\Suscription;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    use WithPagination;

    public User $user;
    public string $welcomeMessage;

    protected $paginationTheme = 'tailwind';

    public function mount($welcomeMessage)
    {
        $this->user = Auth::user();
        $this->welcomeMessage = $welcomeMessage;
    }

    public function render()
    {
        $users = DB::table("users")->leftJoin("user_data","users.id","=","user_data.user_id")->paginate(5);
        
        return view('livewire.dashboard', [
            'users' => $users,
            'tarifs' => Tarif::paginate(5),
            'suscriptions' => Suscription::with('tarifs')->paginate(5),
            'courses' => Course::paginate(5),
            'categories' => Category::paginate(5),
        ]);
    }
}
