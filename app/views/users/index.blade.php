@extends('layouts/default')

@section('content')
<div class="page-header">
  <h1>사용자</h1>
</div>

<ul class="thumbnails user-index">
  @foreach ($users as $user)
  <li class="span3">
    <div class="thumbnail">
      <img class="user-img img-polaroid" src="http://www.gravatar.com/avatar/{{ md5( strtolower( trim($user->email) ) ) }}?d=mm&s=60" />
      <ul class="user-info unstyled">
        <li><h4><a class="username" href="{{ URL::to('users/' . $user->id . '/' . $user->username) }}">{{ $user->username }}</a></h4></li>
        <li>{{ $user->nickname }}</li>
      </ul>
    </div>
  </li>
  @endforeach
</ul>
{{ $users->links() }}
@stop