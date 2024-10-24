@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Créer un nouvel événement</h2>

    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="title">Titre de l'événement</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="5" required></textarea>
        </div>

        <div class="form-group">
            <label for="date_start">Date de début</label>
            <input type="date" name="date_start" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="date_end">Date de fin</label>
            <input type="date" name="date_end" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="location">Lieu</label>
            <input type="text" name="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="category_id">Catégorie</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer l'événement</button>
    </form>
</div>
@endsection
