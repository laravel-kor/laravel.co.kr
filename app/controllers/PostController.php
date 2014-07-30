<?php

class PostController extends BaseController
{
    protected function getValidator()
    {
        $rules = [
            'title'     => 'required',
            'content'   => 'required',
            'category'  => 'required'
        ];

        $validator = Validator::make(Input::all(), $rules);
        return $validator;
    }

    /**
    * Create a post
    */
    public function postCreate($category)
    {
        $validator = $this->getValidator();
        if (!$validator->passes()) {
            return Redirect::to('posts/' . $category . '/' . 'new')
                    ->withInput(Input::all())
                    ->withErrors($validator)
                    ->with('category', $category);
        }

        $post           = new Post;
        $post->title    = Input::get('title');
        $post->content  = Input::get('content');
        $post->category = Input::get('category');

        Auth::user()->posts()->save($post);

        return Redirect::to('posts/' . $post->id)->with('success', '글이 등록 되었습니다.');
    }

    /**
    * Edit a post
    */
    public function postEdit($postId)
    {
        $validator = $this->getValidator();
        if (!$validator->passes()) {
            return Redirect::to('posts/' . $postId . '/edit')
                ->withInput(Input::all())
                ->withErrors($validator);
        }

        $post           = Post::find($postId);
        $post->title    = Input::get('title');
        $post->content  = Input::get('content');
        $post->category = Input::get('category');
        $post->save();

        return Redirect::to('posts/' . $post->id)->with('success', '글이 수정 되었습니다.');
    }

    /**
     * Delete a post
     */
    public function getDelete($postId)
    {
        $post = Post::find($postId);

        if(Auth::check() && $post->user_id == Auth::user()->id) {
            $category = $post->category;
            $post->delete();

            return Redirect::to('posts/' . $category)->with('success', '글이 삭제 되었습니다.');
        }

        return Redirect::to('posts/' . $postId);
    }

  /**
    * Create a post
    */
    public function getCreate($category)
    {
        return View::make('posts.create')->with([
          'category' => $category,
          'markdown' => App::make('Ciconia\Ciconia')
        ]);
    }

    /**
    * Display posts by category
    */
    public function getByCategory($category = 'all')
    {
        if($category == 'all') {
            $posts = Post::with('user')->orderBy('id', 'desc')->paginate(15);
        } else {
            $posts = Post::with('user')->where('category', $category)->orderBy('id', 'desc')->paginate(15);
        }

        return View::make('posts.index')->with([
            'posts'    => $posts,
            'category' => $category
        ]);
    }

    /**
    * Display a post
    */
    public function getById($postId)
    {
        $post = Post::find($postId);
        $post->views++;
        $post->save();

        return View::make('posts.view')->with([
            'post' => $post,
            'content' => App::make('Ciconia\Ciconia')->render($post->content),
            'category'=>$post->category
        ]);
    }

    /**
    * Edit a post
    */
    public function getEdit($postId)
    {
        $post = Post::find($postId);

        if(Auth::check() && $post->user_id == Auth::user()->id) {
          return View::make('posts.edit')->with([
            'post'     => $post,
            'markdown' => App::make('Ciconia\Ciconia'),
            'category' => $post->category
          ]);
        }

        return Redirect::to('posts/' . $postId);
    }
}