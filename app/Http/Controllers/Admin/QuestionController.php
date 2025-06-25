<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function index(Request $request)
    {
        $query = Question::with('category');

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->filled('day')) {
            $query->where('day', $request->day);
        }

        $questions = $query->latest()->get();
        $categories = Category::all();

        return view('pages.question.index', compact('questions', 'categories'));
    }


    public function create()
    {
        $category = Category::all();
        return view('pages.question.create', compact('category'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'day' => 'required|integer|min:1',
            'title' => 'required|string',
            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required'
        ]);

        Question::create([
            'day' => $request->day,
            'title' => $request->title,
            'category_id' => $request->category_id,
            'question1' => $request->question1,
            'question2' => $request->question2,
            'question3' => $request->question3
        ]);

        return redirect()->route('question.index')->with('success', 'Question created successfully');
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        $category = Category::all();
        return view('pages.question.edit', compact('question', 'category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'day' => 'required|integer|min:1',
            'title' => 'required|string',
            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required'
        ]);

        $question = Question::findOrFail($id);
        $question->day = $request->day;
        $question->title = $request->title;
        $question->category_id = $request->category_id;
        $question->question1 = $request->question1;
        $question->question2 = $request->question2;
        $question->question3 = $request->question3;
        $question->save();

        return redirect()->route('question.index')->with('success', 'Question updated successfully');
    }



    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->route('question.index')->with('success', 'Question deleted successfully');
    }
}
