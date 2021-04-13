@extends('layouts/contentLayoutMaster')

@section('title', 'Sipariş Listesi')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/katex.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/monokai-sublime.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/editors/quill/quill.snow.css')) }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/pages/app-email.css')) }}">
@endsection
<!-- Sidebar Area -->
@include('pages/app-email-sidebar')
@section('content')
    <div class="app-content-overlay"></div>
    <div class="email-app-area">
        <!-- Email list Area -->
        <div class="email-app-list-wrapper">
            <div class="email-app-list">
                <div class="app-fixed-search">
                    <div class="sidebar-toggle d-block d-lg-none"><i class="feather icon-menu"></i></div>
                    <fieldset class="form-group position-relative has-icon-left m-0">
                        <input type="text" class="form-control" id="email-search" placeholder="Search email">
                        <div class="form-control-position">
                            <i class="feather icon-search"></i>
                        </div>
                    </fieldset>
                </div>
                <div class="app-action">
                    <div class="action-left">
                        <div class="vs-checkbox-con selectAll">
                            <input type="checkbox">
                            <span class="vs-checkbox">
                            <span class="vs-checkbox--check">
                              <i class="vs-icon feather icon-minus"></i>
                            </span>
                          </span>
                            <span>Hepsini Seç</span>
                        </div>
                    </div>
                    <div class="action-right">
                        <ul class="list-inline m-0">
                            <li class="list-inline-item">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" id="folder" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-folder"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="folder">
                                        <a class="dropdown-item d-flex font-medium-1" href="#"><i
                                                    class="font-medium-3 feather icon-edit-2 mr-50"></i> Draft</a>
                                        <a class="dropdown-item d-flex font-medium-1" href="#"><i
                                                    class="font-medium-3 feather icon-info mr-50"></i> Spam</a>
                                        <a class="dropdown-item d-flex font-medium-1" href="#"><i
                                                    class="font-medium-3 feather icon-trash mr-50"></i> Trash</a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-inline-item">
                                <div class="dropdown">
                                    <a href="#" class="dropdown-toggle" id="tag" data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="false">
                                        <i class="feather icon-tag"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="tag">
                                        <a href="#" class="dropdown-item font-medium-1"><span
                                                    class="mr-1 bullet bullet-success bullet-sm"></span> Sipariş Alındı</a>
                                        <a href="#" class="dropdown-item font-medium-1"><span
                                                    class="mr-1 bullet bullet-primary bullet-sm"></span> Kargoya Verildi</a>
                                        <a href="#" class="dropdown-item font-medium-1"><span
                                                    class="mr-1 bullet bullet-warning bullet-sm"></span> Teslim
                                            Edildi</a>
                                        <a href="#" class="dropdown-item font-medium-1"><span
                                                    class="mr-1 bullet bullet-danger bullet-sm"></span> İptal Edildi</a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-inline-item mail-unread"><span class="action-icon"><i
                                            class="feather icon-mail"></i></span></li>
                            <li class="list-inline-item mail-delete"><span class="action-icon"><i
                                            class="feather icon-trash"></i></span></li>
                        </ul>
                    </div>
                </div>
                <div class="email-user-list list-group">
                    <ul class="users-list-wrapper media-list">
                        @forelse($orders as $order)
                            <li class="media @if($order->status != 1) mail-read @endif"
                                data-order="{{json_encode($order)}}">
                                <div class="media-left pr-50">
{{--                                    <div class="avatar">--}}
{{--                                        <img src="{{ asset($order->products[0]->images[0]->path) }}"--}}
{{--                                             alt="avtar img holder">--}}
{{--                                    </div>--}}
                                    <div class="user-action">
                                        <div class="vs-checkbox-con">
                                            <input type="checkbox">
                                            <span class="vs-checkbox vs-checkbox-sm">
                                        <span class="vs-checkbox--check">
                                          <i class="vs-icon feather icon-check"></i>
                                        </span>
                                      </span>
                                        </div>
                                        <span class="favorite"><i class="feather icon-star"></i></span>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="user-details">
                                        <div class="mail-items">
                                            <h5 class="list-group-item-heading text-bold-600 mb-25">{{$order->name}}</h5>
                                            <span class="list-group-item-text text-truncate">{{$order->phone ?? $order->email}}</span>
                                        </div>
                                        <div class="mail-meta-item">
                                      <span class="float-right">
                                          <span class="mr-1 bullet bullet-success bullet-sm"></span><span
                                                  class="mail-date">{{$order->created_at}}</span>
                                      </span>
                                        </div>
                                    </div>
                                    <div class="mail-message">
                                        <p class="list-group-item-text truncate mb-0">
                                            {{$order->order_no}} numaralı şipariş <br>
                                            <strong>Teslimat Adresi : </strong> {{$order->address}}
                                        </p>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <div class="no-results">
                                <h5>Sipariş Bulunamadı</h5>
                            </div>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Email list Area -->
        <!-- Detailed Email View -->
        <div class="email-app-details">
            <div class="email-detail-header">
                <div class="email-header-left d-flex align-items-center mb-1">
                    <span class="go-back mr-1"><i class="feather icon-arrow-left font-medium-4"></i></span>
                    <h3></h3>
                </div>
                {{--                <div class="email-header-right mb-1 ml-2 pl-1">--}}
                {{--                    <ul class="list-inline m-0">--}}
                {{--                        <li class="list-inline-item"><span class="action-icon favorite"><i--}}
                {{--                                        class="feather icon-star font-medium-5"></i></span></li>--}}
                {{--                        <li class="list-inline-item">--}}
                {{--                            <div class="dropdown no-arrow">--}}
                {{--                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"--}}
                {{--                                   aria-expanded="false">--}}
                {{--                                    <i class="feather icon-folder font-medium-5"></i>--}}
                {{--                                </a>--}}
                {{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="folder">--}}
                {{--                                    <a class="dropdown-item d-flex font-medium-1" href="#"><i--}}
                {{--                                                class="font-medium-3 feather icon-edit-2 mr-50"></i> Draft</a>--}}
                {{--                                    <a class="dropdown-item d-flex font-medium-1" href="#"><i--}}
                {{--                                                class="font-medium-3 feather icon-info mr-50"></i> Spam</a>--}}
                {{--                                    <a class="dropdown-item d-flex font-medium-1" href="#"><i--}}
                {{--                                                class="font-medium-3 feather icon-trash mr-50"></i> Trash</a>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </li>--}}
                {{--                        <li class="list-inline-item">--}}
                {{--                            <div class="dropdown no-arrow">--}}
                {{--                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"--}}
                {{--                                   aria-expanded="false">--}}
                {{--                                    <i class="feather icon-tag font-medium-5"></i>--}}
                {{--                                </a>--}}
                {{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="tag">--}}
                {{--                                    <a href="#" class="dropdown-item font-medium-1"><span--}}
                {{--                                                class="mr-1 bullet bullet-success bullet-sm"></span> Sipariş Alındı</a>--}}
                {{--                                    <a href="#" class="dropdown-item font-medium-1"><span--}}
                {{--                                                class="mr-1 bullet bullet-primary bullet-sm"></span> Kargoya Verildi</a>--}}
                {{--                                    <a href="#" class="dropdown-item font-medium-1"><span--}}
                {{--                                                class="mr-1 bullet bullet-warning bullet-sm"></span> Teslim Edildi.</a>--}}
                {{--                                    <a href="#" class="dropdown-item font-medium-1"><span--}}
                {{--                                                class="mr-1 bullet bullet-danger bullet-sm"></span> İptal</a>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </li>--}}
                {{--                        <li class="list-inline-item"><span class="action-icon"><i--}}
                {{--                                        class="feather icon-mail font-medium-5"></i></span></li>--}}
                {{--                        <li class="list-inline-item"><span class="action-icon"><i--}}
                {{--                                        class="feather icon-trash font-medium-5"></i></span></li>--}}
                {{--                        <li class="list-inline-item email-prev"><span class="action-icon"><i--}}
                {{--                                        class="feather icon-chevrons-left font-medium-5"></i></span></li>--}}
                {{--                        <li class="list-inline-item email-next"><span class="action-icon"><i--}}
                {{--                                        class="feather icon-chevrons-right font-medium-5"></i></span></li>--}}
                {{--                    </ul>--}}
                {{--                </div>--}}
            </div>
            <!-- Order İçerik -->
            <div class="email-scroll-area">
                <div class="row">
                    <div class="col-12">
                        <div class="email-label ml-2 my-2 pl-1 modalLabel">
                            {{--                            <span class="mr-1 bullet bullet-primary bullet-sm"></span>--}}
                            {{--                            <small class="mail-label">Company</small>--}}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card px-1">
                            <div class="card-header email-detail-head ml-75">
                                <div class="user-details d-flex justify-content-between align-items-center flex-wrap">
                                    <div class="avatar mr-75">
                                        {{--                                        <img src="{{ asset('images/portrait/small/avatar-s-18.jpg') }}"--}}
                                        {{--                                             alt="avtar img holder" width="61" height="61">--}}
                                    </div>
                                    <div class="mail-items">
                                        <h4 class="list-group-item-heading mb-0" id="headingName"></h4>
                                        <div class="email-info-dropup dropdown">
                                          <span class="dropdown-toggle font-small-3" id="dropdownMenuButton200"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                          </span>
                                            <div class="dropdown-menu dropdown-menu-right p-50"
                                                 aria-labelledby="dropdownMenuButton200">
                                                <div class="px-25 dropdown-item modalPhone">Telefon: <strong>
                                                        abaldersong@utexas.edu </strong>
                                                </div>
                                                <div class="px-25 dropdown-item modalEmail">E-mail:
                                                    <strong>05413074500</strong>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mail-meta-item">
                                    <div class="mail-time mb-1">4:14 AM</div>
                                    <div class="mail-date" id="modalDate">17 May 2018</div>
                                </div>
                            </div>
                            <div class="card-body mail-message-wrapper pt-2 mb-0">
                                <div class="mail-message">
                                    <div class="table-responsive">

                                        <p>Sipariş Detayı</p>
                                        <table class="table table-hover mb-0">
                                            <thead>
                                            <tr>
                                                <th scope="col">Ürün Kodu</th>
                                                <th scope="col">Ürün Adı</th>
                                                <th scope="col">Renk</th>
                                                <th scope="col">Kalınlık</th>
                                                <th scope="col">Miktart( Rulo & Metre)</th>
                                                <th scope="col">Ücret</th>
                                            </tr>
                                            </thead>
                                            <tbody id="details">
                                            <tr>

                                            </tr>
                                            </tbody>
                                            <tfoot>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col" class="total">Ücret</th>
                                            </tfoot>
                                        </table>

                                        <p id="modalAddress">

                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="mail-files py-2">
                                <div class="chip chip-primary">
                                    <div class="chip-body py-50">
                                        <a href="#" class="chip-text text-white">Faturayi Gör</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{--                <div class="row">--}}
                {{--                    <div class="col-12">--}}
                {{--                        <div class="card">--}}
                {{--                            <div class="card-body">--}}
                {{--                                <div class="d-flex justify-content-between">--}}
                {{--                                    <span class="font-medium-1">Click here to <span--}}
                {{--                                                class="primary cursor-pointer"><strong>Reply</strong></span> or <span--}}
                {{--                                                class="primary  cursor-pointer"><strong>Forward</strong></span></span>--}}
                {{--                                    <i class="feather icon-paperclip font-medium-5 mr-50"></i>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </div>
        <!--/ Detailed Email View -->
    </div>
@endsection

@section('vendor-script')
    <!-- vendor js files -->
    <script src="{{ asset(mix('vendors/js/editors/quill/katex.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/highlight.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/editors/quill/quill.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/app-email.js')) }}"></script>

    <script !src="">
        $('.media').on('click', function () {
            const order = $(this).data('order');
            console.log(order);
            $('.email-header-left  h3').html(order.order_no + ' lu Sipariş Bilgileri');
            $('#headingName').html(order.name);
            $('#dropdownMenuButton200').html(order.phone);
            $('.modalPhone strong').html(order.phone);
            $('.modalEmail strong').html(order.email);
            $('.mail-time ').html(order.created_at.split(' ')[1]);
            $('#modalDate').html(order.created_at.split(' ')[0]);
            $('.total').html('Toplam : ' + order.totalPrice + ' ₺');
            $('.modalLabel').html(order.statusText);
            $('#details').html('');
            order.items.forEach(item => {
               
                $('#details').append(`
                <tr>
                   <th scope="row">${item.product.code}</th>
                   <th scope="row">${item.product.title}</th>
                    <td>${item.color.name}</td>
                    <td>${item.thick.value} cm</td>
                    <td>${item.quantity} rulo</td>
                    <td>${item.price} ₺</td>
                </tr>
              `);
            });

            $('#modalAddress').html(` <strong>Teslimat Adresi : </strong>${order.address}`);


        });
    </script>
@endsection

