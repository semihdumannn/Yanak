
@extends('layouts/contentLayoutMaster')

@section('title', 'Form Yönetimi')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <p>Form Mesajları</p>
        </div>
    </div>
    <!-- Scroll - horizontal and vertical table -->
    <section id="horizontal-vertical">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Form Yönetimi</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">

                                <table class="table nowrap scroll-horizontal-vertical">
                                    <thead>
                                    <tr>
                                        <th>Tip</th>
                                        <th>Adı</th>
                                        <th>E-mail</th>
                                        <th>Durum</th>
                                        <th>Log</th>
                                        <th>Gönderim Tarihi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($forms as $form)
                                    <tr class="message @if($form['status'] == 0) bg-gradient-danger @endif " data-form="{{json_encode($form)}}">
                                        <td>{{$form['type_name']}}</td>
                                        <td>{{$form['name']}}</td>
                                        <td>{{$form['email']}}</td>
                                        <td>{{$form['status']}}</td>
                                        <td>{{$form['log']->message }}</td>
                                        <td>{{$form['created_at']}}</td>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">İletişim Form Mesajı</h5>
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
        $('.message').on('click',function () {
           const data = $(this).data('form');
           $('#messageContent').html(data.message);
            $('#exampleModalCenter').modal().show();

        });
    </script>
@endsection
