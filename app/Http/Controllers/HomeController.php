<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.dashboard')
            ->with('posts', Post::orderBy('created_at','desc')->take(5)->get())
            ->with('user',Auth::user())
            ->with('settings', Setting::first())
            ->with('posts_count', Post::all()->count())
            ->with('users_count', User::all()->count())
            ->with('categories_count', Category::all()->count())
            ->with('trashes_count', Post::onlyTrashed()->count())
            ->with('tags_count', Tag::all()->count());
    }

//    public function getPie()
//    {
//        $lava = new Lavacharts;
//
//        $reasons = $lava->DataTable();
//
//        $reasons->addStringColumn('Reasons')
//            ->addNumberColumn('Percent')
//            ->addRow(array('Check Reviews', 5))
//            ->addRow(array('Watch Trailers', 2))
//            ->addRow(array('See Actors Other Work', 4))
//            ->addRow(array('Settle Argument', 89));
//
//
//        $donutchart = $lava->DonutChart('IMDB', $reasons, [
//            'title' => 'Reasons I visit IMDB'
//        ]);
//
//
//        return view('welcome', [
//            'lava'      => $lava
//        ]);
//    }
}
