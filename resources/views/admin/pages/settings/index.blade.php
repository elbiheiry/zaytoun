@extends('admin.layouts.master')
@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Site settings
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Site settings</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-title"> Site settings</div>
            <div class="widget-content">
                <form method="put" action="{{ route('admin.settings.update') }}" class="ajax-form">
                    @csrf
                    @method('put')
                    <div class="row">

                        <div class="col-6">
                            <div class="form-group">
                                <label> Contact email</label>
                                <input type="email" class="form-control" name="email" value="{{ $settings->email }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Phone number</label>
                                <input type="text" class="form-control" name="phone" value="{{ $settings->phone }}" />
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label> Address (EN)</label>
                                <input type="text" class="form-control" name="address_en"
                                    value="{{ $settings->translate('en')->address }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Address (AR)</label>
                                <input type="text" class="form-control" name="address_ar"
                                    value="{{ $settings->translate('ar')->address }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Working hours (EN)</label>
                                <input type="text" class="form-control" name="hours_en"
                                    value="{{ $settings->translate('en')->hours }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Working hours (AR)</label>
                                <input type="text" class="form-control" name="hours_ar"
                                    value="{{ $settings->translate('ar')->hours }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Copyrights (EN)</label>
                                <input type="text" class="form-control" name="copyright_en"
                                    value="{{ $settings->translate('en')->copyright }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Copyrights (AR)</label>
                                <input type="text" class="form-control" name="copyright_ar"
                                    value="{{ $settings->translate('ar')->copyright }}" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Footer context (EN) </label>
                                <textarea class="form-control" name="about_en">{{ $settings->translate('en')->about }}</textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Footer context (AR) </label>
                                <textarea class="form-control" name="about_ar">{{ $settings->translate('ar')->about }}</textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label> Map</label>
                                <input type="text" class="form-control" name="map" value="{{ $settings->map }}" />
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
