@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-comment"></i>
        Comments
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Comments</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title">
                <div class="alert-text">You have {{ $comments->count() }} comment</div>
            </div>
            <!--End Widget Title-->
            <div class="widget-content">
                <div class="row">
                    <div class="col" id="load-area">
                        @include('admin.pages.articles.templates.comments')
                    </div>
                    <!--End Item List-->
                    <div class="w-100"></div>
                    @if ($comments->count() > 0)
                        <button class="custom-btn" data-url="{{ url()->current() }}" id="load-more-button"
                            data-last="{{ $comments->lastPage() }}" data-count="{{ $comments->currentPage() }}">
                            Load More
                        </button>
                    @endif

                </div>
            </div>
            <!--End Widget-content-->
        </div>
        <!--End Widget-->
    </div>
@endsection
