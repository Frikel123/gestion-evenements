<!-- resources/views/profile/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <h2>Modifier le profil</h2>

    <form action="{{ route('user.modifierProfil') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <label for="name">Nom:</label>
            <input type="text" name="name" value="{{ auth()->user()->name }}" required>
            @error('name') <span>{{ $message }}</span> @enderror
        </div>

        <!-- Email -->
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ auth()->user()->email }}" required>
            @error('email') <span>{{ $message }}</span> @enderror
        </div>

        <!-- Password (Optional) -->
        <div>
            <label for="password">Nouveau mot de passe (facultatif):</label>
            <input type="password" name="password">
            @error('password') <span>{{ $message }}</span> @enderror
        </div>

        <button type="submit">Modifier le profil</button>
    </form>
@endsection
