<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class SearchBookController extends Controller
{
    // Fitur Search
    public function search(Request $request)
    {
        $query = Book::query();


        if ($request->book_name) {
            $query->where('book_name', 'like', '%' . $request->book_name . '%');
        }


        if ($request->description) {
            $query->where('description', 'like', '%' . $request->description . '%');
        }


        return response()->json($query->get());
    }
}
