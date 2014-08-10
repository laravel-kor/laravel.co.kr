<?php

class UserController extends BaseController
{
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
            'posts'       => $posts
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
          'posts'       => $posts
        ]);
    }
}