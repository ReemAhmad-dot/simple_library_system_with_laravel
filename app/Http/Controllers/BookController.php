<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\BookService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBookRequest;

class BookController extends Controller
{
    protected  $bookService;

    public function __construct(BookService $bookService){
        $this->bookService=$bookService;
        $this->middleware('permission:update role', ['only' => ['rateBook','addToFavorite']]);
    }
    public function index()
    {
        $books=Book::get();
        return view('admin.books.index')->with('books',$books);
    }

    public function create()
    {   
        $allCategories=Category::where('parent_id','!=',0)->get();
        return view('admin.books.create',['allCategories'=>$allCategories]);
    }

    public function store(StoreBookRequest $request)
    {
        $validated=$request->safe();
        $this->bookService->create($validated);

        return redirect('/books')->with('status','Book Created Successfully');
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
