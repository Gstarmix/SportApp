<?php

namespace App\Http\Livewire;

use App\Models\Tarif;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class TarifTable extends Component
{  
    use WithPagination;

    public function render()
    {
        $tarifs = DB::table("tarifs")->paginate(5);

        return view('livewire.tarif-table', [
            'tarifs' => $tarifs,
        ]);
    }
}
