
@extends('layouts/contentLayoutMaster')

@section('title', 'Sayfa Güncelle')

@section('content')
    <!-- // Basic Floating Label Form section start -->
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$page->title}} Sayfasını Güncelle</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{ route('pages.update',$page) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" id="first-name-floating-icon" class="form-control" name="title" value="{{$page->title}}" placeholder="Başlık Giriniz" required >
                                                <div class="form-control-position">
                                                    <i class="feather icon-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" id="first-name-floating-icon" class="form-control" name="link" value="{{$page->link}}" placeholder="Link giriniz" >
                                                <div class="form-control-position">
                                                    <i class="feather icon-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <textarea class="form-control" cols="4" rows="4" name="content" placeholder="Html içerik">

                                                    {{$page->content}}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" name="order" value="{{$page->order}}"  class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <div class="custom-control custom-switch switch-lg custom-switch-success mr-2 mb-1">
                                                    <p class="mb-0">Durum</p>
                                                    <input type="checkbox" name="status" class="custom-control-input" id="customSwitch100" {{$page->status == 1 ?  'checked' : null}}>
                                                    <label class="custom-control-label" for="customSwitch100">
                                                        <span class="switch-text-left">Aktif</span>
                                                        <span class="switch-text-right">Pasif</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Kaydet</button>
                                            <a href="{{route('pages.index')}}" class="btn btn-outline-warning mr-1 mb-1">Geri</a>
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
