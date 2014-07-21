@extends('layouts/default')

@section('scripts')
@parent
<script>
$(function(){

  $('.post-view .content pre code').each(function(i, e) {hljs.highlightBlock(e)});

})
</script>
@stop

@section('content')
<div class="page-header">
  @include('posts.includes.header')
</div>

<div class="row post-view">
  <div class="span3">
  @include('posts.includes.sidenav')
  </div>
  <div class="span9">
    <h2 class="title">{{ $post->title }}</h2>
      <ul class="nav nav-pills">
      @if (Auth::check() && (Auth::user()->id == $post->user_id))
        <li class="pull-right"><a href="{{ URL::to('posts/' . $post->id . '/delete') }}"><i class="icon-trash"></i> 삭제</a></li>
        <li class="pull-right"><a href="{{ URL::to('posts/' . $post->id . '/edit') }}"><i class="icon-edit"></i> 수정</a></li>
      @endif
        <li><a href="{{ URL::to('users/' . $post->user->id . '/' . $post->user->username) }}" title="글쓴이"><i class="icon-user"></i> {{ $post->user->nickname }}</a></li>
        <li class="disabled"><a href="#" title="조회"><i class="icon-eye-open"></i> {{ $post->views }}</a></li>
        <li class="disabled"><a href="#" title="등록"><i class="icon-time"></i> {{ Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->diffForHumans() }}</a></li>
      </ul>
    <div class="content">
      {{ $markdown->transformMarkdown($post->content) }}
    </div>
    <ul class="nav nav-pills">
      <li class="pull-right"><a href="{{ URL::to('posts/' . $post->category) }}"><i class="icon-list"></i> 목록</a></li>
      <li class="pull-right"><a href="{{ URL::to('posts/' . $post->category . '/new') }}"><i class="icon-pencil"></i> 글쓰기</a></li>
    </ul>

    <div id="disqus_thread"></div>
    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
        var disqus_shortname = '{{ Config::get('site.disqusShortname') }}';
        var disqus_identifier = '{{ $post->id }}';
        var disqus_title = "{{ $header . ' – ' . $post->title }}";

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>

  </div>
</div>
@stop