@section('content')

<section class="page contain">


	<div class="page-header group">
		<ul>

<li id="ca-nstab-main" class="selected"><a href="/FAQ_(Laravel_4)" primary="1" context="subject" title="View the content page [c]" accesskey="c">Page</a></li><li id="ca-talk" class="new"><a href="/index.php?title=Talk:FAQ_(Laravel_4)&amp;action=edit&amp;redlink=1" primary="1" context="talk" title="Discussion about the content page [t]" accesskey="t">Discussion</a></li><li id="ca-viewsource"><a href="/index.php?title=FAQ_(Laravel_4)&amp;action=edit" primary="1" title="This page is protected.
You can view its source [e]" accesskey="e">View source</a></li><li id="ca-history"><a href="/index.php?title=FAQ_(Laravel_4)&amp;action=history" rel="archives" title="Past revisions of this page [h]" accesskey="h">History</a></li>		</ul>
	</div>

	<div class="page-left" style="position: static;"><table id="toc" class="toc"><tbody><tr><td><div id="toctitle"><h2>Contents</h2><span class="toctoggle">&nbsp;[<a href="#" class="internal" id="togglelink">hide</a>]&nbsp;</span></div>
<ul>
<li class="toclevel-1 tocsection-1"><a href="#Where_can_I_get_Laravel.3F"><span class="tocnumber">1</span> <span class="toctext">Where can I get Laravel?</span></a></li>
<li class="toclevel-1 tocsection-2"><a href="#Laravel_4_Documentation"><span class="tocnumber">2</span> <span class="toctext">Laravel 4 Documentation</span></a></li>
<li class="toclevel-1 tocsection-3"><a href="#Autoloading_Folders"><span class="tocnumber">3</span> <span class="toctext">Autoloading Folders</span></a></li>
<li class="toclevel-1 tocsection-4"><a href="#MassAssignmentException"><span class="tocnumber">4</span> <span class="toctext">MassAssignmentException</span></a></li>
</ul>
</td></tr></tbody></table></div><div class="page-main">
		<h1 class="page-title">FAQ (Laravel 4)</h1>
		<div class="page-subtitle"></div>

    	<div id="mw-content-text" lang="en-GB" dir="ltr" class="mw-content-ltr"><p>Frequently Asked Questions about Laravel 4
</p>

<h3> <span class="mw-headline" id="Where_can_I_get_Laravel.3F"> Where can I get Laravel? </span></h3>
<p>You can find Laravel at <a rel="nofollow" class="external text" href="http://www.laravel.com">Laravel.com</a> or on <a rel="nofollow" class="external text" href="http://www.github.com/laravel/laravel">Github</a>.
</p>
<h3> <span class="mw-headline" id="Laravel_4_Documentation"> Laravel 4 Documentation </span></h3>
<p><a rel="nofollow" class="external free" href="http://laravel.com/docs">http://laravel.com/docs</a>
</p>
<h3> <span class="mw-headline" id="Autoloading_Folders"> Autoloading Folders </span></h3>
<p>The recommended way to autoload additional folders is by using Composer's autoloading feature. Composer comes with two ways to autoload classes - classmap and PSR-0. Classmap scans all files in one or more directories and creates an associative array of file =&gt; class, while PSR-0 assumes that your namespaces match your directories and your class names match the file names. Read more about composer autoloading <a rel="nofollow" class="external text" href="http://getcomposer.org/doc/01-basic-usage.md#autoloading">here</a>.
</p><p><br>
Here's an example of a modified composer.json which adds app/mylib as a classmap autoloaded directory, and autoloads all classes in the app/src/App directory using PSR-0 autoloading.
</p><p><br>
</p>
<pre>"autoload": {
  "classmap": [
    "app/commands",
    "app/controllers",
    "app/database/migrations",
    "app/database/seeds",
    "app/tests/TestCase.php",
    "app/mylib"
  ],
  "psr-0": {
    "App": "app/src"
  }
}
</pre>
<p>If all your classes are in the global namespace, you can add them to Laravel's classloader. Keep in mind this is somewhat resource intensive and should not be used in production.
</p>
<div dir="ltr" class="mw-geshi mw-code mw-content-ltr"><div class="php source-php"><pre class="de1">// app/start/global.php
<span class="kw2">&lt;?php</span>
ClassLoader<span class="sy0">::</span><span class="me2">addDirectories</span><span class="br0">(</span><span class="kw3">array</span><span class="br0">(</span>
    app_path<span class="br0">(</span><span class="br0">)</span><span class="sy0">.</span><span class="st_h">'/commands'</span><span class="sy0">,</span>
    app_path<span class="br0">(</span><span class="br0">)</span><span class="sy0">.</span><span class="st_h">'/controllers'</span><span class="sy0">,</span>
    app_path<span class="br0">(</span><span class="br0">)</span><span class="sy0">.</span><span class="st_h">'/models'</span><span class="sy0">,</span>
    app_path<span class="br0">(</span><span class="br0">)</span><span class="sy0">.</span><span class="st_h">'/database/seeds'</span><span class="sy0">,</span>
&nbsp;
    <span class="co1">// Add your own folders here</span>
    app_path<span class="br0">(</span><span class="br0">)</span><span class="sy0">.</span><span class="st_h">'/traits'</span><span class="sy0">,</span>
<span class="br0">)</span><span class="br0">)</span><span class="sy0">;</span></pre></div></div>
<h3> <span class="mw-headline" id="MassAssignmentException"> MassAssignmentException </span></h3>
<p>Laravel 4 now provides protection on your models by default when using mass assignment. You need to either white list (recommended) or black list your columns. By default, all fields are blacklisted which prevents filling model properties via an array.
</p><p>For example, for a basic user model with username, email and password you would white list like so...
</p>
<div dir="ltr" class="mw-geshi mw-code mw-content-ltr"><div class="php source-php"><pre class="de1"><span class="kw2">&lt;?php</span>
&nbsp;
<span class="co1">// This code will cause a MassAssignmentException</span>
User<span class="sy0">::</span><span class="me2">create</span><span class="br0">(</span><span class="kw3">array</span><span class="br0">(</span><span class="st_h">'username'</span> <span class="sy0">=&gt;</span> <span class="st_h">'Example'</span><span class="sy0">,</span> <span class="st_h">'email'</span> <span class="sy0">=&gt;</span> <span class="st_h">'example@example.com'</span><span class="sy0">,</span> <span class="st_h">'password'</span> <span class="sy0">=&gt;</span> <span class="st_h">'mypassword'</span><span class="br0">)</span><span class="br0">)</span><span class="sy0">;</span>
&nbsp;
<span class="co1">// We fix our user model to allow those parameters to be passed into create via mass assignment</span>
<span class="kw2">class</span> User <span class="kw2">extends</span> Eloquent <span class="br0">{</span>
&nbsp;
    <span class="co1">// Use fillable as a white list</span>
    <span class="kw2">protected</span> <span class="re0">$fillable</span> <span class="sy0">=</span> <span class="kw3">array</span><span class="br0">(</span><span class="st_h">'username'</span><span class="sy0">,</span> <span class="st_h">'email'</span><span class="sy0">,</span> <span class="st_h">'password'</span><span class="br0">)</span><span class="sy0">;</span>
&nbsp;
&nbsp;
    <span class="co1">// OR set guarded to an empty array to allow mass assignment of every field</span>
    <span class="kw2">protected</span> <span class="re0">$guarded</span> <span class="sy0">=</span> <span class="kw3">array</span><span class="br0">(</span><span class="br0">)</span><span class="sy0">;</span>
&nbsp;
    <span class="sy0">...</span>
<span class="br0">}</span></pre></div></div>
<p>Mass assignment applies to the following methods: create, update and fill - as well as when instanciating a new model via new MyModel($attributes). You can still assign non-fillable/guarded variables via $model-&gt;attribute = 'foo';
</p>
<!--
NewPP limit report
Preprocessor visited node count: 27/1000000
Preprocessor generated node count: 60/1000000
Post-expand include size: 0/2097152 bytes
Template argument size: 0/2097152 bytes
Highest expansion depth: 2/40
Expensive parser function count: 0/100
-->

<!-- Saved in parser cache with key laravel_wiki:pcache:idhash:56-0!*!*!!en-gb!*!* and timestamp 20140723085423 -->
</div><div class="printfooter">
Retrieved from ‘<a href="http://wiki.laravel.io/index.php?title=FAQ_(Laravel_4)&amp;oldid=664">http://wiki.laravel.io/index.php?title=FAQ_(Laravel_4)&amp;oldid=664</a>’</div>

    	<div class="group"><div id="catlinks" class="catlinks"><div id="mw-normal-catlinks" class="mw-normal-catlinks"><a href="/Special:Categories" title="Special:Categories">Categories</a>: <ul><li><a href="/Category:Troubleshooting" title="Category:Troubleshooting">Troubleshooting</a></li><li><a href="/Category:Laravel_4" title="Category:Laravel 4">Laravel 4</a></li></ul></div></div></div>

    	    </div>

</section>
@stop