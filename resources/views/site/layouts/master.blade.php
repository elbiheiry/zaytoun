<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'en' ? 'ltr' : 'rtl' }}">
@include('site.layouts.head')

<body>
    <!-- Mouse Cursor
    ==========================================-->
    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- Loading
    ==========================================-->
    <div class="loading">
        <div class="load_cont">
            <div class="spin"></div>
            <img alt=""  src="{{ surl('images/logo_icon.png') }}"  />
        </div>
    </div>
    <!--End Loading-->
    @include('site.layouts.header')
    @yield('content')
    @include('site.layouts.footer')
    <!--End Footer-->
    <a href="#home" class="fa fa-angle-up up_btn icon"></a>

    @include('site.layouts.scripts')
</body>

</html>
