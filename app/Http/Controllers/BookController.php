<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function __construct(){
        $this->middleware('permission:update role', ['only' => ['rateBook','addToFavorite']]);
    }
    public function index()
    {
        $books=Book::get();
        return view('admin.index')->with('books',$books);
    }

    public function create()
    {   
        $allCategories=Category::where('parent_id','!=',0)->get();
        return view('admin.create',['allCategories'=>$allCategories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required','string'],
            'description' => ['string','nullable'],
            'price' => ['required','numeric'],
            'category_id' => ['required'],
        ]);

        Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'user_id'=>Auth::Id()
        ]);

        return redirect('books')->with('status','Role Created Successfully');
    }
    public function rateBook(Request $request){
        $request->validate([
            'comment' => ['string','nullable'],
            'rating' => ['required','min:0','max:5'],
        ]);

        $book_id=$request->input('book_id');
        Review::create([
            'user_id'=>Auth::id(),
            'book_id'=>$book_id,
            'comment'=>$request->comment,
            'rating'=>$request->rating,
        ]);
    }

    public function addTofavorite(Book $book){
        //auth::user()->favoriteBooks->toggle($book);
        auth::user()->favoriteBooks->attach($book->id);
    }
}
