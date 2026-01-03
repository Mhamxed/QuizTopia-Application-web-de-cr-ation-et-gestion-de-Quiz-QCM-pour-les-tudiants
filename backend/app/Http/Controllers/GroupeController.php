<?php

namespace App\Http\Controllers;

use App\Models\Groupe;
use Illuminate\Http\Request;

class GroupeController extends Controller
{
    public function index() { return Groupe::with('etudiants')->get(); }

    public function store(Request $request)
    {
        $validated = $request->validate(['Nom_Groupe' => 'required|string|max:255']);
        return Groupe::create($validated);
    }

    public function show(Groupe $groupe) { return $groupe->load('etudiants'); }

    public function update(Request $request, Groupe $groupe)
    {
        $validated = $request->validate(['Nom_Groupe' => 'sometimes|string|max:255']);
        $groupe->update($validated);
        return $groupe;
    }

    public function destroy(Groupe $groupe)
    {
        $groupe->delete();
        return response()->json(['message' => 'Groupe deleted']);
    }
}
