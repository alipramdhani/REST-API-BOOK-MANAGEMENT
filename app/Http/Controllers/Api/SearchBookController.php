<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class SearchBookController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->query('q'); // ⬅️ Sama dengan fetch()

        $books = Book::when($keyword, function ($query) use ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('book_name', 'like', "%{$keyword}%")
                    ->orWhere('description', 'like', "%{$keyword}%");
            });
        })
            ->latest()
            ->get();

        return response()->json($books);
    }
}
