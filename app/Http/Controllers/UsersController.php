<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use App\Post;
use App\Setting;
use Session;
use Auth;


class UsersController extends Controller
{

    public function index()
    {

        return view('admin.users.index')
            ->with('users', User::all())
            ->with('posts', Post::orderBy('created_at','desc')->take(5)->get())
            ->with('settings', Setting::first());
    }


    public function create()
    {
//        dd(Auth::user());
        return view('admin.users.create')
            ->with('posts', Post::orderBy('created_at','desc')->take(5)->get())
            ->with('settings', Setting::first())
            ->with('user', Auth::user()->first());
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);

        $profile = Profile::create([

            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/avatar1.png'
        ]);

        Session::flash('success', 'User Created Successfully');
        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();
        Session::flash('success', 'User Removed.');
        return redirect()->back();
    }

    public function admin($id)
    {
        $user = User::find($id);
        $user->admin = 1;

        $user->save();

        Session::flash('success', 'Changed User Permissions to admin.');
        return redirect()->back();
    }

    public function not_admin($id)
    {
        $user = User::find($id);
        $user->admin = 0;

        $user->save();

        Session::flash('success', 'Changed User Permissions to User-mode only.');
        return redirect()->back();
    }
}
