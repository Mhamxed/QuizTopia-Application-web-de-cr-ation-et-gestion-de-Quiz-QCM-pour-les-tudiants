<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

class EtudiantController extends Controller
{
    public function index() { return Etudiant::with('groupe')->get(); }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nom' => 'required|string|max:255',
            'Prenom' => 'required|string|max:255',
            'Email' => 'required|email|unique:etudiants,Email',
            'MotDePasse' => 'required|string',
            'id_Groupe' => 'required|exists:groupes,ID_Groupe',
        ]);

        return Etudiant::create($validated);
    }

    public function show(Etudiant $etudiant) { return $etudiant->load('groupe'); }

    public function update(Request $request, Etudiant $etudiant)
    {
        $validated = $request->validate([
            'Nom' => 'sometimes|string|max:255',
            'Prenom' => 'sometimes|string|max:255',
            'Email' => 'sometimes|email|unique:etudiants,Email,' . $etudiant->ID_Etudiant . ',ID_Etudiant',
            'MotDePasse' => 'sometimes|string',
            'id_Groupe' => 'sometimes|exists:groupes,ID_Groupe',
        ]);

        $etudiant->update($validated);
        return $etudiant;
    }

    public function destroy(Etudiant $etudiant)
    {
        $etudiant->delete();
        return response()->json(['message' => 'Etudiant deleted']);
    }
}
