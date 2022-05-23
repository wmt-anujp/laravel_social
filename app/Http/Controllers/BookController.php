<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\Author;
use App\Http\Requests\AddBookFormRequest;
use App\Http\Requests\EditBookFormRequest;
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
        // $folder = 'public/bookimg/';
        // if (!Storage::exists($folder)) {
        //     Storage::makeDirectory($folder, 0777, true, true);
        // }
        $filename = $file->getClientOriginalName();
        // $file->storeAs($filename);
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

    public function bookdelete($id)
    {
        $book = Book::find($id);
        // dd($book);
        $folder = 'public/bookimg/';
        if ($book->book_image != '' && $book->book_image != null) {
            $file_old = $folder . $book->book_image;
            if (Storage::exists($file_old)) {
                Storage::delete($file_old);
            } else {
                echo "<script>alert('File not found')</script>";
            }
        }
        $book->delete();
        return back()->with('success', 'Book was deleted successfully');
    }

    public function bookdetails(Request $request)
    {
        $book_id = $request['bookid'];
        $book = Book::find($book_id);
        return response()->json($book);
    }

    public function editbookform($id)
    {
        $book = Book::find($id);
        $author = Author::all();
        return view('books/editbookform', array('book' => $book, 'author' => $author));
    }

    public function editbook(EditBookFormRequest $request, $id)
    {
        if ($request->b_status == 1) {
            $status = 1;
        } else {
            $status = 0;
        }
        $imagefolder = "public/bookimg/";
        $book = Book::find($id);
        if (isset($book)) {
            $oldfilepath = $imagefolder . $book->book_image;
            // echo "<script>console.log('$oldfilepath')</script>";
            if (Storage::exists($oldfilepath)) {
                Storage::delete($oldfilepath);
            }
        }
        $files = $request->file('b_img');
        $filename = $files->getClientOriginalName();
        $files->storeAs($imagefolder, $filename);
        $book->book_title = $request->b_title;
        $book->book_pages = $request->b_pages;
        $book->book_language = $request->b_lang;
        $book->book_image = $filename;
        $book->book_isbn = $request->b_isbn;
        $book->book_desc = $request->b_desc;
        $book->book_price = $request->b_price;
        $book->book_status = $status;
        $book->update();
        $book->authors()->sync($request->b_author);
        return redirect()->route('bookslist')->with('success', 'Book Details Updated Successfully');
    }

    public function bookstatus(Request $request)
    {
        $book = Book::find($request->book_id);
        $book->book_status = $request->status;
        $book->save();
        return response()->json(['success' => 'Status change successfully.']);
    }
}
