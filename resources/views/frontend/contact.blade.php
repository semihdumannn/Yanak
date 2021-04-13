@extends('layouts.master')

@section('title','İletişim')

@section('content')
    <section class="fullwidth-map">
        <div class="map-holder">
            <iframe src="{{config('system.maps')}}"></iframe>
        </div>
    </section>
    <section class="contact-2">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="text-block">
                        <div class="detail-line"></div>
                        <h5>İletişim</h5>
                        <h4>Bizimle iletişime geçin</h4>
                        <p>
                           Bize her türlü soru , görüş ve önerilerinizi sitemiz üzerinden ve diğer sosyal medya hesaplarımızdan iletebilirsiniz.
                        </p>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="contact-method">
                        <i class="icon pe-7s-phone"></i>
                        <span>{{ config('system.phone') }}</span>
                    </div>

                    <div class="contact-method">
                        <i class="icon pe-7s-mail-open-file"></i>
                        <span>{{config('system.email')}}</span>
                    </div>

                    <div class="contact-method">
                        <i class="icon pe-7s-map-marker"></i>
                        <span>{{config('system.address')}}</span>
                    </div>
                </div>

                <div class="col-md-5 col-sm-12">
                    <form class="form-email" id="contactForm" data-success="Teşekkürler, kısa süre içinde iletişime geçeceğiz" data-error="Lütfen tüm alanları doğru doldurun">
                        <input type="hidden" name="type" value="1">
                        <input class="input-standard validate-required" type="text" name="name" placeholder="Adınız">
                        <input class="input-standard validate-email validate-required" type="email" name="email" placeholder="E-mail adresiniz">
                        <textarea class="input-standard validate-required" name="message" placeholder="Mesajınız" rows="4"></textarea>
                        <input type="submit" class="btn btn-sm" value="Mesaj Gönder">
                    </form>
                </div>

            </div><!--end of row-->
        </div><!--end of container-->
    </section>

@endsection
