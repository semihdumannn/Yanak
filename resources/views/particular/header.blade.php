<div class="nav-container">
    <nav class="nav-1">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="/" class="home-link">
                        <img alt="Logo" class="logo" src="{{asset('assets/img/logo-square-light.png')}}">
                    </a>
                    <ul class="menu">
                        @foreach($pages as $item)
                        <li>
                            <a href="{{$item->page->link}}">{{mb_strtoupper($item->page->title)}}</a>
                        </li>
                        @endforeach

{{--                        <li class="has-dropdown"><a href="#">Blog</a>--}}
{{--                            <ul class="subnav">--}}
{{--                                <li class="has-dropdown-2"><a href="#">Post Pages</a>--}}
{{--                                    <ul class="subnav-level-2">--}}
{{--                                        <li><a href="blog-1.html">Grid</a></li>--}}
{{--                                        <li><a href="blog-2.html">Grid Sidebar</a></li>--}}
{{--                                        <li><a href="blog-3.html">Image</a></li>--}}
{{--                                        <li><a href="blog-4.html">Image Sidebar</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="has-dropdown-2"><a href="#">Articles</a>--}}
{{--                                    <ul class="subnav-level-2">--}}
{{--                                        <li><a href="article-1.html">Article</a></li>--}}
{{--                                        <li><a href="article-2.html">Article Sidebar</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="has-dropdown"><a href="#">Work</a>--}}
{{--                            <ul class="subnav">--}}
{{--                                <li class="has-dropdown-2"><a href="#">Projects</a>--}}
{{--                                    <ul class="subnav-level-2">--}}
{{--                                        <li><a href="work-1.html">Filter Grid</a></li>--}}
{{--                                        <li><a href="work-2.html">Large Grid</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li><a href="work-single-1.html">Single</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="has-dropdown"><a href="#">Shop</a>--}}
{{--                            <ul class="subnav">--}}
{{--                                <li><a href="shop-1.html">Products Grid</a></li>--}}
{{--                                <li><a href="product-1.html">Single Product</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}

                    </ul>

                    <ul class="social-links">
                        <li><a href="{{config('system.socailMedya.facebook')}}" target="_blank"><i class="icon ti ti-facebook"></i></a></li>
                        <li><a href="{{config('system.socailMedya.twitter')}}" target="_blank"><i class="ti ti-twitter-alt"></i></a></li>
                        <li><a href="{{ config('system.socailMedya.instagram') }}" target="_blank"><i class="icon ti ti-instagram"></i></a></li>
                    </ul>

                    <div class="nav-functions">

                        <div class="search-bar">
                            <form class="search">
                                <input type="text" placeholder="" name="search">
                                <input type="submit" value="1">
                                <i class="pe-7s-search"></i>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!--end of row-->
        </div><!--end of container-->

        <div class="mobile-toggle">
            <div class="bar-1"></div>
            <div class="bar-2"></div>
        </div>
    </nav>
</div>