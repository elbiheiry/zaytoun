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
            <div class="widget-title">
                Articles
                <a class="custom-btn" href="{{ route('admin.articles.create') }}">
                    <i class="fa fa-plus"></i> Add article
                </a>
            </div>
            <div class="widget-content">
                @php
                    $x = 1;
                @endphp
                @foreach ($articles as $index => $article)
                    <div class="slide_item">
                        <img src="{{ get_image($article->outer_image, 'articles') }}" />
                        <div class="slide_cont">
                            <span> #{{ $x }} </span>
                            <h3>{{ $article->translate('en')->title }}</h3>
                            <div class="w-100">
                                <a class="custom-btn green-bc"
                                    href="{{ route('admin.article.comment', ['article' => $article->id]) }}">
                                    <i class="fa fa-comment"></i> Comments
                                </a>
                                <a class="custom-btn"
                                    href="{{ route('admin.articles.edit', ['article' => $article->id]) }}">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <button class="custom-btn red-bc delete-btn"
                                    data-url="{{ route('admin.articles.destroy', ['article' => $article->id]) }}"
                                    style="margin-left:5px;">
                                    <i class="fa fa-trash-alt"></i> Delete
                                </button>
                            </div>
                        </div>
                    </div>
                    @php
                        $x++;
                    @endphp
                @endforeach

            </div>
        </div>

    </div>
    <!--End Page content-->
@endsection
