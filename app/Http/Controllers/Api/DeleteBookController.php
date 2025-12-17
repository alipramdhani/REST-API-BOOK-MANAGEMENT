<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;


class DeleteBookController extends Controller
{
    // Hapus Data Buku
    public function destroy($id)
    {
        $book = Book::find($id);


        if (!$book) {
            return response()->json(['message' => 'Buku tidak ditemukan'], 404);
        }


        $book->delete();


        return response()->json(['message' => 'Buku berhasil dihapus']);
    }
}
