<?php

namespace App\Http\Controllers;

use App\Models\Tutor;
use Illuminate\Http\Request;

class TutorController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'telephone' => 'required|string',
            'user_data_id' => 'required|exists:users_datas,id',
        ]);

        Tutor::create($request->all());

        return back()->with('success', 'Les informations du tuteur ont été enregistrées avec succès.');
    }

    public function update(Request $request, Tutor $tutor)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'telephone' => 'required|string',
            'user_data_id' => 'required|exists:users_datas,id',
        ]);

        $tutor->update($request->all());

        return back()->with('success', 'Les informations du tuteur ont été mises à jour avec succès.');
    }
}
