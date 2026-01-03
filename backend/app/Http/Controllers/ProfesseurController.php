<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use Illuminate\Http\Request;

class ProfesseurController extends Controller
{
    public function index()
    {
        return Professeur::with('quizzes')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'Email' => 'required|email|unique:professeurs,Email',
            'MotDePasse' => 'required|string',
        ]);

        return Professeur::create($validated);
    }

    public function show(Professeur $professeur)
    {
        return $professeur->load('quizzes');
    }

    public function update(Request $request, Professeur $professeur)
    {
        $validated = $request->validate([
            'Nom' => 'sometimes|string|max:255',
            'Prenom' => 'sometimes|string|max:255',
            'Email' => 'sometimes|email|unique:professeurs,Email,' . $professeur->ID_Prof . ',ID_Prof',
            'MotDePasse' => 'sometimes|string',
        ]);

        $professeur->update($validated);
        return $professeur;
    }

    public function destroy(Professeur $professeur)
    {
        $professeur->delete();
        return response()->json(['message' => 'Professeur deleted']);
    }
}
