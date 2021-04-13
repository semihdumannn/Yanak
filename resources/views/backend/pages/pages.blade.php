
@extends('layouts/contentLayoutMaster')

@section('title', 'Sabit Sayfa Yönetimi')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <p>Sabit Sayfalar</p>
        </div>
    </div>
    <!-- Scroll - horizontal and vertical table -->
    <section id="horizontal-vertical">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Sayfa Yönetimi</h4>
                        <a class="btn btn-success btn-link ml-2 mb-2" href="{{ route('pages.create') }}"><i class="feather icon-plus"></i> Ekle </a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table nowrap scroll-horizontal-vertical">
                                    <thead>
                                    <tr>
                                        <th>Başlık</th>
                                        <th>Link</th>
                                        <th> Oluşturulma Tarihi</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($pages as $page)
                                    <tr class="myRow" data-content="{{$page->content}}">
                                        <td>{{$page['title']}}</td>
                                        <td>{{$page['link']}}</td>
                                        <td>{{$page['created_at']}}</td>
                                        <td>
                                            <a href="{{route('pages.edit',$page)}}" class="btn btn-primary"><i class="feather icon-edit"></i> Düzenle </a>
                                            <a href="{{route('pages.destroy',$page)}}" class="btn btn-danger" data-method="DELETE" data-confirm="Emin misiniz ?"><i class="feather icon-trash"></i> Sil </a>
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

    {{-- Modal --}}
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
             role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Sayfa İçeriği</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="messageContent">
                    </p>
                </div>
                <div class="modal-footer">
{{--                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kapat</button>--}}
                </div>
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
        $('.myRow').on('click',function () {
           const data = $(this).data('content');
           $('#messageContent').html(data);
            $('#exampleModalCenter').modal().show();

        });
    </script>
@endsection
