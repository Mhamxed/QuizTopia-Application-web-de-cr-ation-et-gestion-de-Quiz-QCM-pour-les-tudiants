<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        return Question::with('quiz')->get();
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
    public function update(Request $request, $id)
    {
        $question = Question::where('ID_Question', $id)->firstOrFail();

        $validated = $request->validate([
            'Num_Ordre'        => 'sometimes|integer',
            'Point_Question'   => 'sometimes|integer|min:0',
            'Enonce_Question'  => 'sometimes|string',
            'ID_Quiz'          => 'sometimes|exists:quizzes,ID_Quiz',
        ]);

        $question->update($validated);

        return response()->json($question);
    }
    public function destroy($id)
    {
        $question = Question::where('ID_Question', $id)->firstOrFail();
        $question->delete();

        return response()->json(['message' => 'Question deleted successfully']);
    }
}
