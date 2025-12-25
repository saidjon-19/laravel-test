<?php

namespace App\Http\Controllers;

use App\Models\TestType;
use Illuminate\Http\Request;

class Test_TypeController extends Controller
{
    public function index()
    {
        $test_types = TestType::all();
        dd($test_types);
        return view('test_types.index', compact('test_types'));
    }
    public function create()
    {
        return view('test_types.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required|string|min:3|max:1000',
        ]);

        TestType::create($validated);
        return redirect()->route('test_types.index');
    }
    public function show(TestType $test_type)
    {
        return view('test_types.show', compact('test_type'));
    }
    public function edit(TestType $test_type)
    {
        return view('test_types.edit', compact('test_type'));
    }
    public function update(Request $request, TestType $test_type)
    {
         $validated = $request->validate([
            'name'=> 'required|string|min:3|max:1000',
        ]);

        $test_type->update($validated);
        return redirect()->route('test_types.index');
    }
    public function destroy(TestType $test_type)
    {
        $test_type->delete();
        return redirect()->route('test_types.index');
    }
}
