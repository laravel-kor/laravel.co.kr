<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>Laravel Korea</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
  	<meta name="keywords" content="">
    <meta name="author" content="">
  	<meta name="robots" content="index,follow">
    <meta name="google-site-verification" content="IDQJHKTGY5vbkBN5t5l7F9wF8a1A2PIhv4CoWXb5QuE" />
    <meta name="naver-site-verification" content="f9af024a6dea30936cb8b0a7334b8c7b42b9b698"/>
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">

    <!-- Le styles -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/tomorrow-night-eighties.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-responsive.css') }}" rel="stylesheet">
  </head>

  <body>

    @include('layouts.includes.nav')

    <div class="container">

      <div class="page-header">
        <h1>한글 매뉴얼</h1>
      </div>

<!-- <div id="versions">
  <ul>
    <li class="">
        <a href="#" title="5">5</a>
    </li>
    <li class="current">
        <a href="{{ route('doc4') }}" title="4">4</a>
    </li>
  </ul>
</div> -->


<div style='clear: both'></div>

      <div class="row doc-index">

        <div class="span3 aside">
          <div class="well well-small doc-toc-wrapper">
            <ul class="nav nav-list" id='doc-toc'>
              <li class="nav-header">
                머리말(Predface)
                <ul class='doc-item-list'>
                  <li {{ Request::is('docs/4.x/introduction') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'introduction']) }}"><i class=" pull-right"></i>소개(Introduction)</a></li>
                  <li {{ Request::is('docs/4.x/quick') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'quick']) }}"><i class=" pull-right"></i>빠른시작(Quickstart)</a></li>
                  <li {{ Request::is('docs/4.x/contributing') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'contributing']) }}"><i class=" pull-right"></i>기여(contributing)</a></li>
                </ul>
              </li>

              <li class="nav-header">
                시작하기(Getting Started)
                <ul class='doc-item-list'>
                    <li {{ Request::is('docs/4.x/installation') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'installation']) }}"><i class=" pull-right"></i>설치(Installation)</a></li>
                    <li {{ Request::is('docs/4.x/configuration') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'configuration']) }}"><i class=" pull-right"></i>설정(configuration)</a></li>
                    <li {{ Request::is('docs/4.x/lifecycle') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'lifecycle']) }}"><i class=" pull-right"></i>요청 사이클<br/> &nbsp;&nbsp;&nbsp;(Request Lifecycle)</a></li>
                    <li {{ Request::is('docs/4.x/routing') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'routing']) }}"><i class=" pull-right"></i>라우팅(Routing)</a></li>
                    <li {{ Request::is('docs/4.x/requests') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'requests']) }}"><i class=" pull-right"></i>요청 &amp; 입력<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Requests &amp; Input)</a></li>
                    <li {{ Request::is('docs/4.x/responses') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'responses']) }}"><i class=" pull-right"></i>뷰 &amp; 응답<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Views &amp; Responses)</a></li>
                    <li {{ Request::is('docs/4.x/controllers') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'controllers']) }}"><i class=" pull-right"></i>컨트롤러(Controllers)</a></li>
                    <li {{ Request::is('docs/4.x/errors') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'errors']) }}"><i class=" pull-right"></i>에러 &amp; 로그<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Errors &amp; Logging)</a></li>
                </ul>
              </li>

              <li class="nav-header">
                더 배우기(Learning More)
                <ul class='doc-item-list'>
                  <li {{ Request::is('docs/4.x/cache') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'cache']) }}"><i class=" pull-right"></i>캐싱(Cache)</a></li>
                  <li {{ Request::is('docs/4.x/events') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'events']) }}"><i class=" pull-right"></i>이벤트(Events)</a></li>
                  <li {{ Request::is('docs/4.x/facades') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'facades']) }}"><i class=" pull-right"></i>파사드(Facades)</a></li>
                  <li {{ Request::is('docs/4.x/html') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'html']) }}"><i class=" pull-right"></i>폼 &amp; HTML</a></li>
                  <li {{ Request::is('docs/4.x/helpers') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'helpers']) }}"><i class=" pull-right"></i>헬퍼(Helpers)</a></li>
                  <li {{ Request::is('docs/4.x/ioc') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'ioc']) }}"><i class=" pull-right"></i>IoC 컨테이너(IoC Container)</a></li>
                  <li {{ Request::is('docs/4.x/localization') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'localization']) }}"><i class=" pull-right"></i>지역화(Localization)</a></li>
                  <li {{ Request::is('docs/4.x/mail') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'mail']) }}"><i class=" pull-right"></i>메일(Mail)</a></li>
                  <li {{ Request::is('docs/4.x/packages') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'packages']) }}"><i class=" pull-right"></i>패키지 개발<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Package Development)</a></li>
                  <li {{ Request::is('docs/4.x/pagination') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'pagination']) }}"><i class=" pull-right"></i>페이지네이션(Pagination)</a></li>
                  <li {{ Request::is('docs/4.x/queues') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'queues']) }}"><i class=" pull-right"></i>큐(Queues)</a></li>
                  <li {{ Request::is('docs/4.x/security') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'security']) }}"><i class=" pull-right"></i>보안(Security)</a></li>
                  <li {{ Request::is('docs/4.x/session') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'session']) }}"><i class=" pull-right"></i>세션(Session)</a></li>
                  <li {{ Request::is('docs/4.x/template') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'template']) }}s"><i class=" pull-right"></i>템플릿(Templates)</a></li>
                  <li {{ Request::is('docs/4.x/testing') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'testing']) }}"><i class=" pull-right"></i>유닛 테스팅(Unit Testing)</a></li>
                  <li {{ Request::is('docs/4.x/validation') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'validation']) }}"><i class=" pull-right"></i>검증(Validation)</a></li>
                </ul>
              </li>

              <li class="nav-header">
                데이터베이스(Database)
                <ul class='doc-item-list'>
                  <li {{ Request::is('docs/4.x/database') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'database']) }}"><i class=" pull-right"></i>기본적인 사용법(Basic Usage)</a></li>
                  <li {{ Request::is('docs/4.x/queries') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'queries']) }}"><i class=" pull-right"></i>쿼리 빌더(Query Builder)</a></li>
                  <li {{ Request::is('docs/4.x/eloquent') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'eloquent']) }}"><i class=" pull-right"></i>엘로퀀트 ORM<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Eloquent ORM)</a></li>
                  <li {{ Request::is('docs/4.x/schema') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'schema']) }}"><i class=" pull-right"></i>스키마 빌더(Schema Builder)</a></li>
                  <li {{ Request::is('docs/4.x/migrations') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'migrations']) }}"><i class=" pull-right"></i>마이그레이션 &amp; 씨딩<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Migrations &amp; Seeding)</a></li>
                  <li {{ Request::is('docs/4.x/redis') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'redis']) }}"><i class=" pull-right"></i>레디스(Redis)</a></li>
                </ul>
              </li>

              <li class="nav-header">
                아티즌 CLI(Artisan CLI)
                <ul class='doc-item-list'>
                  <li {{ Request::is('docs/4.x/artisan') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'artisan']) }}"><i class=" pull-right"></i>개요(Overview)</a></li>
                  <li {{ Request::is('docs/4.x/commands') ? 'class="active"' : '' }}><a href="{{ route('doc4', ['page'=>'commands']) }}"><i class=" pull-right"></i>개발(Development)</a></li>
                </ul>
              </li>

            </ul>
          </div>
        </div>
        <div class="span9 section">
          @yield('content')
        </div>
      </div>

      @include('layouts.includes.footer')

    </div> <!-- /container -->

    @section('scripts')

    <script type="text/javascript">

      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', '{{ Config::get('site.googleAnalyticsID') }}']);
      _gaq.push(['_trackPageview']);

      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();

    </script>

    <script src="{{ asset('js/jquery-1.8.3.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/highlight.pack.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    @show

  </body>
</html>
