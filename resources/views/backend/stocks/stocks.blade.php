@extends('layouts/contentLayoutMaster')

@section('title', 'Stok Modülü')

@section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <p>Stok Yönetim Modülü</p>
        </div>
    </div>

    <!-- Row grouping -->
    <section id="row-grouping">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ürün Listesi</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table row-grouping">
                                    <thead>
                                    <tr>
                                        <th>Renk</th>
                                        <th>Kalınlık</th>
                                        <th>Ürün Adı</th>
                                        <th>Stok Rulo</th>
                                        <th>Stok Kg</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($products as $product)
                                        @forelse($product->options as  $option)
                                            <tr class="option" data-option="{{json_encode(['stock' => $option->stock,'stock_kg' => $option->stock_kg,'id' => $option->id])}}">
                                                <td>{{$option->id.'-'.$option->color->name}}</td>
                                                <td>{{$option->thick->value}}</td>
                                                <td>{{$product->code.' - '.$product->title}}</td>
                                                <td>{{$option->stock}} Adet</td>
                                                <td>{{$option->stock_kg}} Kg</td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    @empty
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
    <!-- Row grouping -->

    <!-- Modal -->
    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Stok Düzenle</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="stockForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <label>Stok Rulo: </label>
                        <div class="form-group">
                            <input type="text" name="stock" placeholder="Stok Rulo" class="form-control" required>
                        </div>

                        <label>Stok Kg: </label>
                        <div class="form-group">
                            <input type="text" name="stock_kg" placeholder="Stok Kg" class="form-control" required>
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
    <script src="{{ asset(mix('vendors/js/tables/datatable/pdfmake.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/vfs_fonts.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.html5.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.print.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
@endsection
@section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset(mix('js/scripts/datatables/datatable.js')) }}"></script>

    <script !src="">

        $('.option').on('click',function () {

            const option = $(this).data('option');
           $('input[name=stock]').val(option.stock);
           $('input[name=stock_kg]').val(option.stock_kg);
           $('#stockForm').attr('action','/scms/stocks/'+option.id);
            $('#inlineForm').modal().show();
        });

    </script>
@endsection
