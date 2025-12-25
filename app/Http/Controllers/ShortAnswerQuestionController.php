<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\ShortAnswerQuestion;
use Illuminate\Http\Request;

class ShortAnswerQuestionController extends Controller
{
    public function index()
    {
        $short_answer_questions = ShortAnswerQuestion::with('question')->get();
        return view('short_answer_questions.index', compact('short_answer_questions'));
    }

    public function create()
    {
        $questions = Question::all();
        return view('short_answer_questions.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'correct_text'=> 'required|string|min:3|max:1000',
        ]);

        ShortAnswerQuestion::create($validated);
        return redirect()->route('short_answer_questions.index')->with('success', 'Группа создана');
    }

    public function show(ShortAnswerQuestion $short_answer_question)
    {
        return view('short_answer_questions.show', compact('short_answer_question'));
    }

    public function edit(ShortAnswerQuestion $short_answer_question)
    {
        $questions = Question::all();
        return view('short_answer_questions.edit', compact('short_answer_question', 'questions'));
    }

    public function update(Request $request, ShortAnswerQuestion $short_answer_question)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'correct_text'=> 'required|string|min:3|max:1000',
        ]);

        $short_answer_question->update($validated);
        return redirect()->route('short_answer_questions.index')->with('success', 'Группа обновлена');
    }

    public function destroy(ShortAnswerQuestion $short_answer_question)
    {
        $short_answer_question->delete();
        return redirect()->route('short_answer_questions.index')->with('success', 'Группа удалена');
    }
}
