<footer class="footer-6">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-offset-1 col-sm-6">
                <a href="#">
                    <img class="logo" alt="logo" src="{{asset('assets/img/logo-square-light.png')}}">
                </a>
                <p>
                    {!! config('system.address') !!}
                </p>
                <p>
                    Telefon : {{ config('system.phone') }}<br>
                    E-mail : {{config('system.email')}}
                </p>

            </div>

            <div class="col-md-4 col-sm-6">
                <h5>Menü</h5>
                <ul>
{{--                    <li><a href="/urunler">Ürünler</a></li>--}}
{{--                    <li><a href="/iletisim">İletişim</a></li>--}}
                    @forelse($pages as $item)
                        <li><a href="/{{$item->page->link}}">{{$item->page->title}}</a></li>
                    @empty
                    @endforelse


                </ul>
            </div>

            <div class="col-md-4 col-sm-12">
                <h5>E-Bülten</h5>
                <p>
                    Haberler ve güncellemeler almak için bültenimize abone olun. Size spam göndermeyeceğimize söz
                    veriyoruz!
                </p>

                <form class="form-newsletter"
                      data-success="Teşekkürler, kısa süre içinde iletişime geçeceğiz."
                      data-error="Lütfen geçerli bir e-mail adresi giriniz">
                    <input type="hidden" name="type" value="2">
                    <input type="text" name="email"
                           class="validate-required validate-email input-standard signup-email-field text-black"
                           placeholder="E-mail adresiniz">
                    <input type="submit">
                    <i class="icon pe-7s-angle-right text-white"></i>
{{--                    <iframe class="mail-list-form"--}}
{{--                            srcdoc="<!-- Begin MailChimp Signup Form --> <link href=&quot;//cdn-images.mailchimp.com/embedcode/classic-081711.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot;> <style type=&quot;text/css&quot;> 	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; } 	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block. 	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */ </style> <div id=&quot;mc_embed_signup&quot;> <form action=&quot;//mrare.us8.list-manage.com/subscribe/post?u=77142ece814d3cff52058a51f&amp;amp;id=d4b3d090a4&quot; method=&quot;post&quot; id=&quot;mc-embedded-subscribe-form&quot; name=&quot;mc-embedded-subscribe-form&quot; class=&quot;validate&quot; target=&quot;_blank&quot; novalidate>     <div id=&quot;mc_embed_signup_scroll&quot;> 	<h2>Subscribe to our mailing list</h2> <div class=&quot;indicates-required&quot;><span class=&quot;asterisk&quot;>*</span> indicates required</div> <div class=&quot;mc-field-group&quot;> 	<label for=&quot;mce-EMAIL&quot;>Email Address  <span class=&quot;asterisk&quot;>*</span> </label> 	<input type=&quot;email&quot; value=&quot;&quot; name=&quot;EMAIL&quot; class=&quot;required email&quot; id=&quot;mce-EMAIL&quot;> </div> <div class=&quot;mc-field-group&quot;> 	<label for=&quot;mce-FNAME&quot;>First Name </label> 	<input type=&quot;text&quot; value=&quot;&quot; name=&quot;FNAME&quot; class=&quot;&quot; id=&quot;mce-FNAME&quot;> </div> <div class=&quot;mc-field-group&quot;> 	<label for=&quot;mce-LNAME&quot;>Last Name </label> 	<input type=&quot;text&quot; value=&quot;&quot; name=&quot;LNAME&quot; class=&quot;&quot; id=&quot;mce-LNAME&quot;> </div> 	<div id=&quot;mce-responses&quot; class=&quot;clear&quot;> 		<div class=&quot;response&quot; id=&quot;mce-error-response&quot; style=&quot;display:none&quot;></div> 		<div class=&quot;response&quot; id=&quot;mce-success-response&quot; style=&quot;display:none&quot;></div> 	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->     <div style=&quot;position: absolute; left: -5000px;&quot;><input type=&quot;text&quot; name=&quot;b_77142ece814d3cff52058a51f_d4b3d090a4&quot; tabindex=&quot;-1&quot; value=&quot;&quot;></div>     <div class=&quot;clear&quot;><input type=&quot;submit&quot; value=&quot;Subscribe&quot; name=&quot;subscribe&quot; id=&quot;mc-embedded-subscribe&quot; class=&quot;button&quot;></div>     </div> </form> </div> <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/assets/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script> <!--End mc_embed_signup-->">--}}
{{--                    </iframe>--}}
                </form>

            </div>
        </div><!--end of row-->

        <div class="row">
            <div class="col-xs-12">
                <div class="footer-lower">
                    <span>© Copyright {{date('Y').' '.config('system.title')}} - Made with</span><i
                            class="icon pe-7s-like"></i>
                    <a href="http://semihduman.com.tr" target="_blank"><span>Duman Software</span></a>
                </div>
            </div>
        </div>

    </div><!--end of container-->
</footer>