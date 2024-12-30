<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with('book')->get();

        return view('borrow', compact('borrows'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|integer',
            'book_id' => 'required|exists:books,id', 
        ], [
            'book_id.exists' => 'Buku tidak ditemukan.', 
        ]);
    
        $isBorrowed = Borrow::where('book_id', $request->book_id)->exists(); 
    
        if ($isBorrowed) {
            return redirect()->back()->withErrors(['book_id' => 'Buku sudah dipinjam.']); 
        }
    
        $existingBorrow = Borrow::where('nim', $request->nim)
                                ->where('book_id', '!=', $request->book_id)  
                                ->exists();
    
        if ($existingBorrow) {
            
        }
    
        
        Borrow::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'book_id' => $request->book_id,     
            'borrowed_at' => now(),
            'due_date' => now()->addDays(7),
        ]);
    
        return redirect()->route('borrow.index')->with('success', 'Buku berhasil dipinjam.');
    }
    
}
