<?php

class UserController extends BaseController
{
    protected $categories;
    /**
    * Instantiate a new UserController instance
    */
    public function __construct()
    {
        $this->beforeFilter('csrf', ['on' => 'post']);
        $this->categories = Config::get('site.postCategories');
    }

    /**
    * Show all users
    */
    public function getIndex()
    {
        $users = User::orderBy('id', 'desc')->paginate(16);
        return View::make('users.index')->with('header', '사용자')->with('users', $users);
    }

    /**
    * Show user page
    */
    public function getById($userId)
    {
        $user = User::find($userId);
        $posts = $user->posts()->take(10)->orderBy('id', 'desc')->get();

        return View::make('users.view')->with([
            'user'        => $user,
            'posts'       => $posts,
            'categories'  => $this->categories
        ]);
    }

    /**
    * Show user's posts
    */
    public function getPostsById($userId)
    {
        $user = User::find($userId);
        $posts = $user->posts()->orderBy('id', 'desc')->paginate(15);

        return View::make('users.posts')->with([
          'user'        => $user,
          'posts'       => $posts,
          'categories'  => $this->categories
        ]);
    }
}