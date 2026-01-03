<?php

namespace App\Http\Controllers;

use App\Models\Resultat;
use Illuminate\Http\Request;

class ResultatController extends Controller
{
    
    public function index()
    {
        $resultats = Resultat::all();
        return view('resultat.index', compact('resultats'));
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
    public function edit($id)
    {
        $resultat = Resultat::findOrFail($id);
        return view('resultat.edit', compact('resultat'));
    }

    // Handle update
    public function update(Request $request, $id)
    {
        $resultat = Resultat::findOrFail($id);

        $resultat->update([
            'Points_Obtenus' => $request->Points_Obtenus,
            'ID_Question' => $request->ID_Question,
            'ID_Session' => $request->ID_Session,
        ]);

        return redirect()->route('resultat.index')->with('success', 'Resultat mis à jour avec succès !');
    }
    public function destroy($id)
    {
        $resultat = Resultat::findOrFail($id);
        $resultat->delete();
        return redirect()->back()->with('success', 'Resultat deleted successfully!');
    }
}
