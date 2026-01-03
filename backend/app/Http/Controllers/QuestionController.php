<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::all();
        return view('question.index', compact('questions'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Num_Ordre'        => 'required|integer',
            'Point_Question'   => 'required|integer|min:0',
            'Enonce_Question'  => 'required|string',
            'ID_Quiz'          => 'required|exists:quizzes,ID_Quiz',
        ]);

        $question = Question::create($validated);

        return response()->json($question, 201);
    }
    public function show($id)
    {
        return Question::with(['quiz', 'resultats'])
            ->where('ID_Question', $id)
            ->firstOrFail();
    }
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('question.edit', compact('question'));
    }

    // Handle update
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $question->update([
            'Num_Ordre' => $request->Num_Ordre,
            'Point_Question' => $request->Point_Question,
            'Enonce_Question' => $request->Enonce_Question,
            'ID_Quiz' => $request->ID_Quiz,
        ]);

        return redirect()->route('question.index')->with('success', 'Question mise à jour avec succès !');
    }
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect()->back()->with('success', 'Question deleted successfully!');
    }
}
