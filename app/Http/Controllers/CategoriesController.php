<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

use Session;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Auth;

use App\Post;

class CategoriesController extends Controller
{

    public function index()
    {
        return view('admin.categories.index')
            ->with('categories', Category::all())
            ->with('posts', Post::orderBy('created_at','desc')->take(5)->get())
            ->with('settings', Setting::first())
            ->with('user', Auth::user());
    }

    public function create()
    {
        return view('admin.categories.create')
            ->with('posts', Post::orderBy('created_at','desc')->take(5)->get())
            ->with('settings', Setting::first())
            ->with('user', Auth::user());

    }

    public function store(Request $request)
    {
        $this->validate($request, [

            'name' => 'required|min:4'

        ]);

        $category = new Category;

        $category->name = $request->name;
        $category->save();

        Session::flash('success', 'You successfully created a category!');

        return redirect()->route('categories');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit')->with('category',$category);
    }

    public function update(Request $request, $id)
    {

        $category = Category::find($id);

        $category->name = $request->name;

        $category->save();

        Session::flash('success', 'You successfully updated the category!');

        return redirect()->route('categories');

    }

    public function destroy($id)
    {
        $category = Category::find($id);

        foreach($category->posts as $post)
        {
            $post -> delete();
        }
        $category -> delete();

        Session::flash('success', 'You successfully deleted a category!');

        return redirect()->route('categories');
    }
}
