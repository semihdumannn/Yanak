@extends('layouts/contentLayoutMaster')

@section('title', $product->title.' Ürünü Varyasyonları Listesi')

@section('vendor-style')
    {{-- vendor files --}}
    {{--    <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">--}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')) }}">
@endsection
@section('page-style')
    {{-- Page css files --}}
    {{--    <link rel="stylesheet" href="{{ asset(mix('css/plugins/file-uploaders/dropzone.css')) }}">--}}
    <link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
@endsection
@section('content')
    {{-- Data list view starts --}}
    <section id="data-thumb-view" class="data-thumb-view-header">
        <div class="action-btns">
            <div class="actions-dropodown mr-1 mb-1">
                <div class="btn-group actions-dropodown actions-dropodown">
                    <a href="#" class="btn btn-success px-1 py-1 waves-effect waves-light myModal">
                        <i class="feather icon-plus"></i> Ekle
                    </a>
                </div>
            </div>
        </div>
        @if($options->count() > 0)
            {{-- dataTable starts --}}
            <div class="table-responsive">
                <table class="table data-thumb-view">
                    <thead>
                    <tr>
                        <th>Resim</th>
                        <th>Renk</th>
                        <th>Kalınlık</th>
                        <th>Stok</th>
                        <th>İşlemler</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($options as $option)
                        <tr>
                            <td class="product-img">
                                <a href="{{ asset($option->images()->first()->path ?? 'assets/img/hero25.jpg')  }}"
                                   target="_blank">
                                    <img src="{{ asset($option->images()->first()->path ?? 'assets/img/hero25.jpg')  }}"
                                         alt="Img placeholder">
                                </a>
                            </td>
                            <td class="product-price">
                                <div class="chip chip-warning"
                                     style="background-color: {{$option->color->hexCode}} !important;">
                                    <div class="chip-body">
                                        <div class="chip-text"> {{ $option->color->name }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="product-name">{{ $option->thick->value }}</td>
                            <td class="product-name">{{ $option->stock }} (RULO)</td>
                            <td class="product-action">
                                <a href="#" class="myModal" data-option="{{json_encode($option)}}"><span
                                            class="action-edit"><i
                                                class="feather icon-edit"></i></span></a>
                                <a href="{{route('options.destroy',$option)}}" data-method="delete"
                                   data-confirm="Emin misiniz ?"><span class="action-delete"><i
                                                class="feather icon-trash"></i></span></a>
                                <a href="#" class="picturModal" data-image="{{json_encode($option->images)}}" data-id="{{$option->id}}"><span
                                            class="action-edit"><i
                                                class="feather icon-camera"></i></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            {{-- dataTable ends --}}
        @else
            @include('panels.alert',['message'=> 'Kayıt Bulunamadı!!'])
        @endif
    </section>
    {{-- Data list view end --}}

    <!-- Modal -->
    <div class="modal  fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Varyasyon Ekleme</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="colorForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="product_id" value="{{$product->id}}">
                    <div class="modal-body">
                        <label for="color_id">Renk</label>
                        <div class="form-group">
                            <select name="color_id" id="color_id" class="form-control">
                                @foreach($colors as $color)
                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label for="color_id">Kalınlık</label>
                        <div class="form-group">
                            <select name="thick_id" id="thick_id" class="form-control">
                                @foreach($thicks as $thick)
                                    <option value="{{$thick->id}}">{{$thick->value}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label>Stok: </label>
                        <div class="form-group">
                            <input type="text" name="stock" id="stock" placeholder="Stok" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="stock_kg" id="stock_kg" placeholder="Stok kg miktarı" class="form-control" required>
                        </div>
                        <label for="files" class="picture">Ürün Resimleri</label>
                        <div class="form-group">
                            <input type="file" id="file" class="form-control picture" name="file[]" multiple>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch switch-lg custom-switch-success mr-2 mb-1">
                                <p class="mb-0">Durum</p>
                                <input type="checkbox" name="status" class="custom-control-input" id="customSwitch100">
                                <label class="custom-control-label" for="customSwitch100">
                                    <span class="switch-text-left">Aktif</span>
                                    <span class="switch-text-right">Pasif</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal modal-xl fade text-left" id="pictureGallery" tabindex="-1" role="dialog" aria-labelledby="pictureGallery"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="pictureGallery">Ürün Resimleri</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="colorForm2" action="{{route('image.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <label for="files">Ürün Resimleri</label>
                        <div class="form-group">
                            <input type="file" id="files" class="form-control" name="file[]" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </div>
                </form>
                <div class="row match-height px-2 d-none" id="imageContent"></div>
            </div>
        </div>
    </div>
@endsection
@section('vendor-script')
    {{-- vendor js files --}}
    {{--    <script src="{{ asset(mix('vendors/js/extensions/dropzone.min.js')) }}"></script>--}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.select.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/ui/data-list-view.js')) }}"></script>

    <script !src="">
        $('.myModal').on('click', function () {
            const data = $(this).data('option');
            console.log(data);
            if (data !== undefined) {
                console.log(data);
                $('#colorForm').attr('action', '/scms/options/' + data.id);
                $('#colorForm').append('<input type="hidden" name="_method" value="PUT" />');
                $('#myModalLabel33').html('#' + data.id + ' Varyasyon Düzenle');
                $('input[name="stock"]').val(data.stock);
                $('input[name="status"]').attr('checked', data.status == 1 ? true : false);
                $.each($('#color_id option'), function (key, value) {
                    if ($(value).val() == data.color_id) {
                        $(value).attr('selected', true);
                    }
                });
                $.each($('#thick_id option'), function (key, value) {
                    if ($(value).val() == data.thick_id) {
                        $(value).attr('selected', true);
                    }
                });
                $('.picture').hide();
            } else {
                $('#colorForm').attr('action', '/scms/options');
                $('input[name="status"]').attr('checked', true);
                $('.picture').show();
            }
            $('#inlineForm').modal().show();
        });


        $('.picturModal').on('click', function () {
            const images = $(this).data('image');
            const id = $(this).data('id');
            $('#colorForm2').append(`<input type="hidden" name="id" value="${id}">`);
            if (images !== undefined) {
                $('#imageContent').removeClass('d-none').html(' ');
                Object.values(images).forEach((item) => {
                    $('#imageContent').append(`
                        <div class="col-xl-4 col-md-6 col-sm-12">
                             <div class="card">
                                <div class="card-content">
                                   <a href="/${item.path}" target="_blank"> <img class="card-img-top img-fluid" src="/${item.path}" alt="Card image cap"></a>
                                 <div class="card-body">
<!--                                     <h5>Vuexy Admin</h5>-->
                                    <p class="card-text  mb-0">${JSON.parse(item.features).mimeType}</p>
                                    <span class="card-text">${JSON.parse(item.features).size} KB</span>
                                     <div class="card-btns d-flex justify-content-between mt-2">
                                        <a href="/scms/image/${item.id}" data-method="delete" data-confirn="Emin Misiniz ?" class="btn btn-outline-primary waves-effect waves-light">Sil</a>
                                     </div>
                                 </div>
                                 </div>
                             </div>
                         </div>
                     `);
                });
            } else {
                $('#imageContent').addClass('d-none').html(' ');
            }

            $('#pictureGallery').modal().show();
        });

    </script>
@endsection
