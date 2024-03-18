@extends('site.layouts.master')
@section('content')
    <!-- Slider ==========================================-->
    <section class="page_head" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>{{ app()->getLocale() == 'en' ? 'Careers' : 'الوظائف' }}</h3>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}"> {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}
                            </a>
                        </li>
                        <li>{{ app()->getLocale() == 'en' ? 'careers' : 'الوظائف' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="career">
                        {!! $content->translate(app()->getLocale())->description3 !!}
                    </div>
                </div>
                <div class="col-lg-5">
                    <form class="job_form" data-aos="fade-up" data-aos-delay="30" method="post"
                        action="{{ route('site.careers.apply') }}">
                        @csrf
                        @method('post')
                        <div class="form_title">{{ app()->getLocale() == 'en' ? 'Apply For a Job' : 'تقدم للوظيفة' }}
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control"
                                placeholder="{{ app()->getLocale() == 'en' ? 'Your name' : 'الإسم بالكامل' }}"
                                name="name" />
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control"
                                placeholder="{{ app()->getLocale() == 'en' ? 'Email Address' : 'البريد الإلكتروني' }}"
                                name="email" />
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control"
                                placeholder="{{ app()->getLocale() == 'en' ? 'Phone Number' : 'رقم الهاتف' }}"
                                name="phone" />
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control"
                                placeholder="{{ app()->getLocale() == 'en' ? 'Job Title' : 'المسمي الوظيفي' }}"
                                name="title" />
                        </div>

                        <div class="form-group">
                            <label> {{ app()->getLocale() == 'en' ? 'Upload CV' : 'تحميل السيرة الذاتية' }} </label>
                            <input type="file" name="cv" />
                        </div>

                        <button class="link">
                            {{ app()->getLocale() == 'en' ? 'Apply Now' : 'تقدم الان' }} <i
                                class="fa fa-long-arrow-alt-right"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
@endsection
@push('js')
    <script>
        $(document).on('submit', '.job_form', function() {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            form.find(":submit").attr('disabled', true).html(
                "{{ app()->getLocale() == 'en' ? 'Please wait' : 'برجاء الإنتظار' }} <i class='fa fa-long-arrow-alt-right'> </i>"
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
                        "{{ app()->getLocale() == 'en' ? 'Apply Now' : 'تقدم الان' }} <i class='fa fa-long-arrow-alt-right'> </i>"
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
