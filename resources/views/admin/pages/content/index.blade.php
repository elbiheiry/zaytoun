@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Pages content
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Pages content</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <form class="page-content ajax-form" method="put" action="{{ route('admin.content.update') }}">
        @csrf
        @method('put')
        <div class="widget">
            <div class="widget-title"> Products section</div>
            <div class="widget-content">
                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label> Products section text (EN)</label>
                            <input type="text" class="form-control" name="description1_en"
                                value="{{ $content->translate('en')->description1 }}" />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label> Products section text (AR)</label>
                            <input type="text" class="form-control font_ar" name="description1_ar"
                                value="{{ $content->translate('ar')->description1 }}" />
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="custom-btn" type="submit">
                        Save Change <i class="fa fa-long-arrow-alt-right"></i>
                    </button>
                </div>
            </div>
            <!--End Widget-content-->
        </div>
        <div class="widget">
            <div class="widget-title"> Partners section</div>
            <div class="widget-content">
                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label> Partners section text (EN)</label>
                            <textarea class="form-control" name="description2_en">{{ $content->translate('en')->description2 }}</textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label> Partners section text (AR)</label>
                            <textarea class="form-control font_ar" name="description2_ar">{{ $content->translate('ar')->description2 }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="custom-btn" type="submit">
                        Save Change <i class="fa fa-long-arrow-alt-right"></i>
                    </button>
                </div>
            </div>
            <!--End Widget-content-->
        </div>
        <div class="widget">
            <div class="widget-title"> Career section</div>
            <div class="widget-content">
                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label> Career section text (EN)</label>
                            <textarea class="form-control tiny-editor" name="description3_en">{{ $content->translate('en')->description3 }}</textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label> Career section text (AR)</label>
                            <textarea class="form-control tiny-editor font_ar" name="description3_ar">{{ $content->translate('ar')->description3 }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="custom-btn" type="submit">
                        Save Change <i class="fa fa-long-arrow-alt-right"></i>
                    </button>
                </div>
            </div>
            <!--End Widget-content-->
        </div>
        <div class="widget">
            <div class="widget-title"> Privacy policy</div>
            <div class="widget-content">
                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label> Privacy policy (EN)</label>
                            <textarea class="form-control tiny-editor" name="description4_en">{{ $content->translate('en')->description4 }}</textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label> Privacy policy (AR)</label>
                            <textarea class="form-control tiny-editor font_ar" name="description4_ar">{{ $content->translate('ar')->description4 }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="custom-btn" type="submit">
                        Save Change <i class="fa fa-long-arrow-alt-right"></i>
                    </button>
                </div>
            </div>
            <!--End Widget-content-->
        </div>
    </form>
    <!--End Page content-->
@endsection
