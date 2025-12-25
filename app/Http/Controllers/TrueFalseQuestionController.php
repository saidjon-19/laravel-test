<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\TrueFalseQuestion;
use Illuminate\Http\Request;

class TrueFalseQuestionController extends Controller
{
    public function index()
    {
        $true_false_questions = TrueFalseQuestion::with('question')->get();
        return view('true_false_questions.index', compact('true_false_questions'));
    }

    public function create()
    {
        $questions = Question::all();
        return view('true_false_questions.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'correct_answer'=> 'required|boolean',
        ]);

        TrueFalseQuestion::create($validated);
        return redirect()->route('true_false_questions.index')->with('success', 'Группа создана');
    }

    public function show(TrueFalseQuestion $true_false_question)
    {
        return view('true_false_questions.show', compact('true_false_question'));
    }

    public function edit(TrueFalseQuestion $true_false_question)
    {
        $questions = Question::all();
        return view('true_false_questions.edit', compact('true_false_question', 'questions'));
    }

    public function update(Request $request, TrueFalseQuestion $true_false_question)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'correct_answer'=> 'required|boolean',
        ]);

        $true_false_question->update($validated);
        return redirect()->route('true_false_questions.index')->with('success', 'Группа обновлена');
    }

    public function destroy(TrueFalseQuestion $true_false_question)
    {
        $true_false_question->delete();
        return redirect()->route('true_false_questions.index')->with('success', 'Группа удалена');
    }
}
