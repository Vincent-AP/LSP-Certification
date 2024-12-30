<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Borrow;

class Bookcontroller extends Controller
{
    public function create(){
        return view('create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => ['required', 'string', 'max:255', Rule::unique('books')],
            'author' => ['required', 'string'],
            'year' => ['required', 'integer'],
        ]);

        $books = new Book();
        $books->title = $request->title;
        $books->author = $request->author;
        $books->year = $request->year;

        $books->save();

        return redirect('/books');
    }

    public function index() {
        $books = Book::all(); 
        return view('books', ['books' => $books]); 
    }
    public function edit($id)
    {
        $book = Book::findOrFail($id);
    
        // Check if the book is currently borrowed
        $isBorrowed = Borrow::where('book_id', $id)->exists();
    
        if ($isBorrowed) {
            return redirect()->route('books.index')->withErrors([
                "book_{$id}" => 'Buku sedang dipinjam dan tidak dapat diubah.'
            ]);
        }
    
        return view('edit', compact('book'));
    }
    
    public function update(Request $request, $id) {
        $book = Book::findOrFail($id); 
    
        $request->validate([
            'title' => [
                'required', 
                'string', 
                'max:255', 
                Rule::unique('books')->ignore($book->id)
            ],
            'author' => ['required', 'string'],
            'year' => ['required', 'integer'],
        ]);
    
        $book->title = $request->title;
        $book->author = $request->author;
        $book->year = $request->year;
    
        $book->save(); 
    
        return redirect('/books')->with('success', 'Book updated successfully!');
    }
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
    
        // Check if the book is currently borrowed
        $isBorrowed = Borrow::where('book_id', $id)->exists();
    
        if ($isBorrowed) {
            return redirect()->route('books.index')->withErrors([
                "book_{$id}" => 'Buku sedang dipinjam dan tidak dapat dihapus.'
            ]);
        }
    
        $book->delete();
    
        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus.');
    }
    

    public function formpinjam($book_id)
{
    $book = Book::findOrFail($book_id);

    // Check if the book is currently borrowed
    $isBorrowed = Borrow::where('book_id', $book_id)->exists();

    if ($isBorrowed) {
        return redirect()->route('books.index')->withErrors([
            "book_{$book_id}" => 'Buku sedang dipinjam dan tidak dapat dipinjam lagi.'
        ]);
    }

    return view('formpinjam', compact('book'));
}

}
