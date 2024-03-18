@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        About us
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">About us</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title"> About us</div>
            <div class="widget-content">
                <form method="put" action="{{ route('admin.about.update') }}" class="ajax-form">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12">
                            <img src="{{ get_image($about->image, 'about') }}" style="height : 100px !important">
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>About us image </label>
                                    <input type="file" class="jfilestyle" name="image" />
                                </div>
                                <span class="text-danger">Image dimensions should be : 555 * 430
                                </span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Years of experience</label>
                                <input type="number" class="form-control" name="years" value="{{ $about->years }}" />
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label> First section title (EN)</label>
                                <input type="text" class="form-control" name="title1_en"
                                    value="{{ $about->translate('en')->title1 }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> First section title (AR)</label>
                                <input type="text" class="form-control" name="title1_ar"
                                    value="{{ $about->translate('ar')->title1 }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> First section description (EN) </label>
                                <textarea class="form-control" name="description1_en">{{ $about->translate('en')->description1 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> First section description (AR) </label>
                                <textarea class="form-control" name="description1_ar">{{ $about->translate('ar')->description1 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Second section title (EN)</label>
                                <input type="text" class="form-control" name="title2_en"
                                    value="{{ $about->translate('en')->title2 }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Second section title (AR)</label>
                                <input type="text" class="form-control" name="title2_ar"
                                    value="{{ $about->translate('ar')->title2 }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Second section description (EN) </label>
                                <textarea class="form-control" name="description2_en">{{ $about->translate('en')->description2 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Second section description (AR) </label>
                                <textarea class="form-control" name="description2_ar">{{ $about->translate('ar')->description2 }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Our mission description (EN) </label>
                                <textarea class="form-control" name="mission_en">{{ $about->translate('en')->mission }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Our mission description (AR) </label>
                                <textarea class="form-control" name="mission_ar">{{ $about->translate('ar')->mission }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Our vision description (EN) </label>
                                <textarea class="form-control" name="vision_en">{{ $about->translate('en')->vision }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Our vision description (AR) </label>
                                <textarea class="form-control" name="vision_ar">{{ $about->translate('ar')->vision }}</textarea>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label> MESSAGE FROM OUR CEO (EN) </label>
                                <textarea class="form-control tiny-editor" name="message_en">{{ $about->translate('en')->message }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> MESSAGE FROM OUR CEO (AR) </label>
                                <textarea class="form-control  tiny-editor" name="message_ar">{{ $about->translate('ar')->message }}</textarea>
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
