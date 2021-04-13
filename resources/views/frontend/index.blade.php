@extends('layouts.master')
@section('title','Ana Sayfa')
@section('content')
    {{--    <section class="hero-slider centered-text-slider fixed-header">--}}
    {{--        <ul class="slides">--}}
    {{--            <li class="overlay text-center">--}}

    {{--                <div class="background-image-holder">--}}
    {{--                    <img alt="Slide Background" class="background-image" src="assets/img/hero30.jpg">--}}
    {{--                </div>--}}

    {{--                <div class="container vertical-align">--}}
    {{--                    <div class="row">--}}
    {{--                        <div class="col-sm-12 text-center">--}}
    {{--                            <h1 class="text-white">Create unique layouts in seconds with Machine</h1>--}}
    {{--                            <p class="super-lead text-white">Machine steps in a bold new direction for HTML templates, offering you complete creative control.</p>--}}
    {{--                            <a class="btn btn-white" href="#">Start The Convo</a>--}}
    {{--                            <a class="btn btn-filled" href="#">Roll The Dice</a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </li><!--end of slide-->--}}

    {{--        </ul>--}}
    {{--    </section>--}}
    <section class="hero-slider large-image fixed-header restrict-hero-height">
        <ul class="slides">
            @foreach($sliders as $slide)
                <li>
                    <div class="background-image-holder">
                        <img alt="{{$slide->name}}" class="background-image" src="{{asset($slide->image->path)}}">
                    </div>
                    @php($features = json_decode($slide->image->features))
                    <div class="container vertical-align">
                        <div class="row">
                            <div class="col-sm-12 text-center">
                              {!! $features->html  !!}
                            </div>
                        </div>
                    </div><!--end of container-->
                </li>
            @endforeach
        </ul>
    </section>

    @foreach($products as $product)
        <section class="image-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-7">
                        <div class="text-block">
                            <h2>{{$product->title.' - '.$product->code}}</h2>
                            {!! $product->content !!}
                            {{--                        <p class="lead">--}}
                            {{--                          --}}
                            {{--                        </p>--}}
                            <a class="btn" href="{{url('/'.$product->link)}}">İncele</a>
                        </div>
                    </div>
                </div><!--end of row-->
            </div><!--end of container-->

            <div class="image-holder col-md-6 col-sm-4 {{ $product->id%2 ? 'pull-right' : 'pull-left'  }}">
                <div class="background-image-holder">
                    <img alt="Slide Background" class="background-image"
                         src="{{asset($product->options()->first()->images()->count() > 0 ? $product->options()->first()->images()->first()->path : 'assets/img/box3.jpg')}}">
                </div>
            </div>

        </section>
    @endforeach

    {{--    <section class="image-block">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-5 col-sm-7 col-md-offset-7 col-sm-offset-5">--}}
    {{--                    <div class="text-block">--}}
    {{--                        <div class="detail-line"></div>--}}
    {{--                        <h5>Delivering ideas + innovation</h5>--}}
    {{--                        <p>--}}
    {{--                            At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.--}}
    {{--                        </p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div><!--end of row-->--}}
    {{--        </div><!--end of container-->--}}

    {{--        <div class="image-holder col-md-6 col-sm-4 pull-left">--}}
    {{--            <div class="image-slider">--}}
    {{--                <ul class="slides">--}}
    {{--                    <li>--}}
    {{--                        <div class="background-image-holder">--}}
    {{--                            <img alt="Slide Background" class="background-image" src="assets/img/box3.jpg">--}}
    {{--                        </div>--}}
    {{--                    </li>--}}


    {{--                </ul>--}}
    {{--            </div>--}}
    {{--        </div>--}}

    {{--    </section>--}}

    <!-- Ürün Videosu -->
    <section class="action-strip-2 video-strip">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="pre-video">
                        <i class="icon pe-7s-play"></i>
                        <h2>Videoyu İzle</h2>
                    </div>

                    <div class="iframe-holder">
                        <i class="close-frame pe-7s-close-circle"></i>
                        <iframe src="http://player.vimeo.com/video/108018156?color=ffffff?badge=0&amp;title=0&amp;byline=0"></iframe>
                    </div>
                </div>
            </div><!--end of row-->
        </div><!--end of container-->
    </section>
    <!-- Müşteri Yorumları -->
    <section class="testimonials">
        <ul class="slides">

            <li>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 text-center">
                            <p class="super-lead text-white">
                                “İstediğim ürün tam zamanında geldi.”
                            </p>
                            <span class="alt-font">Semih Duman / Turkuvaz Medya</span>
                        </div>
                    </div><!--end of row-->
                </div><!--end of container-->
            </li>

            <li>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 text-center">
                            <p class="super-lead text-white">
                                “Deneylerimiz için lazım olan malzemeyi sorunsuz şekilde ulaştırdılar.”
                            </p>
                            <span class="alt-font">Enver Terzi / Hitit Üniversitesi Malzeme Bölüm Başkanı</span>
                        </div>
                    </div><!--end of row-->
                </div><!--end of container-->
            </li>

            <li>
                <div class="container">
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1 text-center">
                            <p class="super-lead text-white">
                                “Firmamızın tabelası için tamda istediğimiz üründü.”
                            </p>
                            <span class="alt-font">Alperen Refik Bilal Özsarı / Metalurji Malzeme Yüksek Mühendisi</span>
                        </div>
                    </div><!--end of row-->
                </div><!--end of container-->
            </li>
        </ul>
    </section>
@endsection