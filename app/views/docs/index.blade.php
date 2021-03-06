@extends('layouts.docs')

@section('scripts')
@parent
<script>

$(function(){

  $('table').addClass('table table-bordered table-hover table-condensed');
  $('.section pre code').each(function(i, e) {hljs.highlightBlock(e)});

})
</script>
@stop

@section('content')
{{ $content }}
<p class="well">
문법오류나 오역, 오타를 <a href="https://github.com/thisiskaden/laravel4-docs-korean/issues">이슈</a>에 남겨주시거나 해당 페이지에 코멘트를 달아주시면 확인 후 업데이트 하겠습니다.
</p>
<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = '{{ Config::get('site.disqusShortname') }}'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>
@stop