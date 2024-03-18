@extends('site.layouts.master')
@section('content')
    @php
    $description1 = explode("\n", $about->translate(app()->getLocale())->description1);
    @endphp
    <!-- Slider ==========================================-->
    <section class="page_head" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>{{ app()->getLocale() == 'en' ? 'About us' : 'من نحن' }}</h3>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}"> {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}
                            </a>
                        </li>
                        <li>{{ app()->getLocale() == 'en' ? 'About us' : 'من نحن' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Section-->
    <!-- About ==========================================-->
    <section class="about">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about_cont">
                        <div class="text">
                            <h1 data-aos="fade-up" data-aos-delay="30">
                                {{ $about->translate(app()->getLocale())->title1 }}
                            </h1>
                            @foreach ($description1 as $value)
                                <p data-aos="fade-up" data-aos-delay="50">
                                    {{ $value }}
                                </p>
                            @endforeach
                        </div>
                        <!--End Text-->
                        <img src="{{ get_image($about->image, 'about') }}" alt="About_img" data-aos="fade-up"
                            data-aos-delay="100" />
                        <div class="exper" data-aos="fade-up" data-aos-delay="120">
                            <span id="year">{{ $about->years }}</span>
                            {{ app()->getLocale() == 'en' ? 'years of experience' : 'سنوات من الخبرة' }}
                        </div>
                    </div>
                    <!--End div-->
                </div>
                <!--End Col-->
                <div class="col-12">
                    <div class="hint" data-aos="fade-up" data-aos-delay="150">
                        <h3>{!! $about->translate(app()->getLocale())->title2 !!}</h3>

                        <p>
                            {{ $about->translate(app()->getLocale())->description2 }}
                        </p>
                    </div>
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Section -->

    <section class="colored">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section_title" data-aos="fade-up" data-aos-delay="30">
                        <h3>
                            {{ app()->getLocale() == 'en' ? 'Zaytoun Heritage' : 'تراث zaytoun' }}
                        </h3>
                    </div>
                </div>
                @foreach ($heritages as $heritage)
                    <div class="col-lg-6">
                        <div class="block_img" data-aos="fade-up" data-aos-delay="60">
                            <img src="{{ get_image($heritage->image, 'heritages') }}" />
                            <div class="cont">
                                <h3>{{ $heritage->translate(app()->getLocale())->title }}</h3>
                                <p>
                                    {{ $heritage->translate(app()->getLocale())->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- About  ==========================================-->
    <section class="section_img">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="text aos-init aos-animate" data-aos="fade-up" data-aos-delay="30">
                        <h3>{{ app()->getLocale() == 'en' ? 'Mission' : 'مهمتنا' }}</h3>
                        <p>
                            {{ $about->translate(app()->getLocale())->mission }}
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text aos-init aos-animate" data-aos="fade-up" data-aos-delay="60">
                        <h3>{{ app()->getLocale() == 'en' ? 'Vision' : 'رؤيتنا' }}</h3>
                        <p>
                            {{ $about->translate(app()->getLocale())->vision }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About ==========================================-->
    <section class="about pb-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="about_cont ceo" data-aos="fade-up" data-aos-delay="30">
                        <div class="text">
                            <h3>{{ app()->getLocale() == 'en' ? 'Message from Our CEO' : 'رسالة رئيس مجلس الإدارة' }}
                            </h3>
                            {!! $about->translate(app()->getLocale())->message !!}
                        </div>
                        <!--End Text-->
                    </div>
                    <!--End div-->
                </div>
                <!--End Col-->
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Section -->
    <!-- About ==========================================-->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="30">
                    <div class="section_title">
                        <h3>{{ app()->getLocale() == 'en' ? 'Core Values' : 'القيم الأساسية' }}</h3>
                    </div>
                </div>
                <!--End col-->
                @foreach ($values as $value)
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="60">
                        <div class="core_item">
                            {!! $value->icon !!}
                            <div class="cont">
                                <h3>{{ $value->translate(app()->getLocale())->name }}</h3>
                                <p>
                                    {{ $value->translate(app()->getLocale())->description }}
                                </p>
                            </div>
                        </div>
                        <!--End Core Item-->
                    </div>
                @endforeach
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Section -->
@endsection
