<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\SuscriptionController;
use App\Http\Controllers\TarifsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\CategoriesController;
use App\Models\Suscription;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $user = Auth::user();

    if (!$user) {
        // Si l'utilisateur n'est pas connecté, redirection vers la page de connexion
        return redirect('/login');
    }

    // Obtenir les abonnements de l'utilisateur et les tarifs qui leur sont associés
    $suscriptions = $user->suscriptions;
    
    foreach ($suscriptions as $suscription) {
        dd($suscription->tarifs);
    }
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Pour UserController
    Route::resource('users', UserController::class);

    // Pour UserDataController
    Route::resource('users.user_data', UserDataController::class);

    // Pour SuscriptionController
    Route::resource('suscriptions', SuscriptionController::class);

    // Pour TarifsController
    Route::resource('tarifs', TarifsController::class);

    // Pour CoursesController
    Route::resource('courses', CoursesController::class);

    // Pour CategoriesController
    Route::resource('categories', CategoriesController::class);
});

require __DIR__.'/auth.php';
