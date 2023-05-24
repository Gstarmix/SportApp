<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'date_naissance' => 'required|date',
            'telephone' => 'required|string',
        ]);

        $user->userData->update($request->all());

        return redirect()->route('users.show', $user)->with('success', 'Informations de l\'utilisateur mises à jour avec succès.');
    }
}
