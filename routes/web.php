<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/home', 'HomeController@index')->name('dashboard');

//Route::get('chart', 'ChartController@index');


Route::post('/subscribe', [

   'uses' => 'FrontEndController@frontnews',
    'as' => 'front.newsletter'
]);



Route::get('/test', function() {
    return App\User::find(1)->profile;
});

Route::get('/', [

    'uses' => 'FrontEndController@index',
    'as' => 'welcome'
]);


Route::get('/post/{slug}', [

    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

Route::get('/category/{id}', [

    'uses' => 'FrontEndController@category',
    'as' => 'category.single'
]);

Route::get('/tag/{id}', [

    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single'
]);

Route::get('/results', function() {

    $posts = \App\Post::where('title','like', '%' . request('query') . '%')->get();

    return view('results')
        ->with('posts', $posts)
        ->with('title', 'Search results:' . request('query'))
        ->with('settings', \App\Setting::first())
        ->with('query', request('query'))
        ->with('categories', \App\Category::take(5)->get());
});




Auth::routes();




Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {

    Route::get('/dashboard', [
        'uses' => 'HomeController@index',

        'as' => 'dashboard'

    ]);

    Route::get('/post/create', [

        'uses' => 'PostsController@create',

        'as' => 'post.create'

    ]);

    Route::post('/post/store', [

        'uses' => 'PostsController@store',

        'as' => 'post.store'

    ]);

    Route::get('/post/delete/{id}', [

        'uses' => 'PostsController@destroy',

        'as' => 'post.delete'

    ]);

    Route::get('/posts/trashed', [

        'uses' => 'PostsController@trashed',

        'as' => 'posts.trashed'

    ]);

    Route::get('/posts/kill{id}', [

        'uses' => 'PostsController@kill',

        'as' => 'post.kill'

    ]);

    Route::get('/posts/restore{id}', [

        'uses' => 'PostsController@restore',

        'as' => 'post.restore'

    ]);

    Route::get('/posts/edit{id}', [

        'uses' => 'PostsController@edit',

        'as' => 'post.edit'

    ]);

    Route::post('/posts/update{id}', [

        'uses' => 'PostsController@update',

        'as' => 'post.update'

    ]);

    Route::get('/category/create', [

        'uses' => 'CategoriesController@create',

        'as' => 'category.create'

    ]);

    Route::get('/categories', [

        'uses' => 'CategoriesController@index',

        'as' => 'categories'

    ]);

    Route::post('/category/store', [

        'uses' => 'CategoriesController@store',

        'as' => 'category.store'

    ]);

    Route::get('/category/edit/{id}', [

        'uses' => 'CategoriesController@edit',

        'as' => 'category.edit'

    ]);

    Route::get('/category/delete/{id}', [

        'uses' => 'CategoriesController@destroy',

        'as' => 'category.delete'

    ]);

    Route::post('/category/update/{id}', [

        'uses' => 'CategoriesController@update',

        'as' => 'category.update'

    ]);

    Route::get('/posts', [

        'uses' => 'PostsController@index',

        'as' => 'posts'

    ]);


    Route::get('/tags', [

        'uses' => 'TagsController@index',

        'as' => 'tags'
    ]);

    Route::get('/tags/create', [

        'uses' => 'TagsController@create',

        'as' => 'tag.create'
    ]);

    Route::post('/tags/store', [

        'uses' => 'TagsController@store',

        'as' => 'tag.store'
    ]);

    Route::get('/tags/edit{id}', [

        'uses' => 'TagsController@edit',

        'as' => 'tag.edit'
    ]);

    Route::post('/tags/update{id}', [

        'uses' => 'TagsController@update',

        'as' => 'tag.update'

    ]);

    Route::get('/tags/delete{id}', [

        'uses' => 'TagsController@destroy',

        'as' => 'tag.delete'

    ]);

    Route::get('/users', [

        'uses'=> 'UsersController@index',
        'as'=> 'users'

    ])->middleware('admin');

    Route::get('/users/create', [

        'uses'=>'UsersController@create',
        'as' => 'user.create'
    ])->middleware('admin');

    Route::post('/users/store', [

        'uses' => 'UsersController@store',
        'as' => 'user.store'
    ])->middleware('admin');

    Route::get('/user/admin{id}',[

        'uses' => 'UsersController@admin',
        'as' => 'user.admin'
    ])->middleware('admin');

    Route::get('/user/not_admin{id}',[

        'uses' => 'UsersController@not_admin',
        'as' => 'user.not.admin'
    ])->middleware('admin');

    Route::get('/user/profile', [

        'uses' => 'ProfilesController@index',
        'as' => 'user.profile'
    ]);

    Route::post('/user/profile/update', [

        'uses' => 'ProfilesController@update',
        'as' => 'user.profile.update'
    ]);

    Route::get('/user/delete/{id}', [

        'uses' => 'UsersController@destroy',
        'as'  => 'user.delete'
    ])->middleware('admin');

    Route::get('/settings', [

        'uses'=>'SettingsController@index',
        'as'=>'settings'

    ]);

    Route::post('/settings/update', [

        'uses' =>'SettingsController@update',

        'as' => 'settings.update'

    ]);
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
