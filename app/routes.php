<?php

require_once 'bindings.php';

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::pattern('category', '[a-zA-Z]+');
Route::pattern('postId', '\d+');

Route::get('/', function() {
    return View::make('home')->with([
        'posts'      => Post::orderBy('id', 'desc')->take(15)->get()
    ]);
});

Route::get('docs/{page?}', function($page = 'introduction') {
    $cacheKey = "{$page}.md-cache";

    if (!Cache::get($cacheKey)) {
        if (!$file = File::get(base_path() . "/../../shared/docs/{$page}.md")) {
            App::abort(404, "Unable to find {$page}.md");
        }

        $markdown = App::make('Ciconia\Ciconia');
        Cache::put($cacheKey, $markdown->render($file), Carbon::now()->addMinutes(10));
    }

    return View::make('docs.index')->with([
        'content' => Cache::get($cacheKey),
        'page'    => $page
    ]);
});

Route::get('search', function(){
    $query = Input::get('query');

    if($query) {
        return Redirect::to('/search/' . Input::get('query'));
    }

    return View::make('search')->with([
        'posts' => false,
        'query' => false
    ]);
});

Route::get('search/{query?}', function($query) {
    $query = trim($query);

    if($query) {
        $posts = Post::with('user')
            ->where('title', 'like', '%' . $query . '%')
            ->orWhere('content', 'like', '%' . $query . '%')
            ->orderBy('id', 'desc')
            ->paginate(15);
    } else {
        $posts = false;
    }

    return View::make('search')->with([
        'posts'      => $posts,
        'query'      => $query
    ]);
});

Route::get('changelog', function(){
    $path = __DIR__ . '/../changelog.md';
    $markdown = App::make('Ciconia\Ciconia');

    return View::make('changelog')->with([
        'content' => ($markdown->render(File::get($path)))
    ]);
});


// Account
Route::get('login', ['before'=>'guest-only', 'uses'=>'AccountController@getLogin']);
Route::post('login', 'AccountController@postLogin');
Route::get('register', ['before'=>'guest-only', 'uses'=>'AccountController@getRegister']);
Route::post('register', 'AccountController@postRegister');
Route::get('logout', 'AccountController@getLogout');
Route::get('account/edit', ['uses'=>'AccountController@getEdit']);
Route::post('account/edit', ['uses'=>'AccountController@postEdit']);
Route::get('account/delete', ['uses'=>'AccountController@getDelete']);
Route::post('account/delete', ['uses'=>'AccountController@postDelete']);

// Users
Route::get('users/{userId}/posts', 'UserController@getPostsById');
Route::get('users/{userId}/{username}/posts', 'UserController@getPostsById');
Route::get('users/{userId}/{username?}', 'UserController@getById');
Route::get('users', ['uses'=>'UserController@getIndex']);

// Posts
Route::get('posts/{category}', 'PostController@getByCategory');
Route::get('posts/{category}/new', ['before'=>'auth', 'uses'=>'PostController@getCreate']);
Route::get('posts/{postId}', 'PostController@getById');
Route::get('posts/{postId}/edit', ['before'=>'auth', 'uses'=>'PostController@getEdit']);
Route::get('posts', ['uses'=>'PostController@getByCategory']);
Route::post('posts/{category}/new', ['before'=>'csrf', 'uses'=>'PostController@postCreate']);
Route::post('posts/{postId}/edit', ['before'=>'csrf', 'uses'=>'PostController@postEdit']);
Route::get('posts/{postId}/delete', ['before'=>'auth', 'uses'=>'PostController@getDelete']);

// Static Pages
Route::get('chat', ['uses'=>'PageController@getChat', 'as'=>'chat']);
