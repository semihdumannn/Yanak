<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <title>{{config('system.title')}} | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {!! config('app.system.seo') !!}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('assets/css/pe-icon-7-stroke.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('assets/css/flexslider.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('assets/css/lightbox.min.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('assets/css/theme-ketchup.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" media="all"/>
    <link href="http://fonts.googleapis.com/css?family=Roboto:100,400,300,700,400italic,500%7CMontserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400,300,700" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/font-opensans.css') }}" rel="stylesheet" type="text/css">
    <script>
        window.csrf = '{{csrf_token()}}';
    </script>


</head>
<body>
@include('particular.header')

<div class="main-container">
   @yield('content')
   @include('particular.footer')
</div>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/skrollr.min.js') }}"></script>
<script src="{{ asset('assets/js/flexslider.min.js') }}"></script>
<script src="{{ asset('assets/js/lightbox.min.js') }}"></script>
{{--<script src="{{ asset('assets/js/twitterfetcher.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/js/spectragram.min.js') }}"></script>--}}
<script src="{{ asset('assets/js/smooth-scroll.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.plugin.min.js') }}"></script>
<script src="{{ asset('assets/js/countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/placeholders.min.js') }}"></script>
{{--<script src="{{ asset('assets/js/parallax.js') }}"></script>--}}
<script src="{{ asset('assets/js/scripts.js') }}"></script>
@yield('page-script')
</body>
</html>

				