@extends('layouts/contentLayoutMaster')

@section('title', 'Para Birimi Yönetimi')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <p>Para Birimleri</p>
        </div>
    </div>
    <!-- Scroll - horizontal and vertical table -->
    <section id="horizontal-vertical">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Para Birimi Listesi</h4>
                        <a class="btn btn-success btn-link ml-2 mb-2 myModal" href="#"><i class="feather icon-plus"></i> Ekle
                        </a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">

                                <table class="table nowrap scroll-horizontal-vertical">
                                    <thead>
                                    <tr>
                                        <th>Adı</th>
                                        <th>Sembol</th>
                                        <th>Durumu</th>
                                        <th>Oluşturulma Tarihi</th>
                                        <th>Anlık Döviz Kuru</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($currencies as $currency)
                                        <tr>
                                            <td>{{$currency->name}}</td>
                                            <td>{{$currency->symbol}}</td>
                                            <td>{!!  $currency->status == 1 ? '<span class="badge badge-success">Aktif</span>' : '<span class="badge badge-danger">Pasif</span>'!!}</td>
                                            <td>{{$currency->created_at}}</td>
                                            <td>Kur</td>
                                            <td>
                                                <a href="#" class="btn btn-primary myModal" data-color="{{$currency}}">
                                                    <i class="feather icon-edit"></i> Düzenle </a>
                                                <a href="{{route('currencies.destroy',$currency)}}" class="btn btn-danger"
                                                   data-method="DELETE" data-confirm="Emin misiniz ?"><i
                                                            class="feather icon-trash"></i> Sil </a>
                                            </td>

                                        </tr>
                                    @empty
                                        @include('panels.alert',['message' => 'Kayıt Bulunamdı'])
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ Scroll - horizontal and vertical table -->


    <!-- Modal -->
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Para Birimi Ekleme</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="colorForm" method="POST">
                    @csrf
                    <div class="modal-body">
                        <label>Adı: </label>
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Para Birim Adı" class="form-control" required>
                        </div>

                        <label>Sembol: </label>
                        <div class="form-group">
                            <input type="text" name="symbol" placeholder="Para Birim Sembolu ÖR : ₺" class="form-control" required>
                        </div>

                        <label>Sıra: </label>
                        <div class="form-group">
                            <input type="text" name="order" value="0" class="form-control" required>
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
@endsection
@section('vendor-script')
    {{-- vendor files --}}
    {{--    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>--}}
    {{--    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>--}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    {{--    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>--}}
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/datatables/datatable.js')) }}"></script>
    <script !src="">
        $('.myModal').on('click', function () {
            const data = $(this).data('color');
            if(data !== undefined)
            {
                $('#colorForm').attr('action','/scms/currencies/'+data.id);
                $('#colorForm').append('<input type="hidden" name="_method" value="PUT" />');
                $('#myModalLabel33').html(data.name+' Düzenle');
                $('input[name="name"]').val(data.name);
                $('input[name="symbol"]').val(data.symbol);
                $('input[name="order"]').val(data.order);
                $('input[name="status"]').attr('checked',data.status==1 ? true:false);
            }else{
                $('#colorForm').attr('action','/scms/currencies');
                $('input[name="status"]').attr('checked',true);
            }

            $('#inlineForm').modal().show();

        });
    </script>
@endsection
