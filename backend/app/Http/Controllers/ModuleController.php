<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index() { return Module::with('quizzes')->get(); }

    public function store(Request $request)
    {
        $validated = $request->validate(['Nom_Module' => 'required|string|max:255']);
        return Module::create($validated);
    }

    public function show(Module $module) { return $module->load('quizzes'); }

    public function update(Request $request, Module $module)
    {
        $validated = $request->validate(['Nom_Module' => 'sometimes|string|max:255']);
        $module->update($validated);
        return $module;
    }

    public function destroy(Module $module)
    {
        $module->delete();
        return response()->json(['message' => 'Module deleted']);
    }
}
