@extends('admin.layouts.master')
@section('content')
    <div class="page-content">
        <div class="widget">
            <div class="widget-content">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="counter">
                                    <i class="fa fa-newspaper"></i>
                                    <div class="counter-cont">
                                        <h3 class="timer" data-to="{{ \App\Models\Article::count() }}"
                                            data-speed="1500">
                                            {{ \App\Models\Article::count() }}
                                        </h3>
                                        <div class="count-name">Articles</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="counter">
                                    <i class="fa fa-envelope"></i>
                                    <div class="counter-cont">
                                        <h3 class="timer" data-to="{{ \App\Models\Message::count() }}"
                                            data-speed="1500">
                                            {{ \App\Models\Message::count() }}
                                        </h3>
                                        <div class="count-name">Messages</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="counter">
                                    <i class="fa fa-users"></i>
                                    <div class="counter-cont">
                                        <h3 class="timer" data-to="{{ \App\Models\Subscriber::count() }}"
                                            data-speed="1500">
                                            {{ \App\Models\Subscriber::count() }}
                                        </h3>
                                        <div class="count-name">Subscribers</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="counter">
                                    <i class="fa fa-list"></i>
                                    <div class="counter-cont">
                                        <h3 class="timer" data-to="{{ \App\Models\Project::count() }}"
                                            data-speed="1500">
                                            {{ \App\Models\Project::count() }}
                                        </h3>
                                        <div class="count-name">Projects</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="row" style="margin: 0 -15px">
            <div class="col-lg-6">
                <div class="widget">
                    <div class="widget-title"> Latest Messages
                        <a href="{{ route('admin.messages.index') }}" class="custom-btn"> see all</a>
                    </div>
                    <div class="widget-content" style="padding: 0">
                        @foreach ($messages as $message)
                            <div class="item-list">
                                <a href="{{ route('admin.messages.show', ['message' => $message->id]) }}">
                                    <img src="{{ $message->image() }}" />
                                    <div class="item-content">
                                        {{ $message->email }}
                                        <br />
                                        <span> <i class="fa fa-clock"></i> {{ $message->created_at->diffForHumans() }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="widget">
                    <div class="widget-title"> Latest Subscribers
                        <a href="{{ route('admin.subscribers.index') }}" class="custom-btn"> see all</a>
                    </div>
                    <div class="widget-content" style="padding: 0">
                        @foreach ($subscribers as $subscriber)
                            <div class="item-list">
                                <img src="{{ $subscriber->image() }}" />
                                <div class="item-content">
                                    {{ $subscriber->email }}
                                    <br />
                                    <span> <i class="fa fa-clock"></i> {{ $subscriber->created_at->diffForHumans() }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
