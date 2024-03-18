@extends('site.layouts.master')
@section('content')
    <!-- Slider ==========================================-->
    <section class="page_head" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>{{ app()->getLocale() == 'en' ? 'blog' : 'الأخبار' }}</h3>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}"> {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}
                            </a>
                        </li>
                        <li>{{ app()->getLocale() == 'en' ? 'blog' : 'الأخبار' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Section-->
    <!-- Section ==========================================-->
    <section class="colored">
        <div class="container">
            <div class="row inner">
                @php
                    $x = 30;
                @endphp
                @foreach ($articles as $article)
                    <div class="col-lg-4 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="{{ $x }}">
                        <div class="blog_item">
                            <a href="{{ route('site.article', ['slug' => $article->slug]) }}" class="cover">
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
                    @php
                        $x += 30;
                    @endphp
                @endforeach
            </div>
        </div>
        <!--End Container-->
    </section>
    <!--End Section -->
@endsection
