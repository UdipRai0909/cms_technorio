<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

use App\Tag;
use Session;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class TagsController extends Controller
{

    public function index()
    {
        return view('admin.tags.index')
            ->with('tags', Tag::all())
            ->with('posts', Post::orderBy('created_at','desc')->take(5)->get())
            ->with('settings', Setting::first())
            ->with('user', Auth::user());
    }

    public function create()
    {
        return view('admin.tags.create')
            ->with('posts', Post::orderBy('created_at','desc')->take(5)->get())
            ->with('settings', Setting::first())
            ->with('user',Auth::user());
    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'tag' => 'required|min:3ph'
        ]);

        Tag::create([

            'tag' => $request->tag

        ]);

        Session::flash('success', 'Tag created successfully.');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tag = Tag::find($id);

        return view('admin.tags.edit')->with('tag', $tag);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'tag' => 'required'
        ]);

        $tag = Tag::find($id);

        $tag->tag = $request->tag;

        $tag->save();

        Session::flash('success', 'Updated tag successfully.');

        return redirect()->back();

    }

    public function destroy($id)
    {
        Tag::destroy($id);
        Session::flash('success', 'Tag Deleted Successsfully.');
        return redirect()->back();
    }
}
