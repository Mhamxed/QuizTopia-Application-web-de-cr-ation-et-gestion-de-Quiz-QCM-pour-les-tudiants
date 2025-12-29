<?php

namespace App\Http\Controllers;

use App\Models\Choix;
use Illuminate\Http\Request;

class ChoixController extends Controller
{
    public function index()
    {
        return Choix::with(['question', 'resultat'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Texte_Choix'  => 'required|string',
            'Est_Correct' => 'required|boolean',
            'ID_Question' => 'required|exists:questions,ID_Question',
            'ID_Resultat' => 'required|exists:resultats,ID_Resultat',
        ]);

        $choix = Choix::create($validated);

        return response()->json($choix, 201);
    }

    public function show($id)
    {
        return Choix::with(['question', 'resultat'])
            ->where('ID_Choix', $id)
            ->firstOrFail();
    }

    public function update(Request $request, $id)
    {
        $choix = Choix::where('ID_Choix', $id)->firstOrFail();

        $validated = $request->validate([
            'Texte_Choix'  => 'sometimes|string',
            'Est_Correct' => 'sometimes|boolean',
            'ID_Question' => 'sometimes|exists:questions,ID_Question',
            'ID_Resultat' => 'sometimes|exists:resultats,ID_Resultat',
        ]);

        $choix->update($validated);

        return response()->json($choix);
    }

    public function destroy($id)
    {
        $choix = Choix::where('ID_Choix', $id)->firstOrFail();
        $choix->delete();

        return response()->json(['message' => 'Choix deleted successfully']);
    }
}
