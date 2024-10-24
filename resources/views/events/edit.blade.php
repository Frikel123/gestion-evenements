@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Modifier l'événement</h2>

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Titre de l'événement</label>
            <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="5" required>{{ $event->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="date_start">Date de début</label>
            <input type="date" name="date_start" class="form-control" value="{{ $event->date_start }}" required>
        </div>

        <div class="form-group">
            <label for="date_end">Date de fin</label>
            <input type="date" name="date_end" class="form-control" value="{{ $event->date_end }}" required>
        </div>

        <div class="form-group">
            <label for="location">Lieu</label>
            <input type="text" name="location" class="form-control" value="{{ $event->location }}" required>
        </div>

        <div class="form-group">
            <label for="category_id">Catégorie</label>
            <select name="category_id" class="form-control" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $event->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour l'événement</button>
    </form>
</div>
@endsection
