@extends('layouts/contentLayoutMaster')

@section('title', 'Sipariş Ekle')

@section('content')
    <!-- // Basic Floating Label Form section start -->
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sipariş Ekle</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{ route('orders.store') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div id="productRow">
                                        @component('backend.orders.orderProductRow',
                                        [
                                            'products' => $products,
                                            'colors' => $colors,
                                            'thicks' => $thicks
                                        ]) @endcomponent
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 mb-2">
                                            <a onclick="addRow();" class="btn btn-outline-primary">
                                                <span class="feather icon-plus">Ekle</span>
                                            </a>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label for="price">Ad Soyad</label>
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" class="form-control" name="name"
                                                       placeholder="Ad Soyad" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label for="price">Telefon Numarası</label>
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" class="form-control" name="phone"
                                                       placeholder="Telefon Numarsı" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label for="price">E-mail</label>
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" class="form-control" name="email"
                                                       placeholder="E-mail">
                                                <div class="form-control-position">
                                                    <i class="feather icon-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <label for="price">Şirket</label>
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" class="form-control" name="company"
                                                       placeholder="Şirket Adı" >
                                                <div class="form-control-position">
                                                    <i class="feather icon-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <label for="content">Adres</label>
                                            <div class="form-label-group position-relative has-icon-left">
                                                <textarea class="form-control" id="content" cols="4" rows="4"
                                                          name="address" placeholder="Teslimat Adresi"
                                                          required></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Kaydet</button>
                                            <a href="{{route('orders.index')}}"
                                               class="btn btn-outline-warning mr-1 mb-1">Geri</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Floating Label Form section end -->
@endsection

@section('page-script')
    <script !src="">

        function addRow() {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                type: 'POST',
                url: '/scms/orders/get-row',
                data: {},
                success: function (response) {
                    $('#productRow').append(response);
                },
                error: function (err) {
                    console.log(err);
                }
            });
        }

        function  removeRow(id) {
            $('#'+id).remove();
        }

        function updatePrice(id) {
            $('#price_'+id).val($('#product_'+id+' option:selected').data('price')+' ₺');
        }

        function updateTotalPrice(id,value) {
            const price = $('#product_'+id+' option:selected').data('price');
            if (value != '' && value != "0" && value != 0)
            {
                $('#price_'+id).val((price*value)+' ₺');
            }
        }

    </script>
@endsection
