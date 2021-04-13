<!-- BEGIN: Footer-->
@if($configData["mainLayoutType"] == 'horizontal')
    <footer class="footer {{ $configData['footerType'] }} footer-light navbar-shadow">
@else
    <footer class="footer {{ $configData['footerType'] }} footer-light">
@endif
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; {{date('Y')}}<a class="text-bold-800 grey darken-2" href="{{url('/')}}" target="_blank">Yanak Alüminyum,</a>All rights Reserved</span>
        <a href="http://semihduman.com.tr" target="_blank">
            <span class="float-md-right d-none d-md-block">Duman Software<i class="feather icon-heart pink"></i></span>
        </a>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->
