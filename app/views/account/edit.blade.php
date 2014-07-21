@extends('layouts.default')

@section('content')
<div class="page-header">
  <h1>수정</h1>
</div>
<div class="row">
  <div class="span6 offset3">
    <form class="form-horizontal" method="post">
    <input type="hidden" name="csrf_token" value="{{ Session::getToken() }}" />
    
      <div class="control-group">
        <label class="control-label" for="inputUsername">아이디</label>
        <div class="controls">
          <input type="text" name="email" id="inputUsername" placeholder="{{ $user->username }}" disabled>
        </div>
      </div>
    
      <div class="control-group">
        <label class="control-label" for="inputNickname">별명</label>
        <div class="controls">
          <input type="text" name="nickname" id="inputNickname" placeholder="별명" value="{{ Input::old('nickname', $user->nickname) }}">
        </div>
      </div>
      
      <div class="control-group {{ ($errors->has('email') ? 'error' : '') }}">
        <label class="control-label" for="inputEmail">이메일</label>
        <div class="controls">
          <input type="text" name="email" id="inputEmail" placeholder="이메일" value="{{ Input::old('email', $user->email) }}">
          {{ $errors->first('email') }}
        </div>
      </div>
      
      <div class="control-group {{ ($errors->has('password') ? 'error' : '') }}">
        <label class="control-label" for="inputPassword">새 비밀번호</label>
        <div class="controls">
          <input type="password" name="password" id="inputPassword" placeholder="새 비밀번호" value="">
          {{ $errors->first('password') }}
        </div>
      </div>

      <div class="control-group {{ ($errors->has('about') ? 'error' : '') }}">
        <label class="control-label" for="inputContent">소개</label>
        <div class="controls">
          <textarea rows="10" id="inputContent" name="about">{{ Input::old('about', $user->about) }}</textarea>
          {{ $errors->first('about') }}
        </div>
      </div>
      
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn">수정</button>
        </div>
      </div>
      
    </form>
  </div>
</div>
@stop