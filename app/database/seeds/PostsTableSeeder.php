<?php

class PostsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
    $post1 = new Post();
    $post1->category = 'free';
    $post1->title = '코드 하이라이트 테스트';
    $post1->content = '
    require_once \'Zend/Uri/Http.php\';
    
    abstract class URI extends BaseURI
    {
    
      /**
       * Returns a URI
       *
       * @return  URI
       */
      static public function _factory(\$stats = array(), \$uri = \'http\')
      {
          \$uri = explode(\':\', \$uri, 0b10);
          \$schemeSpecific = isset(\$uri[1]) ? \$uri[1] : \'\';
          \$desc = \'Multi
    line description\';
    
          // Security check
          if (!ctype_alnum(\$scheme)) {
              throw new Zend_Uri_Exception(\'Illegal scheme\');
          }
    
          return [
            \'uri\' => \$uri,
            \'value\' => null,
          ];
      }
    }';
    
    $post2 = new Post();
    $post2->category = 'free';
    $post2->title = '마크다운 테스트';
    $post2->content = '
# hello, This is Markdown Live Preview

----
## what is Markdown?
see [Wikipedia](http://en.wikipedia.org/wiki/Markdown)

> Markdown is a lightweight markup language, originally created by John Gruber and Aaron Swartz allowing people "to write using an easy-to-read, easy-to-write plain text format, then convert it to structurally valid XHTML (or HTML)".

----
## usage
1. write markdown text in above textarea
2. render automatically to the output area

----
## thanks
* [markdown-js](https://github.com/evilstreak/markdown-js)';
    
    User::find(1)->posts()->save($post1);
    User::find(1)->posts()->save($post2);
	}

}