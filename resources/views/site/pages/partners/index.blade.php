@extends('site.layouts.master')
@section('content')
    <!-- Slider ==========================================-->
    <section class="page_head" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>{{ app()->getLocale() == 'en' ? 'Partners' : 'شركائنا' }}</h3>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}"> {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}
                            </a>
                        </li>
                        <li>{{ app()->getLocale() == 'en' ? 'Partners' : 'شركائنا' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="hint" data-aos="fade-up" data-aos-delay="30">
                        <h3>{{ app()->getLocale() == 'en' ? 'Success' : 'شركاء' }}
                            <span>{{ app()->getLocale() == 'en' ? 'Partners' : 'النجاح' }}</span>
                        </h3>
                        <p>
                            {{ $content->translate(app()->getLocale())->description2 }}
                        </p>
                    </div>
                </div>
                <div class='w-100' style="height: 50px"></div>
                @php
                    $x = 60;
                @endphp
                @foreach ($partners as $partner)
                    <div class="col-lg-3 col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="{{ $x }}">
                        <div class="client_item">
                            <img src="{{ get_image($partner->image, 'partners') }}">
                        </div>
                    </div>
                    @php
                        $x += 30;
                    @endphp
                @endforeach
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Section -->
@endsection
