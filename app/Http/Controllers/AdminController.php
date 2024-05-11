<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $books=Book::with('category');
        return view('admin.index')->with('books',$books);
    }
}
