<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class CategorieTable extends Component
{

    use WithPagination;
    public function render()
    {
        $categories = DB::table("categories")->paginate(5);
        return view('livewire.categorie-table', [
            "categories" => $categories
        ]);
    }
}
