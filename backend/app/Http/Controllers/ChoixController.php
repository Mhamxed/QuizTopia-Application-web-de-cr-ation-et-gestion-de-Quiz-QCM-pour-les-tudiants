<?php

namespace App\Http\Controllers;

use App\Models\Choix;
use Illuminate\Http\Request;

class ChoixController extends Controller
{
    public function index()
    {
        $choixes = Choix::all();
        return view('choix.index', compact('choixes'));
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

    // Show edit form
    public function edit($id)
    {
        $choix = Choix::findOrFail($id);
        return view('choix.edit', compact('choix'));
    }

    // Handle update
    public function update(Request $request, $id)
    {
        $choix = Choix::findOrFail($id);

        $choix->update([
            'Texte_Choix' => $request->Texte_Choix,
            'Est_Correct' => $request->has('Est_Correct') ? 1 : 0,
            'ID_Resultat' => $request->ID_Resultat,
            'ID_Question' => $request->ID_Question,
        ]);

        return redirect()->route('choix.index')->with('success', 'Choix mis à jour avec succès !');
    }

    public function destroy($id)
    {
        $choix = Choix::findOrFail($id);
        $choix->delete();
        return redirect()->back()->with('success', 'Choix deleted successfully!');
    }
}
