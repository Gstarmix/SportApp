<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserData;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);
        $user->save();

        $userData = new UserData([
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'date_naissance' => $request->input('date_naissance'),
            'telephone' => $request->input('telephone'),
            'user_id' => $user->id,
        ]);
        $userData->save();

        $suscription = new Suscription([
            'license' => $request->input('license'),
            'member' => $request->input('member'),
            'total_price' => $request->input('total_price'),
            'payed' => $request->input('payed'),
            'user_id' => $user->id,
        ]);
        $suscription->save();

        return redirect()->route('users.index');
    }


    public function show(User $user)
    {
        $user->load('userData');
        return view('users.show', ['user' => $user]);
    }

    public function edit(User $user)
    {
        $user->load('userData');
        return view('users.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|integer',
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }
}
