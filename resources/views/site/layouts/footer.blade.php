<div class="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-12 subscribe_cont">
                <div class="cont">
                    <img src="{{ surl('images/logo.png') }}" />
                </div>
                <form method="post" action="{{ route('site.subscribe') }}" class="subscribe-form">
                    @csrf
                    <h3>{{ app()->getLocale() == 'en' ? 'subscribe to newsletters' : 'النشرة الإخبارية' }}</h3>
                    <div class="form-group position-relative">
                        <input type="email" class="form-control" name="email"
                            placeholder=" {{ app()->getLocale() == 'en' ? 'Email Address' : 'البريد الإلكتروني' }}" />
                        <button class="link">
                            <i class="far fa-envelope"></i>
                            {{ app()->getLocale() == 'en' ? 'Subscribe' : 'إشترك الأن' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Footer
    ==========================================-->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <h3>{{ app()->getLocale() == 'en' ? 'Who We Are' : 'من نحن' }}</h3>
                <p>
                    {{ $settings->translate(app()->getLocale())->about }}
                </p>
                <ul class="social">
                    @foreach ($social_links as $link)
                        <li>
                            <a href="{{ $link->link }}" target="_blank"
                                class="icon {{ $link->name }}">{!! $link->icon !!}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-2">
                <h3>{{ app()->getLocale() == 'en' ? 'Projects' : ' المشاريع' }}</h3>
                <ul class="row">
                    @foreach (\App\Models\Project::all() as $project)
                        <li class="col-lg-12 col-md-4 col-sm-6">
                            <a href="{{ route('site.project', ['slug' => $project->slug]) }}">
                                {{ $project->translate(app()->getLocale())->name }} </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-2">
                <h3>{{ app()->getLocale() == 'en' ? 'Quick Links' : 'روابط سريعة' }}</h3>
                <ul class="row">
                    <li class="col-lg-12 col-md-4 col-sm-6">
                        <a href="{{ route('site.index') }}">
                            {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}
                        </a>
                    </li>
                    <li class="col-lg-12 col-md-4 col-sm-6">
                        <a href="{{ route('site.about') }}">
                            {{ app()->getLocale() == 'en' ? 'About us' : 'من نحن' }}</a>
                    </li>
                    <li class="col-lg-12 col-md-4 col-sm-6">
                        <a href="{{ route('site.blog') }}"> {{ app()->getLocale() == 'en' ? 'blog' : 'الأخبار' }}
                        </a>
                    </li>
                    <li class="col-lg-12 col-md-4 col-sm-6">
                        <a href="{{ route('site.contact') }}">
                            {{ app()->getLocale() == 'en' ? 'Contact' : 'تواصل معنا' }} </a>
                    </li>

                    <li class="col-lg-6 col-md-4 col-sm-6">
                        <a href="{{ route('site.careers') }}">
                            {{ app()->getLocale() == 'en' ? 'Career' : 'الوظائف' }} </a>
                    </li>
                    <li class="col-lg-12 col-md-3 col-sm-6">
                        <a href="{{ route('site.privacy') }}">
                            {{ app()->getLocale() == 'en' ? 'Privacy Policy' : 'سياسة الخصوصية' }} </a>
                    </li>
                </ul>


            </div>
            <div class="col-lg-4">
                <h3>{{ app()->getLocale() == 'en' ? 'contact info' : 'بيانات التواصل ' }}</h3>
                <ul class="contact_info">
                    <li>
                        <i class="fa fa-map-marker-alt"></i>
                        <a href="javascript:void(0)">
                            <span> {{ app()->getLocale() == 'en' ? 'Address' : 'العنوان' }} : </span>
                            <span>
                                {{ $settings->translate(app()->getLocale())->address }}
                            </span>
                        </a>
                    </li>
                    <li>
                        <i class="far fa-envelope"></i>
                        <a href="mailto:{{ $settings->email }}">
                            <span> {{ app()->getLocale() == 'en' ? 'Email Address' : 'البريد الإلكتروني' }} </span>
                            <span> {{ $settings->email }} </span>
                        </a>
                    </li>
                    <li>
                        <i class="far fa-clock"></i>
                        <a href="javascript:void(0)">
                            <span> {{ app()->getLocale() == 'en' ? 'Working Hours' : 'ساعات العمل' }} </span>
                            {{ $settings->translate(app()->getLocale())->hours }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--End Row-->
    </div>
    <!--End Container-->
    <div class="container-fluid copyrights">
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <p>{{ $settings->translate(app()->getLocale())->copyright }}</p>

                    <div class="power">
                        {{ app()->getLocale() == 'en' ? 'powered by' : 'تم بواسطة' }} : <a
                            href="https://brandbourne.com/" target="_blank"> <img
                                src="https://brandbourne.com/assets/site/images/fav-icon.png"> Brandbourne</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
@push('js')
    <script>
        $(document).on('submit', '.subscribe-form', function() {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            form.find(":submit").attr('disabled', true).html(
                "<i class='far fa-envelope'></i> {{ app()->getLocale() == 'en' ? 'Please wait' : 'برجاء الإنتظار' }} "
            );

            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    notification("success", response, "fas fa-check");
                    setTimeout(function() {
                        window.location.reload();
                    }, 2000);
                },
                error: function(jqXHR) {
                    var response = $.parseJSON(jqXHR.responseText);
                    notification("danger", response, "fas fa-times");
                    form.find(":submit").attr('disabled', false).html(
                        "<i class='far fa-envelope'></i> {{ app()->getLocale() == 'en' ? 'Subscribe' : 'إشترك الأن' }}"
                    );
                }
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });
            return false;
        });
    </script>
@endpush
