<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Author;
use App\Http\Requests\AddAuthorFormRequest;
use App\Http\Requests\AddBookFormRequest;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function booklist()
    {
        return view('books/showbook', ['book' => Book::orderBy('created_at', 'desc')->get()]);
    }

    public function addbookform()
    {
        $author = Author::all();
        return view('books/addbookform', ['author' => $author]);
    }

    public function addnewbook(AddBookFormRequest $request)
    {
        $book = new Book();
        $file = $request->file('b_img');
        $folder = 'public/bookimg/';
        if (!Storage::exists($folder)) {
            Storage::makeDirectory($folder, 0777, true, true);
        }
        $filename = $file->getClientOriginalName();
        $file->storeAs($folder, $filename);
        $book->book_title = $request->b_title;
        $book->book_pages = $request->b_pages;
        $book->book_language = $request->b_lang;
        $book->book_image = $filename;
        $book->book_price = $request->b_price;
        $book->book_desc = $request->b_desc;
        $book->book_isbn = $request->b_isbn;
        $book->user_id = Auth::user()->id;
        $book->book_status = $request->b_status;
        $book->save();
        $book->authors()->attach($request->b_author);
        return redirect()->route('bookslist')->with('success', 'Book was added successfully');
    }
}
