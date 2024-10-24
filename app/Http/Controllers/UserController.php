<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
     // Show registration form
     public function showRegistrationForm()
     {
         return view('auth.register');
     }
 
     // Handle user registration
     public function sInscrire(Request $request)
     {
         // Validate the form input
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users',
             'password' => 'required|string|min:8|confirmed',
             'role' => 'required|in:organisateur,participant',
         ]);
 
         // Create a new user in the database
         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password),  // Hash the password
             'role' => $request->role,
         ]);
 
         // Log the user in after registration
         Auth::login($user);
 
         // Redirect to a specific page with a success message
         return redirect('/dashboard')->with('success', 'Inscription réussie.');
     }
 
     // Show login form
     public function showLoginForm()
     {
         return view('auth.login');
     }
 
     // Handle user login
     public function seConnecter(Request $request)
     {
         // Validate login form input
         $credentials = $request->validate([
             'email' => 'required|email',
             'password' => 'required|string',
         ]);
 
         // Attempt to log in the user
         if (Auth::attempt($credentials)) {
             // Login successful, redirect to the dashboard
             return redirect()->intended('/dashboard')->with('success', 'Connexion réussie.');
         }
 
         // If login fails, redirect back with an error message
         return back()->withErrors([
             'email' => 'Les identifiants sont incorrects.',
         ]);
     }
 
     // Show profile edit form
     public function editProfile()
     {
         return view('profile.edit');
     }
 
     // Handle profile update
     public function modifierProfil(Request $request)
     {
         // Get the authenticated user
         $user = Auth::user();
 
         // Validate form input
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users,email,' . $user->id,
             'password' => 'nullable|string|min:8|confirmed',
         ]);
 
         // Update the user's details
         $user->name = $request->name;
         $user->email = $request->email;
 
         // If a new password is provided, hash and update it
         if ($request->password) {
             $user->password = Hash::make($request->password);
         }
 
         // Save the changes to the database
         $user->save();
 
         // Redirect back with a success message
         return redirect()->route('profile.edit')->with('success', 'Profil modifié avec succès.');
     }
}
