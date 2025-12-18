<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Book;

class BooksController extends Controller
{
    // List Buku dan Pagenation
    public function index()
    {
        $books = Book::paginate(4); // default 4 per halaman
        return view('Main', compact('books'));
    }
}
