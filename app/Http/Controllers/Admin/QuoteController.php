<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use App\Models\Category;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        $query = Quote::with('category');
    
        if ($request->has('filter')) {
            $filter = strtolower($request->filter);
            $query->whereHas('category', function ($q) use ($filter) {
                $q->whereRaw('LOWER(name) = ?', [$filter]);
            });
        }
    
        $quotes = $query->latest()->get();
        $categories = Category::all();
    
        return view('pages.quotes.index', compact('quotes', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('pages.quotes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'headline' => 'required',
            'isi' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Quote::create($request->all());

        return redirect()->route('quote.index')->with('success', 'Quote berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $quote = Quote::findOrFail($id);
        $categories = Category::all();
        return view('pages.quotes.edit', compact('quote', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'headline' => 'required',
            'isi' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $quote = Quote::findOrFail($id);
        $quote->update($request->all());

        return redirect()->route('quote.index')->with('success', 'Quote berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();

        return redirect()->route('quote.index')->with('success', 'Quote berhasil dihapus.');
    }
}
