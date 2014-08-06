<?php if (!isset($category)) { $category = null; } ?>
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

                    <li class='dropdown {{ (Request::is('posts*') ? "active" : '') }}'>
                        <a href="{{ URL::to('posts') }}" class='dropdown'>게시판</a>
                        <ul class='dropdown-menu' role='menu'>
                           <li {{ (Request::is('posts/all*') || $category == 'all' ? 'class="active"' : '') }}>
                              <a href="{{ URL::to('posts/all') }}">
                                전체 글
                              </a>
                            </li>
                            <li {{ (Request::is('posts/notice*') || $category == 'notice' ? 'class="active"' : '') }}>
                              <a href="{{ URL::to('posts/notice') }}">
                                공지사항
                              </a>
                            </li>
                            <li {{ (Request::is('posts/free*') || $category == 'free' ? 'class="active"' : '') }}>
                              <a href="{{ URL::to('posts/free') }}">
                                자유게시판
                              </a>
                            </li>
                            <li {{ (Request::is('posts/tuts*') || $category == 'Ltuts' ? 'class="active"' : '') }}>
                              <a href="{{ URL::to('posts/tuts') }}">
                                Laravel 강좌게시판
                              </a>
                            </li>
                            <li {{ (Request::is('posts/tips*') || $category == 'tips' ? 'class="active"' : '') }}>
                              <a href="{{ URL::to('posts/tips') }}">
                                Laravel 팁게시판
                              </a>
                            </li>
                            <li {{ (Request::is('posts/help*') || $category == 'help' ? 'class="active"' : '') }}>
                              <a href="{{ URL::to('posts/help') }}">
                                Laravel 질문게시판
                              </a>
                            </li>
                            <li {{ (Request::is('posts/packages') || $category == 'packages' ? 'class="active"' : '') }}>
                              <a href="{{ URL::to('posts/packages') }}">
                                Laravel 패키지
                              </a>
                            </li>
                            <li {{ (Request::is('posts/sites*') || $category == 'sites 소개' ? 'class="active"' : '') }}>
                              <a href="{{ URL::to('posts/sites') }}">
                                Laravel 사이트 소개
                              </a>
                            </li>
                            <li {{ (Request::is('posts/jobs*') || $category == 'jobs' ? 'class="active"' : '') }}>
                              <a href="{{ URL::to('posts/jobs') }}">
                                구인구직
                              </a>
                            </li>
                        </ul>
                    </li>

                    <li {{ (Request::is('users*') ? 'class="active"' : '') }}><a href="{{ URL::to('users') }}">사용자</a></li>

                    <li {{ (Request::is('chat*') ? 'class="active"' : '') }}><a href="{{ URL::to('chat') }}">채팅</a></li>

                </ul>

                <ul class="nav pull-right">
                    @if ( Auth::check() )
                        <li {{ (Request::is('account') ? 'class="active"' : '') }}>
                            <a href="{{ URL::to('users/' . Auth::user()->id . '/' . Auth::user()->username) }}">내 정보</a>
                        </li>

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