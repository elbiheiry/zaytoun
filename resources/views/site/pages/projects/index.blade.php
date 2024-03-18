@extends('site.layouts.master')
@section('content')
    <!-- Slider ==========================================-->
    <section class="page_head" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>{{ $project->translate(app()->getLocale())->name }}</h3>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}"> {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}
                            </a>
                        </li>
                        <li>{{ $project->translate(app()->getLocale())->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Section-->
    <!-- Team ==========================================-->
    <section class="colored">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @if (sizeof($project->images) > 0)
                    <div class="prject_gallery" data-aos="fade-up" data-aos-delay="60">
                        <div class="owl-carousel owl-theme project_slider">
                            @foreach ($project->images as $image)
                                <div class="item">
                                    <a href="{{ get_image($image->image, 'projects') }}" data-fancybox="gallery">
                                        <img src="{{ get_image($image->image, 'projects') }}" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    <!-- Project Gallery-->
                    <div class="project_info">
                        {!! $project->translate(app()->getLocale())->description !!}
                    </div>
                    @if($project->map)
                        <div class="project_info">
                            <iframe src="{{$project->map}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    @endif
                </div>
                <!--End Col-->
                <div class="col-lg-3">
                    <div class="side_info">
                        <h3>{{ $project->translate(app()->getLocale())->name }}</h3>
                        <ul>
                            <li>
                                <i class="fa fa-map-marker-alt"></i>
                                <div class="cont">
                                    <span> {{ app()->getLocale() == 'en' ? 'Location' : 'الموقع' }} </span>
                                    {{ $project->translate(app()->getLocale())->location }}
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-puzzle-piece"></i>
                                <div class="cont">
                                    <span> {{ app()->getLocale() == 'en' ? 'Project Sector' : 'قطاع المشروع' }} </span>
                                    {{ $project->translate(app()->getLocale())->sector }}
                                </div>
                            </li>
                            <li>
                                <i class="fas fa-ruler-combined"></i>
                                <div class="cont">
                                    <span> {{ app()->getLocale() == 'en' ? 'Project Size' : 'مساحة المشروع' }} </span>
                                    {{ $project->size }} {{ app()->getLocale() == 'en' ? 'KM²' : 'كم مربع' }}
                                </div>
                            </li>
                        </ul>
                        @if($project->brochure)
                            <a href="{{ get_image($project->brochure, 'projects') }}" target="_blank" download="">
                                <i class="fa fa-download"></i>
                                {{ app()->getLocale() == 'en' ? 'Download Brochure' : 'تحميل الملف التعريفي' }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Section-->
    <!-- Projets ==========================================-->
    <section class="projects" hidden>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section_title aos-init aos-animate" data-aos="fade-up" data-aos-delay="30">
                        <h3>Related Projects</h3>
                        <p>
                            Getting the best international ideas of designs to be executed
                            in Egypt
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
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="60">
                    <div class="product_item">
                        <a href="project.html" class="product_cover">
                            <img src="assets/images/inizo.jpg" alt="inizo" />
                            <i class="icon fa fa-long-arrow-alt-right"></i>
                        </a>
                        <div class="cont">
                            <h3>INIZIO</h3>
                            <p>
                                INIZIO is a 7-floor administrative and healthcare centre,
                                built on 4900 SM, and located at the heart of the New
                                Administrative Capital
                            </p>
                            <a href="project.html">
                                Read More <i class="fa fa-long-arrow-alt-right"></i>
                            </a>
                        </div>
                        <!--End Cont-->
                    </div>
                    <!--End Product ITem-->
                </div>
                <!--End Col-->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="60">
                    <div class="product_item">
                        <a href="project.html" class="product_cover">
                            <img src="assets/images/zamall.jpg" alt="zamall" />
                            <i class="icon fa fa-long-arrow-alt-right"></i>
                        </a>
                        <div class="cont">
                            <h3>Za Mall</h3>
                            <p>
                                Za Mall is a five-floor building, placed just near the Main
                                Entrance to highlight the magnitudes of smooth accessibility
                                and easy traffic
                            </p>
                            <a href="project.html">
                                Read More <i class="fa fa-long-arrow-alt-right"></i>
                            </a>
                        </div>
                        <!--End Cont-->
                    </div>
                    <!--End Product ITem-->
                </div>
                <!--End Col-->
            </div>

            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
    <!--End Section -->
@endsection
