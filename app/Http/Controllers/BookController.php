<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::with('category')->get();
        return view("book.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view("book.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'isbn' => 'required|string|max:13|unique:book,isbn',
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publish_year' => 'required|integer',
            'description' => 'nullable|string|max:300',
            'category_id' => 'required|exists:category,id',
            'cover' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
        if ($request->hasFile('cover')) {
            $fileName = $validatedData['isbn'] . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->storeAs('uploads', $fileName, 'public');
            $validatedData['cover'] = $fileName;
        } else {
            unset($validatedData['cover']);
        }
        // NEW
        Book::create($validatedData);
        // OLD
        // $book = new Book($request->all());
        // $book->save();
        return redirect()->route('book.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('book.edit', compact('book', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publish_year' => 'required|integer',
            'description' => 'nullable|string|max:300',
            'category_id' => 'required|exists:category,id',
            'cover' => 'nullable|image|mimes:jpg,png,jpeg|max:2048'
        ]);
        if ($request->hasFile('cover')) {
            if ($book->cover) {
                Storage::disk('public')->delete('uploads/' . $book->cover);
            }
            $fileName = $book->isbn . '.' . $request->file('cover')->getClientOriginalExtension();
            $request->file('cover')->storeAs('uploads', $fileName, 'public');
            $validatedData['cover'] = $fileName;
        } else {
            unset($validatedData['cover']);
        }
        $book->update($validatedData);
        return redirect()->route('book.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->cover) {
            Storage::disk('public')->delete('uploads/' . $book->cover);
        }
        $book->delete();
        return redirect()->route('book.index');
    }
}
