<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index() { return Quiz::with(['module','professeur','questions'])->get(); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Titre_Quiz' => 'required|string|max:255',
            'Duree_Minutes' => 'required|integer',
            'Date_Creation' => 'required|date',
            'ID_Module' => 'required|exists:modules,ID_Module',
            'ID_Prof' => 'required|exists:professeurs,ID_Prof',
        ]);

        return Quiz::create($validated);
    }

    public function show(Quiz $quiz) { return $quiz->load(['module','professeur','questions']); }

    public function update(Request $request, Quiz $quiz)
    {
        $validated = $request->validate([
            'Titre_Quiz' => 'sometimes|string|max:255',
            'Duree_Minutes' => 'sometimes|integer',
            'Date_Creation' => 'sometimes|date',
            'ID_Module' => 'sometimes|exists:modules,ID_Module',
            'ID_Prof' => 'sometimes|exists:professeurs,ID_Prof',
        ]);

        $quiz->update($validated);
        return $quiz;
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return response()->json(['message' => 'Quiz deleted']);
    }
}
