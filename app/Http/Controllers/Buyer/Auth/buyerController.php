<?php

namespace App\Http\Controllers\Buyer\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class buyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buyer.buyerLogin');
    }

    public function buyerLogin(Request $request)
    {
        try {
            if (Auth::guard('buyer')->attempt($request->only('email', 'password'))) {
                return redirect()->route('buyer.home');
            } else {
                dd("Login Failed");
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temporary server error.');
        }
    }

    public function getHome()
    {
        return view('buyer.home');
    }

    public function buyerLogout()
    {
        try {
            Auth::guard('buyer')->logout();
            return redirect()->route('buyer.Logins');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temporary server error.');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
