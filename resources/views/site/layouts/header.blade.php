<div class="top_header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul>
                    <li>
                        <a href="mailto:{{ $settings->email }}"><i class="far fa-envelope"></i>
                            {{ $settings->email }}
                        </a>
                    </li>
                    <li class="time">
                        <a href="javascript:void(0)"><i class="far fa-clock"></i>
                            {{ $settings->translate(app()->getLocale())->hours }}
                        </a>
                    </li>
                    <li class="call">
                        <a href="tel:{{ $settings->phone }}">
                            <i class="fa fa-phone-volume"></i>
                            <span> {{ $settings->phone }} </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Header==========================================-->
<header>
    <div class="container">
        <a href="{{ route('site.index') }}" class="navbar-brand">
            <img src="{{ surl('images/logo.png') }}" alt="Zaytoun Developments Logo" />
        </a>
        <div class="btns">
            @if (app()->getLocale() == 'en')
                <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}" class="icon"> AR </a>
            @else
                <a href="{{ LaravelLocalization::getLocalizedURL('en') }}" class="icon"> EN </a>
            @endif

            <button class="menu-btn icon" type="button" data-toggle="collapse" data-target="#main-nav">
                <i class="fa fa-bars"></i>
            </button>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <div class="collapse navbar-collapse" id="main-nav">
                <ul class="navbar-nav">
                    <li>
                        <a href="{{ route('site.index') }}"
                            class="{{ request()->routeIs('site.index') ? 'active' : '' }}">
                            {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}
                        </a>
                    </li>
                    <li><a class="{{ request()->routeIs('site.about') ? 'active' : '' }}"
                            href="{{ route('site.about') }}">
                            {{ app()->getLocale() == 'en' ? 'About us' : 'من نحن' }}</a></li>
                    <li class="dropdown">
                        <a href="#" class="extra {{ request()->routeIs('site.project') ? 'active' : '' }}"
                            data-toggle="dropdown">
                            {{ app()->getLocale() == 'en' ? 'our Projects' : 'المشاريع' }}
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @foreach (\App\Models\Category::orderBy('id', 'desc')->get() as $category)
                                <div class="sub_dropdown">
                                    <a href="#" class="extra" data-toggle="sub_dropdown">
                                        {{ $category->translate(app()->getLocale())->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu_sub" aria-labelledby="dropdownMenuButton">
                                        @foreach ($category->projects as $project)
                                            <a href="{{ route('site.project', ['slug' => $project->slug]) }}"
                                                class="dropdown-item">
                                                {{ $project->translate(app()->getLocale())->name }} </a>
                                        @endforeach

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </li>
                    <li><a href="{{ route('site.partners') }}"
                            class="{{ request()->routeIs('site.partners') ? 'active' : '' }}">
                            {{ app()->getLocale() == 'en' ? 'Partners' : 'شركائنا' }}
                        </a></li>
                    <li><a href="{{ route('site.blog') }}"
                            class="{{ request()->routeIs('site.blog') || request()->routeIs('site.article') ? 'active' : '' }}">
                            {{ app()->getLocale() == 'en' ? 'blog' : 'الأخبار' }}
                        </a></li>
                    <!-- <li><a href="team.html"> Team </a></li> -->
                    <li><a class="{{ request()->routeIs('site.contact') ? 'active' : '' }}"
                            href="{{ route('site.contact') }}">
                            {{ app()->getLocale() == 'en' ? 'Contact' : 'تواصل معنا' }} </a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<!--End Header-->
