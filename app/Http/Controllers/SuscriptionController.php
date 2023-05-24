<?php

namespace App\Http\Controllers;

use App\Models\Suscription;
use App\Models\User;
use App\Models\Tarif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuscriptionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $suscriptions = $user->suscriptions;
        $users = User::all();
        $tarifs = Tarif::all(); 
    
        if ($suscriptions == null || $suscriptions->isEmpty()) {
            return view('suscriptions.create', compact('users', 'tarifs'));
        } else {
            return view('suscriptions.index', compact('suscriptions'));
        }
    }

    // public function index()
    // {
    //     $user = Auth::user();
    //     $suscriptions = $user->suscriptions;
    //     dd($suscriptions);
    //     $tarifs = Tarif::all();
    
    //     return view('suscriptions.index', compact('suscriptions', 'tarifs'));
    // }

    public function create()
    {
        $tarifs = Tarif::all();
        return view('suscriptions.create', compact('tarifs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'license' => 'nullable|string',
            'accepted' => 'required|boolean',
            'member' => 'required|int',
            'total_price' => 'required|numeric',
            'payed' => 'required|numeric',
            'tarifs' => 'required|array',
            'tarifs.*' => 'exists:tarifs,id',
        ]);

        $suscription = Suscription::create($request->all());
        $suscription->tarifs()->attach($request->tarifs);

        return redirect()->route('suscriptions.index')->with('success', 'Suscription créée avec succès.');
    }

    public function show(Suscription $suscription)
    {
        $suscription->load('tarifs');
        return view('suscriptions.show', compact('suscription'));
    }

    public function edit(Suscription $suscription)
    {
        $users = User::all();
        $tarifs = Tarif::all();
        return view('suscriptions.edit', compact('suscription', 'users', 'tarifs'));
    }

    public function update(Request $request, Suscription $suscription)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'license' => 'nullable|string',
            'accepted' => 'required|boolean',
            'member' => 'required|int',
            'total_price' => 'required|numeric',
            'payed' => 'required|numeric',
            'tarifs' => 'required|array',
            'tarifs.*' => 'exists:tarifs,id',
        ]);

        $suscription->update($request->all());
        $suscription->tarifs()->sync($request->tarifs);

        return redirect()->route('suscriptions.index')->with('success', 'Suscription mise à jour avec succès.');
    }

    public function destroy(Suscription $suscription)
    {
        $suscription->tarifs()->detach();
        $suscription->delete();
        return redirect()->route('suscriptions.index')->with('success', 'Suscription supprimée avec succès.');
    }
}
