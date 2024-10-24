@extends('layouts.app')

@section('content')
<div class="container">
    <h2>List </h2>
    <h3><a href="{{route('events.create')}}">Ajoute</a></h3>

@if (session('message'))
<div>
  {{session('message')}}
</div>
@endif
@foreach ($events as $e)
<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $e->title }}</h5>
        <p class="card-text">{{ $e->description }}</p>
        <p><strong>Date de début:</strong> {{ $e->date_start }}</p>
        <p><strong>Date de fin:</strong> {{ $e->date_end }}</p>
        <p><strong>Lieu:</strong> {{ $e->location }}</p>
        <p><strong>Catégorie:</strong> {{ $e->category->name }}</p>

        <!-- Bouton de mise à jour -->
        <a href="{{ route('events.edit', $e->id) }}" class="btn btn-warning">Mettre à jour</a>
        
        <!-- Formulaire pour supprimer l'événement -->
        <form action="{{ route('events.destroy', $e->id) }}" method="POST" class="mt-3 d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Annuler l'événement</button>
        </form>
    </div>
</div>
@endforeach
</div>
@endsection
