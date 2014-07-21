@extends('layouts/default')

@section('content')
<div class="page-header">
  <h1>로그인</h1>
</div>

<div class="row">
  <div class="span5 offset2">
  <form class="form-horizontal" method="post">
    <input type="hidden" name="csrf_token" value="{{ Session::getToken() }}" />
  
    <div class="control-group {{ ($errors->has('username') ? 'error' : '') }}">
      <label class="control-label" for="inputusername">아이디</label>
      <div class="controls">
        <input type="text" id="inputusername" placeholder="아이디" name="username" value="{{ Input::old('username') }}">
        {{ $errors->first('username') }}
      </div>
    </div>
    
    <div class="control-group {{ ($errors->has('password') ? 'error' : '') }}">
      <label class="control-label" for="inputPassword">비밀번호</label>
      <div class="controls">
        <input type="password" id="inputPassword" placeholder="비밀번호" name="password">
        {{ $errors->first('password') }}
      </div>
    </div>
    
    <div class="control-group">
      <div class="controls">
        <button type="submit" class="btn">로그인</button>
      </div>
    </div>
    
  </form>
  </div>
</div>
@stop