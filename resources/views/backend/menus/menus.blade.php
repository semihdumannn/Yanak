@extends('layouts/contentLayoutMaster')

@section('title', 'Menü')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/dragula.min.css')) }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/drag-and-drop.css')) }}">
@endsection
@section('content')
    <!-- Sortable lists section start -->
    <section id="sortable-lists">
        <div class="row">
            <!-- Basic List Group -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Header Menu Düzenle</h4>
                        <a class="btn btn-success btn-link ml-2 mb-2 myModal" href="#"><i class="feather icon-plus"></i>
                            Ekle</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>Header Menude bulunacak sayfalar</p>
                            <ul class="list-group" id="basic-list-group">
                                @forelse($headers as $menu)
                                    <li class="list-group-item" id="header_{{$menu->id}}"
                                        data-id="{{$menu->id}}" data-order="{{$menu->order}}">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="mt-0">{{ $menu->page->title }}</h5>
                                                <a href="{{route('menus.destroy',$menu->id)}}" data-method="delete"
                                                   data-confirm="Emin misiniz ?">
                                                    <i class="feather icon-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    @include('panels.alert',['message' => 'Header Menu de item bulunamadı'])
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Footer Menu Düzenle</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <p>Footer menüdeki bulunacak sayfalar</p>
                            <ul class="list-group" id="basic-list-group2">
                                @forelse($footers as $item)
                                    <li class="list-group-item">
                                        <div class="media">
                                            <div class="media-body">
                                                <h5 class="mt-0">{{$item->page->title}}</h5>
                                                <a href="{{route('menus.destroy',$item->id)}}" data-method="delete"
                                                   data-confirm="Emin misiniz ?">
                                                    <i class="feather icon-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    @include('panels.alert',['message' => 'Header Menu de item bulunamadı'])
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- // Sortable lists section end -->

    <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Menu Item Ekleme</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="colorForm" method="POST" action="{{route('menus.store')}}">
                    @csrf
                    <div class="modal-body">
                        <label>Sayfa Seç: </label>
                        <div class="form-group">
                            <select name="page_id" id="page_id" class="form-control">
                                @forelse($pages as $page)
                                    <option value="{{$page->id}}">{{$page->title}}</option>
                                @empty
                                    <option>Sayfa Bulunamadı</option>
                                @endforelse
                            </select>
                        </div>
                        <label>Menü Seç: </label>
                        <div class="form-group">
                            <select name="location" id="location" class="form-control">
                                <option value="header">Header Menu</option>
                                <option value="footer">Footer Menu</option>
                            </select>
                        </div>
                        <label for="order">Sıra</label>
                        <input type="text" name="order" class="form-control">

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
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/extensions/dragula.min.js')) }}"></script>
@endsection


@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/extensions/drag-drop.js')) }}"></script>

    <script>


        $('.myModal').on('click', function () {
            $('#inlineForm').modal().show();
        });

        const container = document.getElementById('basic-list-group');

        const rows = container.children;

        var nodeListForEach = function (array, callback, scope) {
            for (var i = 0; i < array.length; i++) {
                callback.call(scope, i, array[i]);
            }
        };

        var sortableTable = dragula([container]);

        sortableTable.on('dragend', function () {
            let dataList = [];
            nodeListForEach(rows, function (index, row) {
                row.dataset.order = index + 1;
                dataList[row.dataset.id] = row.dataset.order;
            });
            dataList[0] = rows[0].id.split('_')[0]

            update(dataList)


        });


        function update(data) {

            $.ajax({
                headers: {'X-CSRF-TOKEN': window.csrfToken},
                type: 'POST',
                url: '/scms/menus-order',
                data: {data},
                success: function (response) {
                    console.log(response);
                },
                error: function (err) {
                    console.log(err);
                }
            })
        }

    </script>
@endsection
