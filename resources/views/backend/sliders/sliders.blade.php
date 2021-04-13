@extends('layouts/contentLayoutMaster')

@section('title', 'Slider Yönetimi')

@section('page-style')

@endsection
@section('content')
    <!-- Basic example and Profile cards section start -->
    <section id="basic-examples">
        <a class="btn btn-success btn-link ml-2 mb-2" href="{{ route('slider.create') }}"><i class="feather icon-plus"></i> Ekle </a>
        <div class="row match-height">
            @forelse($sliders as $slider)
            <div class="col-xl-6 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <img class="card-img-top img-fluid" src="{{ asset($slider->image->path) }}"
                             alt="Card image cap">
                        <div class="card-body">
                            <h5>{{$slider->name}}</h5>
                            @php($features = json_decode($slider->image->features))
                            <p class="card-text  mb-0"><strong>Boyut : </strong>{{$features->size}} KB</p>
                            <span class="card-text"><strong>Oluşturulma Tarih :</strong> {{$slider->created_at}}</span><br>
                            <span class="card-text"><strong>Uzantısı:</strong> {{$features->extension}}</span><br>
                            <span class="badge badge-{{$slider->status == 1 ? 'success' :'danger'}}">{{$slider->status == 1 ? 'Aktif' : 'Pasif'}}</span>
                            <div class="card-btns d-flex justify-content-between mt-2">
                                <a href="{{route('slider.edit',$slider)}}" class="btn gradient-light-primary text-white">Düzenle</a>
                                <a href="{{route('slider.destroy',$slider)}}" data-method="delete" data-confirm="Silmek İstediğinize Eminmisiniz?" class="btn btn-outline-primary">Sil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-xl-12 col-md-12 col-sm-12">
                    @include('panels.alert',['message' => 'Slider Bulunamadı.'])
                </div>
            @endforelse
            <!-- Profile Cards Ends -->
        </div>
    </section>
    <!-- // Basic example and Profile cards section end -->

@endsection
@section('page-script')

@endsection
