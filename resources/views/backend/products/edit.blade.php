@extends('layouts/contentLayoutMaster')

@section('title', 'Ürün Güncelle')

@section('content')
    <!-- // Basic Floating Label Form section start -->
    <section id="floating-label-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{$product->title}} Ürün Güncelle</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" action="{{ route('products.update',$product) }}"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="title">Ürün Adı</label>
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" id="title"
                                                       class="form-control"
                                                       name="title"
                                                       value="{{$product->title}}"
                                                       placeholder="Başlık Giriniz" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="link">Ürün Link</label>
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text"
                                                       id="link"
                                                       class="form-control"
                                                       name="link"
                                                       value="{{$product->link}}"
                                                       placeholder="Link giriniz">
                                                <div class="form-control-position">
                                                    <i class="feather icon-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="link">Ürün Kodu</label>
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text"
                                                       id="code"
                                                       class="form-control"
                                                       name="code"
                                                       value="{{$product->code}}"
                                                       placeholder="Kod giriniz" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="price">Ürün Fiyat</label>
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text" id="price" value="{{$product->price}}" class="form-control" name="price"
                                                       placeholder="Fiyat" required>
                                                <div class="form-control-position">
                                                    <i class="feather icon-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="width">Genişlik</label>
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text"
                                                       id="width"
                                                       class="form-control"
                                                       name="width"
                                                       value="{{$product->width}}"
                                                       placeholder="Genişlik">
                                                <div class="form-control-position">
                                                    <i class="feather icon-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="height">Yükseklik</label>
                                            <div class="form-label-group position-relative has-icon-left">
                                                <input type="text"
                                                       id="height"
                                                       class="form-control"
                                                       name="height"
                                                       value="{{$product->height}}"
                                                       placeholder="Yükseklik">
                                                <div class="form-control-position">
                                                    <i class="feather icon-tag"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label for="content">Ürün İçerik</label>
                                            <div class="form-label-group position-relative has-icon-left">
                                                <textarea class="form-control"
                                                          id="content"
                                                          cols="4"
                                                          rows="4"
                                                          name="content"
                                                          placeholder="Html içerik">
                                                    {{$product->content}}
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-label-group position-relative has-icon-left">
                                                <div class="custom-control custom-switch switch-lg custom-switch-success mr-2 mb-1">
                                                    <p class="mb-0">Durum</p>
                                                    <input type="checkbox"
                                                           name="status"
                                                           class="custom-control-input"
                                                           id="customSwitch100"
                                                            {{$product->status == 1 ? 'checked' : null}}>
                                                    <label class="custom-control-label" for="customSwitch100">
                                                        <span class="switch-text-left">Aktif</span>
                                                        <span class="switch-text-right">Pasif</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mb-1">Kaydet</button>
                                            <a href="{{route('products.index')}}"
                                               class="btn btn-outline-warning mr-1 mb-1">Geri</a>
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
    <!-- Modal -->
@endsection

