<?php

namespace App\Http\Controllers;

use App\Models\Choix;
use Illuminate\Http\Request;

class ChoixController extends Controller
{
    // GET all choices
    public function index()
    {
        return response()->json(Choix::getAllChoix());
    }

    // GET single choice
    public function show($id)
    {
        $choix = Choix::getChoixById($id);
        if (!$choix) {
            return response()->json(['message' => 'Choix not found'], 404);
        }
        return response()->json($choix);
    }

    // CREATE a choice
    public function store(Request $request)
    {
        $request->validate([
            'Texte_Choix' => 'required|string',
            'Est_Correct' => 'required|boolean',
            'ID_Resultat' => 'required|integer',
            'ID_Question' => 'required|integer',
        ]);

        $choix = Choix::createChoix(
            $request->Texte_Choix,
            $request->Est_Correct,
            $request->ID_Resultat,
            $request->ID_Question
        );

        return response()->json($choix, 201);
    }

    // UPDATE a choice
    public function update(Request $request, $id)
    {
        $choix = Choix::updateChoix(
            $id,
            $request->Texte_Choix ?? null,
            $request->Est_Correct ?? null,
            $request->ID_Resultat ?? null,
            $request->ID_Question ?? null
        );

        if (!$choix) {
            return response()->json(['message' => 'Choix not found'], 404);
        }

        return response()->json($choix);
    }

    // DELETE a choice
    public function destroy($id)
    {
        if (!Choix::deleteChoix($id)) {
            return response()->json(['message' => 'Choix not found'], 404);
        }

        return response()->json(['message' => 'Choix deleted successfully']);
    }
}
