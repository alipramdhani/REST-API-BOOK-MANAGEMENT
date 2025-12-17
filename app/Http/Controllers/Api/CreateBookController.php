<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class CreateBookController extends Controller
{
    /// Tambah Buku Baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_name' => 'required|string|max:150',
            'author' => 'required|string|max:150',
            'description' => 'nullable|string',
            'published_date' => 'required|date',
        ]);


        // cek apakah data buku sudah dibuat?
        $exists = Book::where('book_name', $request->book_name)
            ->where('author', $request->author)
            ->exists();


        if ($exists) {
            return response()->json([
                'message' => 'Buku dengan nama dan author tersebut sudah ada'
            ], 422);
        }


        $book = Book::create($validated);


        return response()->json($book, 201);
    }
}
