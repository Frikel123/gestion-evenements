<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    public function créerÉvénement(Request $request)
    {
        // Validation des données d'entrée
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'location' => 'required|string|max:255',
            'category_id' => 'required|exists:event_categories,id',
        ]);

        // Création de l'événement
        $event = new Event();
        $event->title = $validatedData['title'];
        $event->description = $validatedData['description'];
        $event->date_start = $validatedData['date_start'];
        $event->date_end = $validatedData['date_end'];
        $event->location = $validatedData['location'];
        $event->organisateur_id = auth()->id(); // Organisateur est l'utilisateur connecté
        $event->category_id = $validatedData['category_id'];
        $event->save();

        return response()->json(['message' => 'Événement créé avec succès!', 'event' => $event], 201);
    }
}