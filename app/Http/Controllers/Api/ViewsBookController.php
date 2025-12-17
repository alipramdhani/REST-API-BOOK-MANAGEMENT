<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;

class ViewsBookController extends Controller
{
    // List Buku dan Pagenation
    public function index()
    {
        $books = Book::paginate(4); // default 4 per halaman
        return response()->json($books);
    }
}
