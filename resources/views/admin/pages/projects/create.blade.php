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
            <div class="widget-title"> Projects</div>
            <div class="widget-content">
                <form method="post" action="{{ route('admin.projects.store') }}" class="ajax-form">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>project image </label>
                                <input type="file" class="jfilestyle" name="image" />
                            </div>
                            <span class="text-danger">Image dimensions should be : 920 * 640
                            </span>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>project brochure </label>
                                <input type="file" class="jfilestyle" name="brochure" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label> project name (EN)</label>
                                <input type="text" class="form-control" name="name_en" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> project name (AR)</label>
                                <input type="text" class="form-control font_ar" name="name_ar" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> project size</label>
                                <input type="number" class="form-control" name="size" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="0">Choose category </option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->translate('en')->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> project location (EN)</label>
                                <input type="text" class="form-control" name="location_en" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> project location (AR)</label>
                                <input type="text" class="form-control font_ar" name="location_ar" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label> project location map</label>
                                <input type="text" class="form-control" name="map" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> project sector (EN)</label>
                                <input type="text" class="form-control" name="sector_en" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> project sector (AR)</label>
                                <input type="text" class="form-control font_ar" name="sector_ar" />
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> project brief (EN)</label>
                                <textarea class="form-control" name="brief_en"></textarea>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label> project brief (AR)</label>
                                <textarea class="form-control font_ar" name="brief_ar"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label> project content (EN) </label>
                                <textarea class="form-control tiny-editor" name="description_en"></textarea>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label> project content (AR) </label>
                                <textarea class="form-control tiny-editor" name="description_ar"></textarea>
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
