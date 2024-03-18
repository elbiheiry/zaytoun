@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Projects
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Projects</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title">
                Projects
                <a class="custom-btn" href="{{ route('admin.projects.create') }}">
                    <i class="fa fa-plus"></i> Add project
                </a>
            </div>
            <div class="widget-content">
                @php
                    $x = 1;
                @endphp
                @foreach ($projects as $index => $project)
                    <div class="slide_item">
                        <img src="{{ get_image($project->image, 'projects') }}" />
                        <div class="slide_cont">
                            <span> #{{ $x }} </span>
                            <h3>{{ $project->translate('en')->name }}</h3>
                            <div class="w-100">
                                <a class="custom-btn blue-bc"
                                    href="{{ route('admin.projects.slider.index', ['id' => $project->id]) }}">
                                    <i class="fa fa-image"></i> Slider
                                </a>
                                <a class="custom-btn"
                                    href="{{ route('admin.projects.edit', ['project' => $project->id]) }}">
                                    <i class="fa fa-edit"></i> Edit
                                </a>
                                <button class="custom-btn red-bc delete-btn"
                                    data-url="{{ route('admin.projects.destroy', ['project' => $project->id]) }}"
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
