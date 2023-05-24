<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarifsController extends Controller
{
    public function index()
    {
        $tarifs = Tarif::all();
    
        if ($tarifs->isEmpty()) {
            return view('tarifs.create');
        } else {
            return view('tarifs.index', compact('tarifs'));
        }
    }

    public function create()
    {
        $tarifs = Tarif::all();
        $users = User::all();
        return view('tarifs.create', compact('tarifs', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'obligatoire' => 'required|boolean',
            'nom' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Tarif::create($request->all());

        return redirect()->route('tarifs.index')->with('success', 'Tarif créé avec succès.');
    }

    public function show(Tarif $tarif)
    {
        return view('tarifs.show', compact('tarif'));
    }

    public function edit(Tarif $tarif)
    {
        return view('tarifs.edit', compact('tarif'));
    }

    public function update(Request $request, Tarif $tarif)
    {
        $request->validate([
            'obligatoire' => 'required|boolean',
            'nom' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $tarif->update($request->all());

        return redirect()->route('tarifs.index')->with('success', 'Tarif mis à jour avec succès.');
    }

    public function destroy(Tarif $tarif)
    {
        $tarif->delete();
        return redirect()->route('tarifs.index')->with('success', 'Tarif supprimé avec succès.');
    }
}