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

    @include('notifications')

    @yield('content')

    @include('layouts.includes.footer')

</div> <!-- /container -->

@section('scripts')
@include('layouts.includes.disqusSSO')
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
