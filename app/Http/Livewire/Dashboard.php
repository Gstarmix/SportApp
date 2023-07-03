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
    public array $tarifs = [];
    public array $suscriptions = [];
    public array $courses = [];
    public array $categories = [];
    public string $welcomeMessage;

    protected $paginationTheme = 'tailwind';

    public function mount($welcomeMessage)
    {
        $this->user = Auth::user();
        $this->tarifs = Tarif::paginate(10)->toArray();
        $this->suscriptions = Suscription::with('tarifs')->get()->toArray();
        $this->courses = Course::all()->toArray();
        $this->categories = Category::all()->toArray();
        $this->welcomeMessage = $welcomeMessage;
    }

    public function render()
    {
        return view('livewire.dashboard', [
            'users' => User::paginate(10),
            'tarifs' => Tarif::paginate(10),
            'suscriptions' => Suscription::with('tarifs')->paginate(10),
            'courses' => Course::paginate(10),
            'categories' => Category::paginate(10),
        ]);
    }
}
