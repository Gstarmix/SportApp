<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserData;
use App\Models\Tutor;
use App\Models\Tarif;
use App\Models\Suscription;
use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $tarifs = Tarif::all();
        $suscriptions = Suscription::all();
        $courses = Course::all();
        $categories = Category::all();
    
        $user = Auth::user();
        if (!$user) {
            dd('Utilisateur non authentifié');
        }
        // dd($user->user_data);
        $welcomeMessage = "Bonjour, visiteur";
    
        if ($user && $user->user_data) {
            $user_data = $user->user_data;
            $welcomeMessage = "Bonjour, " . $user_data->prenom . " " . $user_data->nom;
    
            if ($user_data->tutor_id) {
                $tutor = Tutor::find($user_data->tutor_id);
                $welcomeMessage .= ". Votre tuteur est " . $tutor->prenom . " " . $tutor->nom;
            }
        }
    
        return view('dashboard', compact('users', 'tarifs', 'suscriptions', 'courses', 'categories'))
            ->with('welcomeMessage', $welcomeMessage);
    }
}
