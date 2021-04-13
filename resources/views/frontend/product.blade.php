@extends('layouts.master')
@section('title',$product->title)
@section('content')
    <section class="product-single-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="image-slider">
                        <ul class="slides">
                            @forelse($imageArray as $key =>$image)
                                <li>
                                    <a href="{{asset($image)}}" data-lightbox="true"
                                       data-title="{{$product->title}}">
                                        <div class="background-image-holder">
                                            <img alt="Product Image" src="{{asset($image)}}">
                                        </div>
                                    </a>
                                </li>
                            @empty
                                <li>
                                    <a href="img/product1.jpg" data-lightbox="true" data-title="Woo Poster">
                                        <div class="background-image-holder">
                                            <img alt="Product Image" src="assets/img/product1.jpg">
                                        </div>
                                    </a>
                                </li>
                            @endforelse
                        </ul>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="product-details">
                        <h2>{{$product->title}}</h2>
                        <span class="price">
{{--                            @if($product->currency->symbol == '₺')--}}
{{--                                {{$product->price}} ₺--}}
{{--                            @elseif($product->currency->symbol == '€')--}}
{{--                                {{ ceil($product->price * $currencyData['euro']) }} ₺--}}
{{--                            @elseif($product->currency->symbol == '£')--}}
{{--                                {{ ceil($product->price * $currencyData['sterlin']) }} ₺--}}
{{--                            @elseif($product->currency->symbol == '$')--}}
{{--                                {{ ceil($product->price * $currencyData['dolar']) }} ₺--}}
{{--                            @endif--}}
                            {{ $product->price.' ₺' }}
                        </span>

                    {!! $product->content !!}

                    {{--                        <ul class="expanding-list">--}}
                    {{--                            <li>--}}
                    {{--                                <span class="title">Sizing Info</span>--}}
                    {{--                                <div class="content">--}}
                    {{--                                    <p>--}}
                    {{--                                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu--}}
                    {{--                                        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.--}}
                    {{--                                    </p>--}}
                    {{--                                </div>--}}
                    {{--                            </li>--}}

                    {{--                            <li>--}}
                    {{--                                <span class="title">Customer Reviews (3)</span>--}}
                    {{--                                <div class="content">--}}
                    {{--                                    <div class="review">--}}
                    {{--                                        <ul class="stars">--}}
                    {{--                                            <li><i class="icon_star"></i></li>--}}
                    {{--                                            <li><i class="icon_star"></i></li>--}}
                    {{--                                            <li><i class="icon_star"></i></li>--}}
                    {{--                                            <li><i class="icon_star"></i></li>--}}
                    {{--                                            <li><i class="icon_star-half"></i></li>--}}
                    {{--                                        </ul>--}}
                    {{--                                        <span class="author">by Craig Garner</span>--}}
                    {{--                                        <p>--}}
                    {{--                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore--}}
                    {{--                                            eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.--}}
                    {{--                                        </p>--}}
                    {{--                                    </div>--}}

                    {{--                                    <div class="review">--}}
                    {{--                                        <ul class="stars">--}}
                    {{--                                            <li><i class="icon_star"></i></li>--}}
                    {{--                                            <li><i class="icon_star"></i></li>--}}
                    {{--                                            <li><i class="icon_star-half"></i></li>--}}
                    {{--                                        </ul>--}}
                    {{--                                        <span class="author">by James Hillier</span>--}}
                    {{--                                        <p>--}}
                    {{--                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore--}}
                    {{--                                            eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.--}}
                    {{--                                        </p>--}}
                    {{--                                    </div>--}}

                    {{--                                    <div class="review">--}}
                    {{--                                        <ul class="stars">--}}
                    {{--                                            <li><i class="icon_star"></i></li>--}}
                    {{--                                            <li><i class="icon_star"></i></li>--}}
                    {{--                                            <li><i class="icon_star"></i></li>--}}
                    {{--                                            <li><i class="icon_star"></i></li>--}}
                    {{--                                            <li><i class="icon_star"></i></li>--}}
                    {{--                                        </ul>--}}
                    {{--                                        <span class="author">by Maximus Paws</span>--}}
                    {{--                                        <p>--}}
                    {{--                                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore--}}
                    {{--                                            eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.--}}
                    {{--                                        </p>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                            </li>--}}
                    {{--                        </ul>--}}
                    <!--end of expanding list-->

                        <form class="add-to-cart">
                            <div class="col-sm-3">
                                <label>Renk</label> <br>
                                <select class="form-control" name="color" id="color">
                                    @foreach($colors as $color)
                                        <option value="{{$color->id}}" {{$color->id == $product->options()->first()->color->id ? 'selected':null}}>
                                            {{$color->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Kalınlık (cm)</label> <br>
                                <select class="form-control" name="thick" id="thick">
                                    <option value="4" {{ $product->options()->first()->thick->id == 4 ? 'selected' : null }}>4</option>
                                    <option value="6" {{ $product->options()->first()->thick->id == 6 ? 'selected' : null }}>6</option>
                                    <option value="8" {{ $product->options()->first()->thick->id == 8 ? 'selected' : null }}>8</option>
                                </select>
                            </div>
                            <br><br><br>

                            <label>Miktar (Rulo olarak)</label>
                            <br>
                            <div class="quantity-controls">
                                <div class="less">-</div>
                                <input name="quantity" id="quantity" type="text" value="1">
                                <div class="more">+</div>
                            </div>
                            <br><br>
                            <!-- href="{{route('order')}}" -->
                            <a class="btn btn-sm" id="order" href="{{route('order')}}">Sipariş Ver</a>
                        </form>
                    </div><!--end of product details-->
                </div><!--end of columns-->

            </div><!--end of row-->
        </div><!--end of container-->
    </section>
@stop

@section('page-script')
    <script !src="">
        $('#order').on('click',function () {
            const id = '{{$product->id}}';
            const price = '{{$product->price}}';
            const title = '{{$product->title}}';
            const code = '{{$product->code}}';
            var sel = document.getElementById("color");
            var text= sel.options[sel.selectedIndex].text;
            const color = text;
            const thick = $('#thick').val();
            const quantity = $('#quantity').val();
            const order = {'id': id,  color, 'thick':thick, 'quantity' : quantity,'title' : title,'price' : price,'code' : code};
            localStorage.setItem('order',JSON.stringify(order));
        });

        $('.more').on('click',function () {

            const val = parseInt($('#quantity').val());

            $('#quantity').val(val);
        });

        $('.less').on('click',function () {
            const val = parseInt($('#quantity').val());
            $('#quantity').val(val);
        });


    </script>
@stop