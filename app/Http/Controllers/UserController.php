<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            // echo "<script>alert('data inserted')</script>";
            $user = User::all();
            return view('datadisplay', ['userdata' => $user]);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temprory server error.');
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
    public function store(UserFormRequest $request)
    {
        try {
            $name = $request->input('name');
            $email = $request->input('email');
            $mobile = $request->input('mobile');
            // dd($mobile);
            User::create([
                'name' => $request->name,
                'email' => $email,
                'mobile' => $mobile,
            ]);
            return redirect()->route('user.index')->with('success', 'data inserted');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temprory server error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        return view('details',['userdata'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $user = User::find($id);
            return view('editdata', ['userdata' => $user]);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temprory server error.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
        try {
            // $user=User::find($id);
            // $user->name = $request->input('name');
            // $user->email = $request->input('email');
            // $user->mobile = $request->input('mobile');
            // $user->update();
            User::where('id',$id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
            ]);
            // $userda=User::all();
            return redirect()->route('user.index')->with('success', 'updated successfully');
            // return view('datadisplay',['userdata'=>$userda])->with('success', 'Updated Successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temprory server error.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $user = User::find($id)->delete();
            return redirect()->route('user.index')->with('success', 'Deleted successfully');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temprory server error.');
        }
    }

    // public function getStatus()
    // {
    //     // try{

    //     // }
    //     // catch (\Exception $exception) {
    //     //     return redirect()->back()->with('error', 'Temprory server error.');
    //     // }
    // }
}
