<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use Illuminate\Http\Request;

class ResultatController extends Controller
{
    public function index()
    {
        return Resultat::with(['question', 'sessionQuiz'])->get();
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Points_Obtenus' => 'required|numeric',
            'ID_Question'   => 'required|exists:questions,ID_Question',
            'ID_Session'    => 'required|exists:session_quizzes,ID_Session',
        ]);

        $resultat = Resultat::create($validated);

        return response()->json($resultat, 201);
    }
    public function show($id)
    {
        return Resultat::with(['question', 'sessionQuiz'])
            ->where('ID_Resultat', $id)
            ->firstOrFail();
    }
    public function update(Request $request, $id)
    {
        $resultat = Resultat::where('ID_Resultat', $id)->firstOrFail();

        $validated = $request->validate([
            'Points_Obtenus' => 'sometimes|numeric',
            'ID_Question'   => 'sometimes|exists:questions,ID_Question',
            'ID_Session'    => 'sometimes|exists:session_quizzes,ID_Session',
        ]);

        $resultat->update($validated);

        return response()->json($resultat);
    }
    public function destroy($id)
    {
        $resultat = Resultat::where('ID_Resultat', $id)->firstOrFail();
        $resultat->delete();

        return response()->json(['message' => 'Resultat deleted successfully']);
    }
}
