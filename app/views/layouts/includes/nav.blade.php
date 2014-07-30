<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="{{ URL::to('/') }}"><img src='/img/logo.png' width='40'/>&nbsp;&nbsp;&nbsp;Laravel Korea</a>
      <div class="nav-collapse collapse">
        <ul class="nav">
          <li {{ (Request::is('docs*') ? 'class="active"' : '') }}><a href="{{ URL::to('docs') }}">한글 매뉴얼</a></li>
          <li {{ (Request::is('posts*') ? 'class="active"' : '') }}><a href="{{ URL::to('posts') }}">게시판</a></li>
          <li {{ (Request::is('users*') ? 'class="active"' : '') }}><a href="{{ URL::to('users') }}">사용자</a></li>
          <li {{ (Request::is('chat*') ? 'class="active"' : '') }}><a href="{{ URL::to('chat') }}">채팅</a></li>

        </ul>
        <ul class="nav pull-right">
          @if ( Auth::check() )
          <li {{ (Request::is('account') ? 'class="active"' : '') }}><a href="{{ URL::to('users/' . Auth::user()->id . '/' . Auth::user()->username) }}">내 정보</a></li>
          <li><a href="{{ URL::to('logout') }}">로그아웃</a></li>
          @else
          <li {{ (Request::is('register') ? 'class="active"' : '') }}><a href="{{ URL::to('register') }}">회원가입</a></li>
          <li {{ (Request::is('login') ? 'class="active"' : '') }}><a href="{{ URL::to('login') }}">로그인</a></li>
          @endif
        </ul>
        <form class="navbar-form pull-right" action="{{ URL::to('search') }}">
          <input type="text" class="span2" name="query" placeholder="검색">
        </form>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>