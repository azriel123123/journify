<?php

namespace App\Http\Controllers\frontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Journal;
use App\Models\Lagu;
use App\Models\Question;
use App\Models\Quote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class frontEndController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Cek kalau user belum bayar
        if ($user->status !== 'paid') {
            return redirect()->route('payment.page')->with('error', 'Silakan selesaikan pembayaran terlebih dahulu.');
        }

        $categories = Category::all();

        $journals = Journal::with('category')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $laguList = Lagu::all();
        $currentLagu = $laguList->first();

        return view('frontend.homepage2.index', compact('categories', 'journals', 'laguList', 'currentLagu', 'user'));
    }



    public function create(Request $request)
    {
        $categories = Category::all();
        $selectedCategoryId = $request->query('category');
        $day = $request->query('day', 1);

        $category = $selectedCategoryId ? Category::find($selectedCategoryId) : null;
        $questions = $category ? Question::where('category_id', $category->id)->where('day', $day)->first() : null;
        $totalHari = $category ? Question::where('category_id', $category->id)->max('day') : 0;

        $laguList = $category ? Lagu::where('category_id', $category->id)->get() : collect();
        $currentLagu = $category && $laguList->count() ? $laguList->first() : null;

        return view('frontend.homepage2.create', compact(
            'questions',
            'category',
            'categories',
            'laguList',
            'currentLagu',
            'totalHari',
            'day'
        ));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'answer1' => 'required|string',
            'answer2' => 'required|string',
            'answer3' => 'required|string',
            'description' => 'nullable|string',
            'day' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id'
        ]);

        $journal = Journal::create([
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'title' => $request->title,
            'answer1' => $request->answer1,
            'answer2' => $request->answer2,
            'answer3' => $request->answer3,
            'description' => $request->description,
            'day' => $request->day,
        ]);

        // Cari quote/afirmasi berdasarkan category dan day
        $quote = Quote::where('category_id', $request->category_id)
            ->where('day', $request->day)
            ->inRandomOrder()
            ->first();

        // Simpan quote ke dalam session agar muncul di halaman index
        if ($quote) {
            session()->flash('affirmation', $quote);
        }

        return redirect()->route('journal')->with('success', 'Jurnal berhasil ditambahkan!');
    }


    public function edit(Category $category, $id)
    {
        $journal = Journal::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $questions = Question::where('category_id', $category->id)->first();

        $laguList = Lagu::all();
        $currentLagu = $laguList->first(); // lagu pertama sebagai default


        $day = $journal->day ?? 1; // Atau logika default day-nya

        return view('frontend.homepage2.read', compact(
            'journal',
            'category',
            'questions',
            'laguList',
            'currentLagu',
            'day'
        ));
    }


    public function update(Request $request, Category $category, $id)
    {
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

    public function play($id, Request $request)
    {
        $currentLagu = Lagu::findOrFail($id);

        if ($request->context === 'create' && $request->has('category_id')) {
            $category = Category::findOrFail($request->category_id);
            $day = $request->input('day', 1); // fallback ke day 1

            $questions = Question::where('category_id', $category->id)->where('day', $day)->first();
            $totalHari = Question::where('category_id', $category->id)->max('day');

            // Lagu dengan kategori mood
            $laguList = Lagu::where('category_id', $category->id)
                ->where('id', '!=', $id)
                ->get();

            return view('frontend.homepage2.create', compact(
                'questions',
                'category',
                'laguList',
                'currentLagu',
                'totalHari',
                'day'
            ));
        }

        // Default behavior (halaman utama)
        $laguList = Lagu::where('id', '!=', $id)->get();
        $categories = Category::all();
        $journals = Journal::where('user_id', auth()->id())->latest()->get();

        return view('frontend.homepage2.index', compact('laguList', 'currentLagu', 'categories', 'journals'));
    }

    public function history()
    {
        $user = Auth::user();
        $journals = Journal::with('category')
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $laguList = Lagu::all();
        $currentLagu = $laguList->first();

        return view('frontend.homepage2.history', compact('journals', 'laguList', 'currentLagu'));
    }
}
