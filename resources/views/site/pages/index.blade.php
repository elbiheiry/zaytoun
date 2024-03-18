@extends('site.layouts.master')
@section('content')
    @php
    $description1 = explode("\n", $about->translate(app()->getLocale())->description1);
    @endphp
    <!-- Slider ==========================================-->
    <section class="main_section" id="home">
        <div id="main_section" class="carousel slide" data-ride="carousel" data-pause="false" data-interval="7000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="look_cont">
                        <h1 class="animated fadeInDown" style="animation-delay: 0.3s">
                            {{ $about->translate(app()->getLocale())->title1 }}
                        </h1>
                        <p class="animated fadeInDown" style="animation-delay: 0.6s">
                            {!! $description1[0] !!}
                        </p>
                        <a href="{{ route('site.about') }}" class="link animated fadeInDown" style="animation-delay: 0.9s">
                            {{ app()->getLocale() == 'en' ? 'More Details' : 'قراءة المزيد' }} <i
                                class="fa fa-angle-right"></i>
                        </a>
                    </div>
                </div>
                @foreach ($projects as $project)
                    <div class="carousel-item">
                        <div class="look_cont">
                            <h1 class="animated fadeInDown" style="animation-delay: 0.3s">
                                {{ $project->translate(app()->getLocale())->name }}
                            </h1>
                            <p class="animated fadeInDown" style="animation-delay: 0.6s">
                                {{ $project->translate(app()->getLocale())->brief }}
                            </p>
                            <a href="{{ route('site.project', ['slug' => $project->slug]) }}"
                                class="link animated fadeInDown" style="animation-delay: 0.9s">
                                {{ app()->getLocale() == 'en' ? 'More Details' : 'قراءة المزيد' }} <i
                                    class="fa fa-angle-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev icon" href="#main_section" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next icon" href="#main_section" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
            <ol class="carousel-indicators">
                <li data-target="#main_section" data-slide-to="0" class="active"></li>
                @foreach ($projects as $index => $project)
                    <li data-target="#main_section" data-slide-to="{{ $index + 1 }}"></li>
                @endforeach
            </ol>
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

                            <a href="{{ route('site.about') }}" class="link" data-aos="fade-up"
                                data-aos-delay="70">
                                {{ app()->getLocale() == 'en' ? 'Read More' : 'قراءة المزيد' }} <i
                                    class="fa fa-long-arrow-alt-right"></i>
                            </a>
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
    <!-- Projets ==========================================-->
    <section class="projects">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title aos-init aos-animate" data-aos="fade-up" data-aos-delay="30">
                        <h3>{{ app()->getLocale() == 'en' ? 'Our Projects' : 'مشاريعنا' }}</h3>
                        <p>
                            {{ $content->translate(app()->getLocale())->description1 }}
                        </p>
                    </div>
                    <!-- End Section Title-->
                </div>
                <!--End col-12 -->
            </div>
            <!--End Row -->
        </div>
        <div class="container">
            <div class="row gray_bc">
                @foreach ($projects as $project)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="60">
                        <div class="product_item">
                            <a href="{{ route('site.project', ['slug' => $project->slug]) }}" class="product_cover">
                                <img src="{{ get_image($project->image, 'projects') }}"
                                    alt="{{ $project->translate(app()->getLocale())->name }}" />
                                <i class="icon fa fa-long-arrow-alt-right"></i>
                            </a>
                            <div class="cont">
                                <h3>{{ $project->translate(app()->getLocale())->name }}</h3>
                                <p>
                                    {{ $project->translate(app()->getLocale())->brief }}
                                </p>
                                <a href="{{ route('site.project', ['slug' => $project->slug]) }}">
                                    {{ app()->getLocale() == 'en' ? 'Read More' : 'قراءة المزيد' }} <i
                                        class="fa fa-long-arrow-alt-right"></i>
                                </a>
                            </div>
                            <!--End Cont-->
                        </div>
                        <!--End Product ITem-->
                    </div>
                    <!--End Col-->
                @endforeach
            </div>

            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Section -->
    <!-- Section ==========================================-->
    <section class="colored">
        <div class="container">
            <div class="row position-relative">
                <div class="col-12" data-aos="fade-up" data-aos-delay="30">
                    <div class="section_title text-left">
                        <p class="ml-0">{{ app()->getLocale() == 'en' ? 'OUR LATEST NEWS' : 'أحدث الأخبار' }}
                        </p>
                        <h3>{{ app()->getLocale() == 'en' ? 'News And Articles' : 'الأخبار والمقالات' }}</h3>
                    </div>
                </div>
                <!--End col-->
                <div class="col-12" data-aos="fade-up" data-aos-delay="60">
                    <div class="owl-carousel owl-theme team_slider">
                        @foreach ($articles as $article)
                            <div class="item">
                                <div class="blog_item">
                                    <a href="{{ route('site.article', ['slug' => $article->slug]) }}"
                                        class="cover">
                                        <img alt="blog_img" src="{{ get_image($article->outer_image, 'articles') }}" />
                                    </a>
                                    <div class="cont">
                                        <span
                                            class="date">{{ \Jenssegers\Date\Date::parse($article->created_at)->format(' j F ') }}</span>
                                        <a href="{{ route('site.article', ['slug' => $article->slug]) }}">
                                            {{ $article->translate(app()->getLocale())->title }}
                                        </a>
                                        <p>
                                            {{ $article->translate(app()->getLocale())->brief }}
                                        </p>
                                        <a href="{{ route('site.article', ['slug' => $article->slug]) }}">
                                            {{ app()->getLocale() == 'en' ? 'Read More' : 'إقرأ المزيد' }} <i
                                                class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </div>
                                <!--End Blog-->
                            </div>
                        @endforeach
                    </div>
                </div>
                <a href="{{ route('site.blog') }}" class="more_btn" data-aos="fade-up" data-aos-delay="30">
                    {{ app()->getLocale() == 'en' ? 'More News' : 'المزيد من الأخبار' }} <i
                        class="fa fa-angle-right"></i>
                </a>
            </div>

            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Section -->
@endsection
