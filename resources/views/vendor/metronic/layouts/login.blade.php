<!DOCTYPE html>
<html lang="en">

    <!-- begin::Head -->
    <head>
        <meta charset="utf-8" />
        <title>{{ __('controlpanel.login.title') }}</title>
        <meta name="description" content="Latest updates and statistic charts">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <!--begin::Base Styles -->
        

        <link href="{{ asset('vendor/metronic/assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('vendor/metronic/assets/demo/default/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('/css/mystyles.css') }}" rel="stylesheet" type="text/css" />
        @stack('css')
    </head>

    <!-- end::Head -->

    <!-- begin::Body -->
    <body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

        <!-- begin:: Page -->
        <div class="m-grid m-grid--hor m-grid--root m-page">
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-2" id="m_login" style="background-image: url({{ asset('vendor/metronic/assets/app/media/img//bg/bg-3.jpg') }})">
                <div class="m-grid__item m-grid__item--fluid    m-login__wrapper">
                    <div class="m-login__container">
                        <div class="m-login__logo">
                            <a href="#">
                                <img src="{{ asset('img/framgia.jpg') }}">
                            </a>
                        </div>
                        <div class="m-login__signin">
                            <div class="m-login__head">
                                <h3 class="m-login__title">{{ __('controlpanel.login.sign_in') }}</h3>
                            </div>
                            {!! Form::open(['method' => 'POST', 'routes' => 'login', 'class' => 'm-login__form m-form']) !!}
                                <div class="form-group m-form__group">
                                    {!! Form::text('email', null, ['class' => 'form-control m-input', 'placeholder' => 'Email', 'autocomplete' => 'off']) !!}
                                </div>
                                <div class="form-group m-form__group">
                                    {!! Form::password('password', ['class' => 'form-control m-input m-login__form-input--last', 'placeholder' => 'Password']) !!}
                                </div>
                                <div class="row m-login__form-sub">
                                    <div class="col m--align-left m-login__form-left">
                                        <label class="m-checkbox  m-checkbox--focus">
                                            {!! Form::checkbox('remember') !!}
                                            {!! __('controlpanel.login.remember_me') !!}
                                            <span></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="m-login__form-action">
                                    {!! Form::submit(__('controlpanel.login.login_button'), ['class' => 'btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary', 'id' => 'm_login_signin_submit']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Page -->

        <!--begin::Base Scripts -->
        <script src="{{ asset('vendor/metronic/assets/vendors/base/vendors.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/metronic/assets/demo/default/base/scripts.bundle.js') }}" type="text/javascript"></script>
        <!--end::Base Scripts -->

        <!--begin::Page Snippets -->
        @stack('js')
        <!--end::Page Snippets -->
    </body>

    <!-- end::Body -->
</html>
