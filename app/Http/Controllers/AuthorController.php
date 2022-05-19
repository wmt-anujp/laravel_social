<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AddAuthorFormRequest;

class AuthorController extends Controller
{
    public function authorspage()
    {
        return view('authors/showauthor', ['author' => Author::orderBy('created_at', 'desc')->get()]);
    }

    public function addauthorform()
    {
        return view('authors/addauthor');
    }

    public function addnewauthor(AddAuthorFormRequest $request)
    {
        // $request->validate([]);
        $author = new Author();
        $author->auth_fname = $request->a_fname;
        $author->auth_lname = $request->a_lname;
        $author->auth_dob = $request->a_dob;
        $author->auth_gen = $request->a_gen;
        $author->auth_address = $request->a_address;
        $author->auth_mobile = $request->a_mobile_no;
        $author->auth_desc = $request->a_desc;
        $author->user_id = Auth::user()->id;
        $author->auth_status = $request->a_status;
        $author->save();
        return redirect()->route('addauthor')->with('success', 'Author was added Successfully');
    }

    public function authordelete($id)
    {
        Author::find($id)->delete();
        return back()->with('success', 'Author was Deleted Successfully');
    }

    public function authordetails(Request $request)
    {
        $auth_id = $request['authorid'];
        $author = Author::find($auth_id);
        return response()->json($author);
    }
}
