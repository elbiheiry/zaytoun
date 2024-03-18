@extends('site.layouts.master')
@section('content')
    <!-- Slider ==========================================-->
    <section class="page_head" id="home">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>{{ app()->getLocale() == 'en' ? 'Contact us' : 'تواصل معنا' }}</h3>
                    <ul>
                        <li>
                            <a href="{{ route('site.index') }}"> {{ app()->getLocale() == 'en' ? 'Home' : 'الرئيسية' }}
                            </a>
                        </li>
                        <li>{{ app()->getLocale() == 'en' ? 'Contact us' : 'تواصل معنا' }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Section-->
    <section class="colored contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact_form">
                        <div class="section_title">
                            <h2 data-aos="fade-up" data-aos-delay="50">
                                {{ app()->getLocale() == 'en' ? 'Get In Touch' : 'تواصل معنا' }}</h2>
                        </div>
                        <form data-aos="fade-up" data-aos-delay="150" method="post" action="{{ route('site.contact') }}"
                            class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> {{ app()->getLocale() == 'en' ? 'Your name' : 'الإسم بالكامل' }} </label>
                                        <input type="text" class="form-control" name="name" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'Email Address' : 'البريد الإلكتروني' }}</label>
                                        <input type="text" class="form-control" name="email" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> {{ app()->getLocale() == 'en' ? 'Phone Number' : 'رقم الهاتف' }}</label>
                                        <input type="text" class="form-control" name="phone" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label> {{ app()->getLocale() == 'en' ? 'Subject' : 'عنوان الرسالة' }} </label>
                                        <input type="text" class="form-control" name="subject" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ app()->getLocale() == 'en' ? 'Message' : 'رسالتك' }}</label>
                                        <textarea class="form-control" name="message"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button class="link" type="submit">
                                <span>{{ app()->getLocale() == 'en' ? 'Send Message' : 'إرسل رسالتك' }} <i
                                        class="fa fa-long-arrow-alt-right"></i></span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <iframe src="{{ $settings->map }}" width="100%" height="560" style="border: 0" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            <!--End Row-->
        </div>
        <!--End Container-->
    </section>
@endsection
@push('js')
    <script>
        $(document).on('submit', '.contact-form', function() {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            form.find(":submit").attr('disabled', true).html(
                "<span>{{ app()->getLocale() == 'en' ? 'Please wait' : 'برجاء الإنتظار' }}  <i class='fa fa-long-arrow-alt-right'> </i></span>"
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
                        "<span>{{ app()->getLocale() == 'en' ? 'Send Message' : 'إرسل رسالتك' }} <i class='fa fa-long-arrow-alt-right'> </i></span>"
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
