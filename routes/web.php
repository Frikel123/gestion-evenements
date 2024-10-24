<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\isOrganisateur;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\DashboardController;


// Route::get('/',[EventController::class,'index'])->name('evente.show')

Route::resource('events', EventController::class);

Route::get('/',TemplateController::class);





// Route for registration form and submission
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'sInscrire'])->name('user.inscrire');

// Route for login form and submission
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'seConnecter'])->name('user.seConnecter');

// Route to modify profile (protected route, only accessible to authenticated users)

Route::middleware('auth')->group(function(){
    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
Route::put('/profile', [UserController::class, 'modifierProfil'])->name('user.modifierProfil');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(isOrganisateur::class)->group(function(){
Route::resource('events', EventController::class);
   
})
?>