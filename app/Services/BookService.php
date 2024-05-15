<?php
namespace App\Services;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class BookService{
    public function create($validated){
        $book=Book::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'price' => $validated['price'],
                'category_id' => $validated['category_id'],
                'user_id'=>Auth::Id()
        ]);
        return $book;
    }
}