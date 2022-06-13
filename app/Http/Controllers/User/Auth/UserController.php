<?php

namespace App\Http\Controllers\User\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\editAccountFormRequest;
use App\Http\Requests\User\UserLoginFormRequest;
use App\Http\Requests\User\UserSignupFormRequest;
use App\Http\Traits\ImageTrait;
use App\Models\User\Like;
use App\Models\User\Post;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getSignup()
    {
        return view('user.userRegister');
    }

    public function userSignup(UserSignupFormRequest $request)
    {
        try {
            $profile = $this->imageUpload($request, 'profile', 'profile');
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'profile_photo' => $profile,
            ]);
            Auth::guard('user')->login($user);
            return redirect()->route('user.Feed')->with('success', 'Signup Successfull');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temporary Server Error.');
        }
    }

    public function userFeed(Request $request)
    {
        $likes = Like::select('post_Likes')->where('user_id', Auth::guard('user')->user()->id)->get();
        // dd($likes);
        $allposts = Post::paginate(8);
        if ($request->sorting === "created_at") {
            $allposts = Post::orderBy('created_at', 'desc')->get();
        }
        return view('user.userFeed', ['allpost' => $allposts, 'like' => $likes, 'params' => $request->sorting, 'user' => Auth::guard('user')->user()]);
    }

    public function userLogout()
    {
        try {
            Auth::guard('user')->logout();
            return redirect()->route('user.Login');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temporary Server Error.');
        }
    }

    public function userLogin(UserLoginFormRequest $request)
    {
        try {
            if (Auth::guard('user')->attempt($request->only('email', 'password'))) {
                $userstatus = Auth::guard('user')->user()->active_status;
                if ($userstatus === 1) {
                    return redirect()->route('user.Feed')->with('success', 'Login Successful');
                } else {
                    Auth::guard('user')->logout();
                    return redirect()->route('user.Login')->with('error', 'Your account is Inactive');
                }
            } else {
                return back()->with('error', 'Please Check Credentials');
            }
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temporary Server Error.');
        }
    }

    public function userPosts(Request $request)
    {
        $posts = Post::all()->where('user_id', Auth::guard('user')->id());
        return view('user.userPost', array('user' => Auth::guard('user')->user(), 'post' => $posts));
    }

    public function getAccount()
    {
        return view('user.userAccount', ['user' => Auth::guard('user')->user()]);
    }

    public function index()
    {
        return view('user.userEditAccount', ['user' => Auth::guard('user')->user()]);
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
    public function store(editAccountFormRequest $request)
    {
        try {
            $user = Auth::guard('user')->user();
            $profilephoto = $this->imageUpload($request, 'profile', 'profile');
            if (isset($profilephoto)) {
                Storage::disk('public')->delete($user->profile_photo);
            } else {
                $profilephoto = $user->profile_photo;
            }
            User::where('id', $user->id)->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $user->email,
                'profile_photo' => $profilephoto,
            ]);
            return redirect()->route('user.Account')->with('success', 'Profile was updated');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Temporary Server Error.');
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
