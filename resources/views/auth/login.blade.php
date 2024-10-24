<!-- resources/views/auth/login.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Connexion</h2>

    <form action="{{ route('user.seConnecter') }}" method="POST">
        @csrf

        <!-- Email -->
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email') <span>{{ $message }}</span> @enderror
        </div>

        <!-- Password -->
        <div>
            <label for="password">Mot de passe:</label>
            <input type="password" name="password" required>
            @error('password') <span>{{ $message }}</span> @enderror
        </div>

        <button type="submit">Se connecter</button>
    </form>
@endsection
