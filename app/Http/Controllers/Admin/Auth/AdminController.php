<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminLoginFormRequest;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(__('message.test'));
    }

    public function getAdminLogin()
    {
        return view('admin.adminLogin');
    }

    public function adminLogin(AdminLoginFormRequest $request)
    {
        try {
            if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
                return redirect()->route('admin.Dashboard')->with('success', 'Login Successfull');
            } else {
                return redirect()->back()->with('error', 'Please Check Credentials');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temporary server error.');
        }
    }

    public function getadminDashboard(Request $request)
    {
        $user = User::all();
        if ($request->sorting === "active") {
            $user = $user->where('active_status', 1);
        } elseif ($request->sorting === "inactive") {
            $user = $user->where('active_status', 0);
        }
        return view('admin.adminDashboard', ['users' => $user, 'params' => $request->sorting]);
    }

    public function adminLogout()
    {
        try {
            Auth::guard('admin')->logout();
            return redirect()->route('login');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temporary server error.');
        }
    }

    public function userStatus(Request $request)
    {
        try {
            // dd("enter");
            $user_id = $request->userId;
            User::where('id', $user_id)->update([
                'active_status' => $request->status,
            ]);
            return response()->json(['success', 'Status Changes Successfully']);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Status Not Changed');
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
