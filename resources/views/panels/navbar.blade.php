@if($configData["mainLayoutType"] == 'horizontal')
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu {{ $configData['navbarColor'] }} navbar-fixed">
        <div class="navbar-header d-xl-block d-none">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item"><a class="navbar-brand" href="/scms">
                        <div class="brand-logo"></div>
                    </a></li>
            </ul>
        </div>
        @else
            <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }}">
                @endif
                <div class="navbar-wrapper">
                    <div class="navbar-container content">
                        @if(session('result'))
                            <div class="alert alert-{{session('result')}}  alert-dismissible ml-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <p class="mb-0">
                                    {{session('message')}}
                                </p>
                            </div>
                        @endif
                        <div class="navbar-collapse" id="navbar-mobile">
                            <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                                <ul class="nav navbar-nav">
                                    <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                                class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                                                    class="ficon feather icon-menu"></i></a></li>
                                </ul>
                            </div>


                            <ul class="nav navbar-nav float-right">


                                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                                class="ficon feather icon-maximize"></i></a></li>

                                <li class="dropdown dropdown-notification nav-item"><a class="nav-link nav-link-label"
                                                                                       href="#"
                                                                                       data-toggle="dropdown"><i
                                                class="ficon feather icon-bell"></i><span
                                                class="badge badge-pill badge-primary badge-up">1</span></a>
                                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                        <li class="dropdown-menu-header">
                                            <div class="dropdown-header m-0 p-2">
                                                <h3 class="white">1 Yeni</h3><span
                                                        class="grey darken-2">Bildirimler</span>
                                            </div>
                                        </li>
                                        <li class="scrollable-container media-list">
                                            <a class="d-flex justify-content-between" href="javascript:void(0)">
                                                <div class="media d-flex align-items-start">
                                                    <div class="media-left"><i
                                                                class="feather icon-plus-square font-medium-5 primary"></i>
                                                    </div>
                                                    <div class="media-body">
                                                        <h6 class="primary media-heading">You have new order!</h6><small
                                                                class="notification-text"> Are your going to meet me
                                                            tonight?</small>
                                                    </div>
                                                    <small>
                                                        <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">9
                                                            hours ago
                                                        </time>
                                                    </small>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="dropdown-menu-footer">
                                            <a class="dropdown-item p-1 text-center" href="javascript:void(0)">
                                                Hepsini Oku
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown dropdown-user nav-item"><a
                                            class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                            data-toggle="dropdown">
                                        <div class="user-nav d-sm-flex d-none"><span
                                                    class="user-name text-bold-600">{{auth()->user()->fullName}}</span><span
                                                    class="user-status">Çevrimiçi</span></div>
                                        <span><img class="round"
                                                   src="{{asset('images/portrait/small/avatar-s-11.jpg') }}"
                                                   alt="avatar" height="40" width="40"/></span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item"
                                           href="{{ route('user.edit',auth()->user()->id) }}">
                                            <i class="feather icon-user"></i> Profil Güncelle</a>
                                        <a class="dropdown-item" href="app-email">
                                            <i class="feather icon-mail"></i>
                                            Siparişler</a>
                                        <a class="dropdown-item" href="/" target="_blank">
                                            <i class="feather icon-link"></i> Siteyi Göster</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" >
                                            <i class="feather icon-power"></i>
                                            Çıkış Yap
                                        </a>
                                        <form id="logout-form" action="{{route('logout')}}" method="POST"
                                              style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

        <!-- END: Header-->
