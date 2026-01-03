<?php

namespace App\Http\Controllers;

use App\Models\Statistique;
use Illuminate\Http\Request;

class StatistiqueController extends Controller
{
    public function index() { return Statistique::with('quiz')->get(); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Score_Moyen' => 'required|numeric',
            'Taux_Reussite' => 'required|numeric',
            'Date_Calcul' => 'required|date',
            'ID_Quiz' => 'required|exists:quizzes,ID_Quiz',
        ]);

        return Statistique::create($validated);
    }

    public function show(Statistique $statistique) { return $statistique->load('quiz'); }

    public function update(Request $request, Statistique $statistique)
    {
        $validated = $request->validate([
            'Score_Moyen' => 'sometimes|numeric',
            'Taux_Reussite' => 'sometimes|numeric',
            'Date_Calcul' => 'sometimes|date',
            'ID_Quiz' => 'sometimes|exists:quizzes,ID_Quiz',
        ]);

        $statistique->update($validated);
        return $statistique;
    }

    public function destroy(Statistique $statistique)
    {
        $statistique->delete();
        return response()->json(['message' => 'Statistique deleted']);
    }
}
