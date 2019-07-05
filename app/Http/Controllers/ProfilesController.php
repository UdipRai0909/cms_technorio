<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Profile;
use App\Setting;
use Session;



class ProfilesController extends Controller
{
    public function index()
    {

//        $user = Auth::user();
        return view('admin.users.profile')
            ->with('user', Auth::user())
            ->with('settings', Setting::first())
            ->with('posts',Post::all());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required|email',
            'about' => 'required',
            'facebook' => 'required|url',
            'youtube' => 'required|url'
        ]);

        $user = Auth::user();

        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;
            $avatar_new_name = time().$avatar->getClientOriginalName();
            $avatar->move('uploads/avatars', $avatar_new_name);
            $user->profile->avatar = 'uploads/avatars/' .$avatar_new_name;
            $user->profile->save();
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->about = $request->about;
        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;

        $user->save();
        $user->profile->save();

        if($request->has('password'))
        {
            $user->password=bcrypt($request->password);
        }
        Session::flash('success','Account Profile updated.');
        return redirect()->back();

    }

    public function destroy($id)
    {

    }
}
