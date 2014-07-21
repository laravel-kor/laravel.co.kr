@extends('layouts/default')

@section('content')
<div class="page-header">
  <h1>사용자</h1>
</div>

<div class="row">
  @if (!Auth::guest() && Auth::user()->id == $user->id)
  <ul class="nav nav-pills pull-right">
    <li><a href="{{ URL::to('account/edit') }}"><i class="icon-pencil"></i> 수정</a></li>
    <li><a href="{{ URL::to('account/delete') }}"><i class="icon-trash"></i> 탈퇴</a></li>
  </ul>
  @else
  <ul class="nav nav-pills pull-right">
    <li class="disabled"><a href="#"><i class="icon-pencil"></i> 수정</a></li>
    <li class="disabled"><a href="#"><i class="icon-trash"></i> 탈퇴</a></li>
  </ul>
  @endif
</div>

<div class="row user-view">
  <div class="span6">
    <img class="user-img img-polaroid" src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim( ' . $user->email . ' ) ) ) }}?d=mm&s=120" />
    <dl class="user-info">
      <dt>아이디</dt>
      <dd>{{ $user->username }}</dd>
      <dt>별명</dt>
      <dd>{{ $user->nickname }}</dd>
      <dt>roles</dt>
      <dd>
        @foreach ($user->roles as $role)
        [{{ $role->name }}]
        @endforeach
      </dd>
    </dl>
    <div class="clearfix"></div>
  </div>
  <div class="span6">
      <p class="well well-small">{{ $user->about }}</p>
  </div>
</div>

<h3>최신 글</h3>
<ul>
  @foreach ($posts as $post)
  <li><span class="label label-cat-{{ $post->category }}">{{ $categories[$post->category] }}</span> <a href="{{ URL::to('posts/' . $post->id ) }}">{{ $post->title }}</a></li>
  @endforeach
</ul>
{{ $posts->links() }}
@stop