<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Journal;
use App\Models\Lagu;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class frontEndController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $journals = Journal::where('user_id', auth()->id())->latest()->get();
        $lagu = Lagu::latest()->first();

        return view('frontend.homepage2.index', compact('categories', 'journals', 'lagu'));
    }

    public function create(Category $category)
    {
        $lagu = Lagu::latest()->first();
        $questions = Question::where('category_id', $category->id)->first();

        if (!$questions) {
            return redirect()->route('journal')->with('error', 'No questions found for this category.');
        }

        return view('frontend.homepage2.create', [
            'questions' => $questions,
            'category' => $category
        ], compact('lagu'));
    }
    public function store(Request $request, Category $category)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'answer1' => 'required|string',
            'answer2' => 'required|string',
            'answer3' => 'required|string',
            'description' => 'nullable|string',
        ]);

        Journal::create([
            'user_id' => Auth::id(),
            'category_id' => $category->id,
            'title' => $request->title,
            'answer1' => $request->answer1,
            'answer2' => $request->answer2,
            'answer3' => $request->answer3,
            'description' => $request->description,
        ]);

        return redirect()->route('journal')->with('success', 'Journal has been saved.');
    }

    public function show()
    {
        return view('frontend.homepage2.read');
    }
}
