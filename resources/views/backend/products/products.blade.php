
@extends('layouts/contentLayoutMaster')

@section('title', 'Ürün Listesi')

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
                    <a href="{{route('products.create')}}" class="btn btn-success px-1 py-1 waves-effect waves-light">
                       <i class="feather icon-plus"></i> Ekle
                    </a>
                </div>
            </div>
        </div>
        {{-- dataTable starts --}}
        <div class="table-responsive">
            <table class="table data-thumb-view">
                <thead>
                <tr>
{{--                    <th>Resim</th>--}}
                    <th>Adı</th>
                    <th>Link</th>
                    <th>Kod</th>
{{--                    <th>Renk</th>--}}
{{--                    <th>Ücret</th>--}}
                    <th>İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $product)
                    <tr>
{{--                        <td class="product-img">--}}
{{--                            <a href="{{ asset($product->images()->first()->path ?? 'assets/img/hero25.jpg')  }}" target="_blank">--}}
{{--                                <img src="{{ asset($product->images()->first()->path ?? 'assets/img/hero25.jpg')  }}" alt="Img placeholder">--}}
{{--                            </a>--}}
{{--                        </td>--}}
                        <td class="product-name">{{ $product->title }}</td>
                        <td class="product-category"><a href="{{url('/'.$product->link)}}" target="_blank">{{ $product->link }}</a></td>
                        <td class="product-name">{{ $product->code }}</td>
                        {{--                        <td class="product-price">--}}
{{--                            <div class="chip chip-warning" style="background-color: {{$product->color->hexCode}} !important;">--}}
{{--                                <div class="chip-body">--}}
{{--                                    <div class="chip-text"> {{ $product->color->name }}</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                        <td class="product-price">{{ $product->price }}</td>--}}
                        <td class="product-action">
                            <a href="{{route('products.edit',$product)}}"><span class="action-edit"><i class="feather icon-edit"></i></span></a>
                            <a href="{{route('products.destroy',$product)}}" data-method="delete" data-confirm="Emin misiniz ?"><span class="action-delete"><i class="feather icon-trash"></i></span></a>
                            <a href="{{route('options.index',$product)}}"><span class="action-delete"><i class="feather icon-eye"></i></span></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{-- dataTable ends --}}
    </section>
    {{-- Data list view end --}}
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
@endsection
