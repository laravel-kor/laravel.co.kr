<?php

use Ciconia\Ciconia;
use Ciconia\Extension\Gfm;

class PostController extends BaseController {


  /**
   * Instantiate a new PostController instance
	 */
  public function __construct()
  {

    $this->beforeFilter('csrf', array('on' => 'post'));
    $this->beforeFilter('auth', array('only' =>
      array(
        'getCreate',
        'getEdit',
        'getDelete'
      )
    ));

    $this->categories = Config::get('site.postCategories');

  }


  /**
   * Show all posts
   */
  public function getIndex()
  {
    return Redirect::to('posts/all');
  }


  /**
   * Create a post
   */
  public function getCreate($category)
  {
    $markdown = new MarkdownParser();

    return View::make('posts.create')->with(array(
      'header' => $this->categories[$category],
      'category' => $category,
      'markdown' => $markdown
    ));
#return 'asdf';
  }


  /**
   * Create a post
   */
  public function postCreate($category)
  {
     $rules = array(
      'title'     => 'required',
      'content'   => 'required',
      'category'  => 'required'
    );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->passes())
    {
      	$post = new Post;
        $post->title   = Input::get('title');
  			$post->content      = Input::get('content');
  			$post->category   = Input::get('category');

        Auth::user()->posts()->save($post);

  			return Redirect::to('posts/' . $post->id)->with('success', '글이 등록 되었습니다.');
    }

    return Redirect::to('posts/' . $category . '/' . 'new')->withInput(Input::all())->withErrors($validator)->with('category', $category);
  }


  /**
   * Display posts by category
   */
  public function getByCategory($category)
  {
    if($category == 'all')
    {
      $posts = Post::with('user')->orderBy('id', 'desc')->paginate(15);
    }
    else
    {
      $posts = Post::with('user')->where('category', $category)->orderBy('id', 'desc')->paginate(15);
    }

    return View::make('posts.index')->with(array(
      'posts' => $posts,
      'header' => $this->categories[$category],
      'category' => $category
    ));
  }


  /**
   * Display a post
   */
  public function getById($postId)
  {
    $post = Post::find($postId);
    $post->views++;
    $post->save();

    $markdown = new Ciconia();
    $markdown->addExtension(new Gfm\FencedCodeBlockExtension());
    $markdown->addExtension(new Gfm\TaskListExtension());
    $markdown->addExtension(new Gfm\InlineStyleExtension());
    $markdown->addExtension(new Gfm\WhiteSpaceExtension());
    $markdown->addExtension(new Gfm\TableExtension());
    $markdown->addExtension(new Gfm\UrlAutoLinkExtension());

    return View::make('posts.view')->with(array(
      'post' => $post,
      'header' => $this->categories[$post->category],
      'content' => $markdown->render($post->content)
    ));
  }


  /**
   * Edit a post
   */
  public function getEdit($postId)
  {
    $post = Post::find($postId);

    if(Auth::check() && $post->user_id == Auth::user()->id)
    {
      $markdown = new MarkdownParser();

      return View::make('posts.edit')->with(array(
        'post' => $post,
        'header' => $this->categories[$post->category],
        'markdown' => $markdown,
        'category' => $post->category
      ));
    }

    return Redirect::to('posts/' . $postId);
  }


  /**
   * Edit a post
   */
  public function PostEdit($postId)
  {
    $rules = array(
      'title'  => 'required',
      'content'  => 'required',
      'category'     => 'required'
    );

    $validator = Validator::make(Input::all(), $rules);

    if ($validator->passes())
    {
      $post = Post::find($postId);
      $post->title   = Input::get('title');
      $post->content      = Input::get('content');
  		$post->category   = Input::get('category');
  		$post->save();

  		return Redirect::to('posts/' . $post->id)->with('success', '글이 수정 되었습니다.');
    }

    return Redirect::to('posts/' . $postId . '/edit')->withInput(Input::all())->withErrors($validator);
  }


  /**
   * Delete a post
   */
  public function getDelete($postId)
  {
    $post = Post::find($postId);

    if(Auth::check() && $post->user_id == Auth::user()->id)
    {
      $category = $post->category;
      $post->delete();

      return Redirect::to('posts/' . $category)->with('success', '글이 삭제 되었습니다.');
    }

    return Redirect::to('posts/' . $postId);
  }
}