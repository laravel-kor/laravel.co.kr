@extends('layouts/default')

@section('scripts')
@parent
<script src="{{ asset('js/Markdown.Converter.js') }}"></script>
<script src="{{ asset('js/Markdown.Sanitizer.js') }}"></script>
<script src="{{ asset('js/jquery.autosize.min.js') }}"></script>
<script>
$(function(){

  var converter = new Markdown.Converter();
  
  $('#inputContent').on('keyup', function(){
    var text = $(this).val();
    $('#postPreview').html(converter.makeHtml(text)).find('pre code').each(function(i, e) {hljs.highlightBlock(e)});
  }).trigger('keyup');
  
  $('textarea').autosize();
  
})
</script>
@stop

@section('content')
<div class="page-header">
  @include('posts.includes.header')
</div>

<div class="row post-edit">
  <div class="span3">
  @include('posts.includes.sidenav')
  </div>
  <div class="span9">
    <form method="post">
      <input type="hidden" name="csrf_token" value="{{ Session::getToken() }}" />
      
      <div class="control-group {{ ($errors->has('title') ? 'error' : '') }}">
        <label class="control-label" for="inputTitle">제목</label>
        <div class="controls">
          <input type="text" id="inputTitle" name="title" placeholder="제목" class="input-block-level" value="{{ Input::old('title', $post->title) }}">
          {{ $errors->first('title') }}
        </div>
      </div>
      
      <div class="control-group {{ ($errors->has('category') ? 'error' : '') }}">
        <label class="control-label" for="inputCategory">분류</label>
          <div class="controls">
            @include('posts.includes.categories')
          </div>
          {{ $errors->first('category') }}
      </div>
      
      <div class="control-group {{ ($errors->has('content') ? 'error' : '') }}">
        <label class="control-label" for="inputContent">내용</label>
        <div class="controls">
          <textarea rows="20" id="inputContent" name="content" class="input-block-level">{{ Input::old('content', $post->content) }}</textarea>
          {{ $errors->first('content') }}
        </div>
      </div>
      
      <div class="control-group">
        <label class="control-label">미리보기</label>
        <div class="controls preview" id="postPreview">
        {{ $markdown->transformMarkdown($post->content) }}
        </div>
      </div>
    
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn">수정</button>
        </div>
      </div>

    </form>
    
    <ul class="nav nav-pills">
      <li class="pull-right"><a href="{{ URL::to('posts/' . $post->category) }}"><i class="icon-list"></i> 목록</a></li>
    </ul>
  </div>
</div>
@stop