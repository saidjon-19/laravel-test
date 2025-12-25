<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\TestType;
use App\Models\User;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index()
    {
        $questions = Question::with(['test_type', 'user'])->get();
        return view('questions.index', compact('questions'));
    }

    public function create()
    {
        $test_types = TestType::all();
        $users = User::all();
        return view('questions.create', compact('test_types', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'test_type_id' => 'required|exists:test_types,id',
            'user_id' => 'required|exists:users,id',
            'title'=> 'required|string|min:3|max:1000',
            'type' => 'required|string|min:3|max:1000',
            'explanation' => 'required|string|min:3|max:1000',
            'difficulty' => 'required|string|min:3|max:1000',
        ]);

        Question::create($validated);
        return redirect()->route('questions.index')->with('success', 'Группа создана');
    }

    public function show(Question $question)
    {
        return view('questions.show', compact('question'));
    }

    public function edit(Question $question)
    {
        $test_types = TestType::all();
        $users = User::all();
        return view('questions.edit', compact('question', 'test_types', 'users'));
    }

    public function update(Request $request, Question $question)
    {
        $validated = $request->validate([
            'test_type_id' => 'required|exists:test_types,id',
            'user_id' => 'required|exists:users,id',
            'title'=> 'required|string|min:3|max:1000',
            'type' => 'required|string|min:3|max:1000',
            'explanation' => 'required|string|min:3|max:1000',
            'difficulty' => 'required|string|min:3|max:1000',
        ]);

        $question->update($validated);
        return redirect()->route('questions.index')->with('success', 'Группа обновлена');
    }

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Группа удалена');
    }
}
