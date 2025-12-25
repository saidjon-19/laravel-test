<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Variant;
use Illuminate\Http\Request;

class VariantController extends Controller
{

    public function index()
    {
        $variants = Variant::with('question')->get();
        return view('variants.index', compact('variants'));
    }

    public function create()
    {
        $questions = Question::all();
        return view('variants.create', compact('questions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'name'=> 'required|string|min:3|max:1000',
            'is_correct' => 'required|boolean',
        ]);

        Variant::create($validated);
        return redirect()->route('variants.index')->with('success', 'Группа создана');
    }

    public function show(Variant $variant)
    {
        return view('variants.show', compact('variant'));
    }

    public function edit(Variant $variant)
    {
        $questions = Question::all();
        return view('variants.edit', compact('variant', 'questions'));
    }

    public function update(Request $request, Variant $variant)
    {
        $validated = $request->validate([
            'question_id' => 'required|exists:questions,id',
            'name'=> 'required|string|min:3|max:1000',
            'is_correct' => 'required|boolean',
        ]);

        $variant->update($validated);
        return redirect()->route('variants.index')->with('success', 'Группа обновлена');
    }

    public function destroy(Variant $variant)
    {
        $variant->delete();
        return redirect()->route('variants.index')->with('success', 'Группа удалена');
    }
}
