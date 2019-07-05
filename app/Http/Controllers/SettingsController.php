<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Setting;
use Session;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    public function _construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('admin.settings.settings')
            ->with('posts',Post::all())
            ->with('user',Auth::user())
            ->with('settings', Setting::first());
    }
    public function update()
    {
        $this->validate(request(), [

            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required|email',
            'address' => 'required'
        ]);

        $settings = Setting::first();

        $settings->site_name = request()-> site_name;
        $settings->contact_number = request()-> contact_number;
        $settings->contact_email = request()-> contact_email;
        $settings->address = request()-> address;

        $settings->save();
        Session::flash('success','Settings updated.');
        return redirect()->back();
    }
}
