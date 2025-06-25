<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lagu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaguController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Lagu::with('category');
    
        if ($request->has('filter')) {
            $filter = strtolower($request->filter);
            $query->whereHas('category', function ($q) use ($filter) {
                $q->whereRaw('LOWER(name) = ?', [$filter]);
            });
        }
    
        $lagus = $query->latest()->get();
        $categories = Category::all();
    
        return view('pages.lagu.index', compact('lagus', 'categories'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('pages.lagu.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'penyanyi' => 'required',
            'file' => 'required|mimes:mp3',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('lagu', 'public');
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('lagu', 'public');
        }

        Lagu::create([
            'judul' => $request->judul,
            'penyanyi' => $request->penyanyi,
            'file' => $filePath,
            'category_id' => $request->category_id,
            'image' => $imagePath
        ]);

        return redirect()->route('song.index')->with('success', 'Lagu berhasil diupload.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lagu = Lagu::findOrFail($id);
        $categories = Category::all();

        return view('admin.lagu.edit', compact('lagu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'penyanyi' => 'required',
            'category_id' => 'required|exists:categories,id',
            'file' => 'nullable|mimes:mp3',
        ]);
    
        $lagu = Lagu::findOrFail($id);
    
        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($lagu->file && Storage::disk('public')->exists($lagu->file)) {
                Storage::disk('public')->delete($lagu->file);
            }
    
            // Simpan file baru
            $file = $request->file('file');
            $filePath = $file->store('lagu', 'public');
            $lagu->file = $filePath;
        }
    
        $lagu->judul = $request->judul;
        $lagu->penyanyi = $request->penyanyi;
        $lagu->category_id = $request->category_id;
        $lagu->save();
    
        return redirect()->route('song.index')->with('success', 'Lagu berhasil diperbarui.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lagu = Lagu::findOrFail($id);
    
        // Hapus file MP3 dari storage
        if ($lagu->file && Storage::disk('public')->exists($lagu->file)) {
            Storage::disk('public')->delete($lagu->file);
        }
    
        // Hapus data dari database
        $lagu->delete();
    
        return redirect()->route('song.index')->with('success', 'Lagu berhasil dihapus.');
    }
}
