<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Tarif;
use App\Models\Suscription;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

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
        return view('livewire.dashboard', [
            'users' => User::paginate(5),
            'tarifs' => Tarif::paginate(5),
            'suscriptions' => Suscription::with('tarifs')->paginate(5),
            'courses' => Course::paginate(5),
            'categories' => Category::paginate(5),
        ]);
    }
}
