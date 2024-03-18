@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-envelope"></i>
        Subscribers
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Subscribers</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title">
                <div class="alert-text">You have {{ \App\Models\Subscriber::count() }} Subscriber</div>
            </div>
            <!--End Widget Title-->
            <div class="widget-content">
                <div class="row">
                    <div class="col" id="load-area">
                        @include('admin.pages.subscribers.templates.subscribers')
                    </div>
                    <!--End Item List-->
                    <div class="w-100"></div>
                    @if ($subscribers->count() > 0)
                        <button class="custom-btn" data-url="{{ url()->current() }}" id="load-more-button"
                            data-last="{{ $subscribers->lastPage() }}" data-count="{{ $subscribers->currentPage() }}">
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
