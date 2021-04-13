@extends('layouts/contentLayoutMaster')

@section('title', 'Ayarlar')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel='stylesheet' href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel='stylesheet' href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/noui-slider.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/core/colors/palette-noui.css')) }}">
@endsection

@section('content')
    <!-- account setting page start -->
    <section id="page-account-settings">
        <div class="row">
            <!-- left menu section -->
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column mt-md-0 mt-1">
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75 active" id="account-pill-general" data-toggle="pill"
                           href="#account-vertical-general" aria-expanded="true">
                            <i class="feather icon-globe mr-50 font-medium-3"></i>
                            Genel Ayarlar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-password" data-toggle="pill"
                           href="#account-vertical-password" aria-expanded="false">
                            <i class="feather icon-lock mr-50 font-medium-3"></i>
                            Mail Ayarları
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-info" data-toggle="pill"
                           href="#account-vertical-info"
                           aria-expanded="false">
                            <i class="feather icon-info mr-50 font-medium-3"></i>
                            Site Ayarları
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-social" data-toggle="pill"
                           href="#account-vertical-social"
                           aria-expanded="false">
                            <i class="feather icon-camera mr-50 font-medium-3"></i>
                            Sosyal Medya
                        </a>
                    </li>
                    {{--                    <li class="nav-item">--}}
                    {{--                        <a class="nav-link d-flex py-75" id="account-pill-connections" data-toggle="pill"--}}
                    {{--                           href="#account-vertical-connections" aria-expanded="false">--}}
                    {{--                            <i class="feather icon-feather mr-50 font-medium-3"></i>--}}
                    {{--                            Connections--}}
                    {{--                        </a>--}}
                    {{--                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link d-flex py-75" id="account-pill-notifications" data-toggle="pill"
                           href="#account-vertical-notifications" aria-expanded="false">
                            <i class="feather icon-message-circle mr-50 font-medium-3"></i>
                            Bildirimler
                        </a>
                    </li>
                </ul>
            </div>
            <!-- right content section -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                                     aria-labelledby="account-pill-general" aria-expanded="true">
                                    <div class="media">
                                        <a href="javascript: void(0);">
                                            <img src="{{ asset('images/portrait/small/avatar-s-12.jpg') }}"
                                                 class="rounded mr-75"
                                                 alt="profile image" height="64" width="64">
                                        </a>
                                        <div class="media-body mt-75">
                                            <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer"
                                                       for="account-upload">Upload new photo</label>
                                                <input type="file" id="account-upload" hidden>
                                                <button class="btn btn-sm btn-outline-warning ml-50">Reset</button>
                                            </div>
                                            <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max
                                                    size of
                                                    800kB</small></p>
                                        </div>
                                    </div>
                                    <hr>
                                    <form novalidate method="POST" action="{{route('settings.update')}}">
                                        @csrf
                                        <input type="hidden" name="type" value="1">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-username">Şirket Adı</label>
                                                        <input type="text" name="name" class="form-control"
                                                               id="account-username" placeholder="Username"
                                                               value="{{config('system.name')}}" required
                                                               data-validation-required-message="Bu alan zorunlundur.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-name">Başlık</label>
                                                        <input type="text" name="title" class="form-control"
                                                               id="account-name" placeholder="Name"
                                                               value="{{config('system.title')}}" required
                                                               data-validation-required-message="Bu alan zorunludur.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-e-mail">E-mail</label>
                                                        <input type="email" name="email" class="form-control"
                                                               id="account-e-mail" placeholder="Email"
                                                               value="{{config('system.email')}}" required
                                                               data-validation-required-message="This email field is required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-company">Telefon</label>
                                                    <input type="text" name="phone" class="form-control"
                                                           id="account-company"
                                                           value="{{config('system.phone')}}"
                                                           placeholder="Company name">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-company">Adres</label>
                                                    <textarea type="text" name="address" class="form-control"
                                                              id="account-company">
                                                        {{ config('system.address') }}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                    Kaydet
                                                </button>
                                                <button type="reset" class="btn btn-outline-warning">İptal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                                     aria-labelledby="account-pill-password" aria-expanded="false">
                                    <form novalidate method="POST" action="{{route('settings.update')}}">
                                        @csrf
                                        <input type="hidden" name="type" value="2">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-old-password">Tip</label>
                                                        <input type="text" name="mail_type"
                                                               value="{{ config('system.mail_type') }}"
                                                               class="form-control" id="account-old-password">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-old-password">Host</label>
                                                        <input type="text" name="mail_host"
                                                               value="{{config('system.mail_host')}}"
                                                               class="form-control" id="account-old-password" required
                                                               placeholder="Old Password"
                                                               data-validation-required-message="Bu alan zorunludur.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-new-password">Kullanıcı Adı</label>
                                                        <input type="text" name="mail_username"
                                                               value="{{config('system.mail_username')}}"
                                                               id="account-new-password" class="form-control"
                                                               placeholder="New Password" required
                                                               data-validation-required-message="Bu alan zorunludur.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-retype-new-password">
                                                            Şifre
                                                        </label>
                                                        <input type="text" name="mail_password" class="form-control"
                                                               required
                                                               id="account-retype-new-password"
                                                               value="{{config('system.mail_password')}}"
                                                               data-validation-required-message="Bu alan zorunludur.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-retype-new-password">
                                                            Port
                                                        </label>
                                                        <input type="text" name="mail_port" class="form-control"
                                                               required
                                                               id="account-retype-new-password"
                                                               value="{{config('system.mail_port')}}"
                                                               data-validation-required-message="Bu alan zorunludur.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <div class="controls">
                                                        <label for="account-retype-new-password">
                                                            Güvenlik
                                                        </label>
                                                        <input type="text" name="mail_ssl"
                                                               value="{{config('system.mail_ssl')}}"
                                                               class="form-control" required
                                                               id="account-retype-new-password"
                                                               data-validation-required-message="Bu alan zorunludur.">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                    Kaydet
                                                </button>
                                                <button type="reset" class="btn btn-outline-warning">İptal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="account-vertical-info" role="tabpanel"
                                     aria-labelledby="account-pill-info"
                                     aria-expanded="false">
                                    <form novalidate method="POST" action="{{ route('settings.update') }}">
                                        <input type="hidden" name="type" value="4">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="accountTextarea">Meta</label>
                                                    <textarea name="meta" class="form-control" id="accountTextarea"
                                                              rows="3">
                                                        {{ config('system.seo.meta') }}
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="accountTextarea">GTM</label>
                                                    <textarea name="gtm" class="form-control" id="accountTextarea" rows="3">
                                                        {{ config('system.seo.gtm') }}
                                                    </textarea>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="accountTextarea">Maps</label>
                                                    <textarea name="maps" class="form-control" id="accountTextarea"
                                                              rows="3">
                                                        {{ config('system.maps') }}
                                                    </textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                    Kaydet
                                                </button>
                                                <button type="reset" class="btn btn-outline-warning">İptal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade " id="account-vertical-social" role="tabpanel"
                                     aria-labelledby="account-pill-social" aria-expanded="false">
                                    <form novalidate method="POST" action="{{route('settings.update')}}">
                                        @csrf
                                        <input type="hidden" name="type" value="3">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-twitter">Twitter</label>
                                                    <input type="text" name="twitter" id="account-twitter"
                                                           class="form-control"
                                                           value="{{config('system.socailMedya.twitter')}}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-facebook">Facebook</label>
                                                    <input type="text" name="facebook" id="account-facebook"
                                                           class="form-control"
                                                           value="{{config('system.socailMedya.facebook')}}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-linkedin">LinkedIn</label>
                                                    <input type="text" name="linkedin" id="account-linkedin"
                                                           class="form-control"
                                                           value="{{config('system.socailMedya.linkedin')}}">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="account-instagram">Instagram</label>
                                                    <input type="text" name="instagram" id="account-instagram"
                                                           class="form-control"
                                                           value="{{config('system.socailMedya.instagram')}}">
                                                </div>
                                            </div>
                                            <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                                <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">
                                                    Kaydet
                                                </button>
                                                <button type="reset" class="btn btn-outline-warning">İptal</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="account-vertical-connections" role="tabpanel"
                                     aria-labelledby="account-pill-connections" aria-expanded="false">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <a href="javascript: void(0);" class="btn btn-info">Connect to
                                                <strong>Twitter</strong></a>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <button class=" btn btn-sm btn-secondary float-right">edit</button>
                                            <h6>You are connected to facebook.</h6>
                                            <span>Johndoe@gmail.com</span>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <a href="javascript: void(0);" class="btn btn-danger">Connect to
                                                <strong>Google</strong>
                                            </a>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <button class=" btn btn-sm btn-secondary float-right">edit</button>
                                            <h6>You are connected to Instagram.</h6>
                                            <span>Johndoe@gmail.com</span>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                changes
                                            </button>
                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel"
                                     aria-labelledby="account-pill-notifications" aria-expanded="false">
                                    <div class="row">
                                        <h6 class="m-1">Activity</h6>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" checked
                                                       id="accountSwitch1">
                                                <label class="custom-control-label mr-1" for="accountSwitch1"></label>
                                                <span class="switch-label w-100">Email me when someone comments
                          onmy
                          article</span>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" checked
                                                       id="accountSwitch2">
                                                <label class="custom-control-label mr-1" for="accountSwitch2"></label>
                                                <span class="switch-label w-100">Email me when someone answers on
                          my
                          form</span>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="accountSwitch3">
                                                <label class="custom-control-label mr-1" for="accountSwitch3"></label>
                                                <span class="switch-label w-100">Email me hen someone follows
                          me</span>
                                            </div>
                                        </div>
                                        <h6 class="m-1">Application</h6>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" checked
                                                       id="accountSwitch4">
                                                <label class="custom-control-label mr-1" for="accountSwitch4"></label>
                                                <span class="switch-label w-100">News and announcements</span>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" id="accountSwitch5">
                                                <label class="custom-control-label mr-1" for="accountSwitch5"></label>
                                                <span class="switch-label w-100">Weekly product updates</span>
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="custom-control custom-switch custom-control-inline">
                                                <input type="checkbox" class="custom-control-input" checked
                                                       id="accountSwitch6">
                                                <label class="custom-control-label mr-1" for="accountSwitch6"></label>
                                                <span class="switch-label w-100">Weekly blog digest</span>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                            <button type="submit" class="btn btn-primary mr-sm-1 mb-1 mb-sm-0">Save
                                                changes
                                            </button>
                                            <button type="reset" class="btn btn-outline-warning">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- account setting page end -->
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/forms/validation/jqBootstrapValidation.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/dropzone.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/account-setting.js')) }}"></script>
@endsection