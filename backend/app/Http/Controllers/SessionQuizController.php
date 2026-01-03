<?php

namespace App\Http\Controllers;

use App\Models\Session_Quiz;
use Illuminate\Http\Request;

class SessionQuizController extends Controller
{
    public function index() { return Session_Quiz::with(['etudiant','quiz','resultats'])->get(); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Date_Passage' => 'required|date',
            'Score_Obtenu' => 'required|numeric',
            'Duree_Effective' => 'required|integer',
            'ID_Etu' => 'required|exists:etudiants,ID_Etudiant',
            'ID_Quiz' => 'required|exists:quizzes,ID_Quiz',
        ]);

        return Session_Quiz::create($validated);
    }

    public function show(Session_Quiz $Session_Quiz) { return $Session_Quiz->load(['etudiant','quiz','resultats']); }

    public function update(Request $request, Session_Quiz $Session_Quiz)
    {
        $validated = $request->validate([
            'Date_Passage' => 'sometimes|date',
            'Score_Obtenu' => 'sometimes|numeric',
            'Duree_Effective' => 'sometimes|integer',
            'ID_Etu' => 'sometimes|exists:etudiants,ID_Etudiant',
            'ID_Quiz' => 'sometimes|exists:quizzes,ID_Quiz',
        ]);

        $Session_Quiz->update($validated);
        return $Session_Quiz;
    }

    public function destroy(Session_Quiz $sessionQuiz)
    {
        $sessionQuiz->delete();
        return response()->json(['message' => 'SessionQuiz deleted']);
    }
}
