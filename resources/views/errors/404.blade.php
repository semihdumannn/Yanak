@extends('layouts.master')
@section('title','404 Sayfa Bulunamadı')
@section('content')
    <section class="error-page fullscreen-element">

        <div class="container vertical-align">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <i class="pe-7s-help2"></i>
                    <h1 class="text-white">404 - Sayfa Bulunmadı!</h1>
                    <p class="text-white super-lead">Aradığınız sayfa silinmiş yada hiç yoktur.Lütfen linki kontrol edip tekrar deneyiniz.</p>
                    <a href="/" class="btn btn-white">Anasayfa</a>

                </div>
            </div><!--end of row-->
        </div><!--end of container-->

    </section>
@endsection


