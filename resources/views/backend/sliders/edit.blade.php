
@extends('layouts/contentLayoutMaster')

@section('title', 'Form Layouts')

@section('content')


    <!-- // Basic Floating Label Form section start -->
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Slider Yükle</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{ route('slider.update',$slider) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                @php($features = json_decode($slider->image->features))
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="file" id="first-name-floating-icon" class="form-control" name="image" >
                                                <div class="form-control-position">
                                                    <i class="feather icon-file"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" id="first-name-floating-icon" class="form-control" name="name"  value="{{$slider->name}}" placeholder="Başlık Giriniz" required >
                                                <div class="form-control-position">
                                                    <i class="feather icon-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <textarea class="form-control" cols="4" rows="4" name="html" placeholder="Html içerik">
                                                    {{$features->html}}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" name="order" value="{{$slider->order}}"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group position-relative has-icon-left">
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
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Kaydet</button>
                                            <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Temizle</button>
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
