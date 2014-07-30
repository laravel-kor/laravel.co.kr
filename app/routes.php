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

View::share('categories', Config::get('site.postCategories'));

Route::get('/', function() {
    return View::make('home')->with([
        'posts'      => Post::orderBy('id', 'desc')->take(15)->get(),
        'categories' => Config::get('site.postCategories')
    ]);
});

Route::get('docs', function() {
    return Redirect::to('docs/introduction');
});

Route::get('docs/{page}', function($page) {

    $path = base_path() . "/../../shared/docs/{$page}.md";

    if(File::exists($path)) {
        $file = File::get($path);
    }else{
        return 'clone the repository first!';
    }

    $markdown = App::make('Ciconia\Ciconia');


    return View::make('docs.index')->with([
        'content' => ($markdown->render($file)),
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
        'categories' => Config::get('site.postCategories'),
        'query'      => $query
    ]);

});

Route::get('changelog', function(){
    $path = __DIR__ . '/../changelog.md';
    $markdown = new MarkdownParser();

    return View::make('changelog')->with([
        'content' => ($markdown->transformMarkdown(File::get($path)))
    ]);
});


// Account
Route::get('login', 'AccountController@getLogin');
Route::post('login', 'AccountController@postLogin');
Route::get('register', 'AccountController@getRegister');
Route::post('register', 'AccountController@postRegister');
Route::get('logout', 'AccountController@getLogout');
Route::get('account/edit', ['uses'=>'AccountController@getEdit']);
Route::post('account/edit', ['uses'=>'AccountController@postEdit']);

// Users
Route::get('users/{userId}/posts', 'UserController@getPostsById');
Route::get('users/{userId}/{username}/posts', 'UserController@getPostsById');
Route::get('users/{userId}/{username?}', 'UserController@getById');
Route::get('users', ['uses'=>'UserController@getIndex']);

// Posts
Route::get('posts/{category}', 'PostController@getByCategory')->where('category', '[a-zA-Z]+');
Route::get('posts/{category}/new', ['uses'=>'PostController@getCreate', 'before'=>'auth'])->where('category', '[a-zA-Z]+');
Route::get('posts/{postId}', 'PostController@getById')->where('category', '[0-9]+');
Route::get('posts/{postId}/edit', ['uses'=>'PostController@getEdit', 'before'=>'auth']);
Route::get('posts', ['uses'=>'PostController@getByCategory']);
Route::post('posts/{category}/new', ['uses'=>'PostController@postCreate', 'before'=>'csrf'])->where('category', '[a-zA-Z]+');
Route::post('posts/{postId}/edit', ['uses'=>'PostController@postEdit', 'before'=>'csrf']);
Route::get('posts/{postId}/delete', ['uses'=>'PostController@getDelete', 'before'=>'auth']);

// Static Pages
Route::get('chat', ['uses'=>'PageController@getChat', 'as'=>'chat']);


// Tags
//Route::controller('tags', 'TagController');
