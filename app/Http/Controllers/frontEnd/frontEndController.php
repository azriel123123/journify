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
        $laguList = Lagu::all();
        $currentLagu = $laguList->first(); // lagu pertama sebagai default

        return view('frontend.homepage2.index', compact('categories', 'journals', 'laguList', 'currentLagu'));
    }

    public function create(Category $category)
    {
          $laguList = Lagu::all();
        $currentLagu = $laguList->first(); // lagu pertama sebagai default

        $questions = Question::where('category_id', $category->id)->first();


        if (!$questions) {
            return redirect()->route('journal')->with('error', 'No questions found for this category.');
        }

        return view('frontend.homepage2.create', [
            'questions' => $questions,
            'category' => $category
        ], compact('laguList', 'currentLagu'));
    }
    public function         store(Request $request, Category $category)
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
    public function edit(Category $category,$id)
    {
        $journal = Journal::where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

    $questions = Question::where('category_id', $category->id)->first();

     $laguList = Lagu::all();
        $currentLagu = $laguList->first(); // lagu pertama sebagai default


    return view('frontend.homepage2.read', compact(
        'journal',
        'category',
        'questions',
        'laguList',
        'currentLagu'
    ));
    }


   public function update(Request $request, Category $category, $id){
    $request->validate([
        'title' => 'required|string|max:255',
        'answer1' => 'required|string',
        'answer2' => 'required|string',
        'answer3' => 'required|string',
        'description' => 'nullable|string',
    ]);

    $journal = Journal::findOrFail($id);

    // Cek apakah journal ini milik user yang sedang login (opsional, tapi aman)
    if ($journal->user_id !== Auth::id()) {
        abort(403, 'Unauthorized');
    }

    $journal->update([
        'category_id' => $category->id,
        'title' => $request->title,
        'answer1' => $request->answer1,
        'answer2' => $request->answer2,
        'answer3' => $request->answer3,
        'description' => $request->description,
    ]);

    return redirect()->route('journal')->with('success', 'Journal has been updated.');
}

    public function play($id)
    {
        $currentLagu = Lagu::findOrFail($id);
        $laguList = Lagu::where('id', '!=', $id)->get(); // sisanya jadi playlist
        $categories = Category::all();
        $journals = Journal::where('user_id', auth()->id())->latest()->get();

        return view('frontend.homepage2.index', compact('laguList', 'currentLagu', 'categories', 'journals'));
    }
}
