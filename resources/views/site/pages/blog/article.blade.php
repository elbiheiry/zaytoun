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
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog">
                        <h3>{{ $article->translate(app()->getLocale())->title }}</h3>
                        <h4 class="date">
                            {{ \Jenssegers\Date\Date::parse($article->created_at)->format(' jS F Y') }}</h4>
                        <div class="article-image">
                            <img src="{{ get_image($article->inner_image, 'articles') }}" alt="image" />
                        </div>

                        {!! $article->translate(app()->getLocale())->description !!}
                    </div>

                    <div class="share">
                        <h4>{{ app()->getLocale() == 'en' ? 'Share The Article' : 'مشاركة هذا المنشور' }}:</h4>

                        <!-- AddToAny BEGIN -->
                        {{-- <div class="a2a_kit a2a_kit_size_32 a2a_default_style">
                            <a class="a2a_dd" href="https://www.addtoany.com/share"></a>
                            <a class="a2a_button_facebook"></a>
                            <a class="a2a_button_twitter"></a>
                            <a class="a2a_button_linkedin"></a>
                            <a class="a2a_button_telegram"></a>
                            <a class="a2a_button_whatsapp"></a>
                        </div> --}}
                        <script async src="https://static.addtoany.com/menu/page.js"></script>
                        <!-- AddToAny END -->
                        <ul class="social a2a_kit">
                            <li>
                                <a class="a2a_button_facebook"></a>
                            </li>
                            <li>
                                <a class="a2a_button_twitter"></a>
                            </li>
                            <li>
                                <a class="a2a_button_linkedin"></a>
                            </li>
                            <li>
                                <a class="a2a_button_telegram"></a>
                            </li>
                            <li>
                                <a class="a2a_button_whatsapp"></a>
                            </li>
                        </ul>
                    </div>

                    @foreach ($article->comments as $comment)
                        <div class="article-comments">
                            <div class="comments-list">
                                <img src="{{ $comment->user_image() }}" alt="image" />
                                <h5>{{ $comment->name }}, <span> {{ $comment->created_at->diffForHumans() }}</span>
                                </h5>
                                <p>
                                    {{ $comment->comment }}
                                </p>
                            </div>
                        </div>
                    @endforeach

                    <div class="article-leave-comment">
                        <h3>{{ app()->getLocale() == 'en' ? 'Leave a reply' : 'إترك تعليقك' }}</h3>

                        <form method="post" action="{{ route('site.comment', ['id' => $article->id]) }}"
                            class="comment-form">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name"
                                            placeholder="{{ app()->getLocale() == 'en' ? 'Enter name' : 'إدخل الإسم بالكامل' }}" />
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="email"
                                            placeholder="{{ app()->getLocale() == 'en' ? 'Email address' : 'البريد الإلكتروني' }}" />
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="comment"
                                            placeholder="{{ app()->getLocale() == 'en' ? 'Your message' : 'أضف رسالتك' }}"></textarea>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit"
                                        class="link">{{ app()->getLocale() == 'en' ? 'Post A Comment' : 'أضف تعليقك' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="related">
                        <h3>{{ app()->getLocale() == 'en' ? 'Related News' : 'المقالات المتعلقه' }}</h3>
                        <ul>
                            @foreach ($related_articles as $related_article)
                                <li>
                                    <a href="{{ route('site.article', ['slug' => $related_article->slug]) }}"
                                        class="list_item">
                                        <img src="{{ get_image($related_article->outer_image, 'articles') }}" />
                                        <div class="cont">
                                            <p>{{ $related_article->translate(app()->getLocale())->title }}</p>
                                            <span>
                                                {{ \Jenssegers\Date\Date::parse($related_article->created_at)->format(' jS F Y') }}</span>
                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).on('submit', '.comment-form', function() {
            var form = $(this);
            var url = form.attr('action');
            var formData = new FormData(form[0]);
            form.find(":submit").attr('disabled', true).html(
                "{{ app()->getLocale() == 'en' ? 'Please wait' : 'برجاء الإنتظار' }} "
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
                        "{{ app()->getLocale() == 'en' ? 'Post A Comment' : 'أضف تعليقك' }}"
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
