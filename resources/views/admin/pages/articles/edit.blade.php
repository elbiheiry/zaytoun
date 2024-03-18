@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Articles
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Articles</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title"> Articles</div>
            <div class="widget-content">
                <form method="put" action="{{ route('admin.articles.update', ['article' => $article->id]) }}"
                    class="ajax-form">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ get_image($article->inner_image, 'articles') }}"
                                style="height : 100px !important">
                        </div>
                        <div class="col-6">
                            <img src="{{ get_image($article->outer_image, 'articles') }}"
                                style="height : 100px !important">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Article inner image </label>
                                <input type="file" class="jfilestyle" name="inner_image" />
                            </div>
                            <span class="text-danger">Image dimensions should be : 1920 * 1080
                            </span>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Article outer image </label>
                                <input type="file" class="jfilestyle" name="outer_image" />
                            </div>
                            <span class="text-danger">Image dimensions should be : 768 * 576
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label> Article title (EN)</label>
                                <input type="text" class="form-control" name="title_en"
                                    value="{{ $article->translate('en')->title }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Article title (AR)</label>
                                <input type="text" class="form-control font_ar" name="title_ar"
                                    value="{{ $article->translate('ar')->title }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Article brief (EN)</label>
                                <textarea class="form-control" name="brief_en">{{ $article->translate('en')->brief }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Article brief (AR)</label>
                                <textarea class="form-control font_ar" name="brief_ar">{{ $article->translate('ar')->brief }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label> Article content (EN) </label>
                                <textarea class="form-control tiny-editor" name="description_en">{{ $article->translate('en')->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label> Article content (AR) </label>
                                <textarea class="form-control tiny-editor" name="description_ar">{{ $article->translate('ar')->description }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="custom-btn" type="submit">
                            Save Change <i class="fa fa-long-arrow-alt-right"></i>
                        </button>
                    </div>
                </form>
            </div>
            <!--End Widget-content-->
        </div>
    </div>
    <!--End Page content-->
@endsection
