<div class="well">
  <ul class="nav nav-list">
    <li {{ (Request::is('posts/all*') || $header == '전체 글' ? 'class="active"' : '') }}>
      <a href="{{ URL::to('posts/all') }}">
        <i class="icon-chevron-right"></i>
        전체 글
      </a>
    </li>
    <li class="divider"></li>
    <li {{ (Request::is('posts/notice*') || $header == '공지사항' ? 'class="active"' : '') }}>
      <a href="{{ URL::to('posts/notice') }}">
        <i class="icon-chevron-right"></i>
        공지사항
      </a>
    </li>
    <li {{ (Request::is('posts/free*') || $header == '자유게시판' ? 'class="active"' : '') }}>
      <a href="{{ URL::to('posts/free') }}">
        <i class="icon-chevron-right"></i>
        자유게시판
      </a>
    </li>
    <li {{ (Request::is('posts/tuts*') || $header == 'Laravel 강좌게시판' ? 'class="active"' : '') }}>
      <a href="{{ URL::to('posts/tuts') }}">
        <i class="icon-chevron-right"></i>
        Laravel 강좌게시판
      </a>
    </li>
    <li {{ (Request::is('posts/tips*') || $header == 'Laravel 팁게시판' ? 'class="active"' : '') }}>
      <a href="{{ URL::to('posts/tips') }}">
        <i class="icon-chevron-right"></i>
        Laravel 팁게시판
      </a>
    </li>
    <li {{ (Request::is('posts/help*') || $header == 'Laravel 질문게시판' ? 'class="active"' : '') }}>
      <a href="{{ URL::to('posts/help') }}">
        <i class="icon-chevron-right"></i>
        Laravel 질문게시판
      </a>
    </li>
    <li {{ (Request::is('posts/packages') || $header == 'Laravel 패키지' ? 'class="active"' : '') }}>
      <a href="{{ URL::to('posts/packages') }}">
        <i class="icon-chevron-right"></i>
        Laravel 패키지
      </a>
    </li>
    <li {{ (Request::is('posts/sites*') || $header == 'Laravel 사이트 소개' ? 'class="active"' : '') }}>
      <a href="{{ URL::to('posts/sites') }}">
        <i class="icon-chevron-right"></i>
        Laravel 사이트 소개
      </a>
    </li>
    <li class="divider"></li>
    <li {{ (Request::is('posts/jobs*') || $header == '구인구직' ? 'class="active"' : '') }}>
      <a href="{{ URL::to('posts/jobs') }}">
        <i class="icon-chevron-right"></i>
        구인구직
      </a>
    </li>
  </ul>
</div>
@if (Request::is('posts/*/new') || Request::is('posts/*/edit'))
  @include('posts.includes.markdownReference')
@endif