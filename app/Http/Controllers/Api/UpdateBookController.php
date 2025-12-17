<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class UpdateBookController extends Controller
{
    // Edit Buku (hanya description)
    public function update(Request $request, $id)
    {
        $book = Book::find($id);


        if (!$book) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }


        $request->validate([
            'description' => 'nullable|string'
        ]);


        $book->update([
            'description' => $request->description
        ]);


        return response()->json($book);
    }
}
