@extends('admin.layouts.master')

@section('content')
    <!-- Page head ==========================================-->
    <div class="page-head">
        <i class="fa fa-list"></i>
        Core values
        <ul class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>
                    Dashboard</a>
            </li>
            <li class="active">Core values</li>
        </ul>
    </div>
    <!-- Page content ==========================================-->
    <div class="page-content">
        <div class="widget">
            <div class="widget-content">
                <form class="row ajax-form" action="{{ route('admin.about.values.store') }}" method="post">
                    @csrf
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Icon </label>
                            <input type="text" class="form-control" name="icon">
                        </div>
                        <span class="text-danger">Please , visit this link to get your preffered icon <a
                                href="https://fontawesome.com/icons?d=gallery"
                                target="_blank">https://fontawesome.com/icons?d=gallery</a>
                        </span>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name (EN) </label>
                            <input type="text" class="form-control" name="name_en">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Name (AR) </label>
                            <input type="text" class="form-control" name="name_ar">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Description (EN) </label>
                            <input type="text" class="form-control" name="description_en">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Description (AR) </label>
                            <input type="text" class="form-control" name="description_ar">
                        </div>
                    </div>

                    <div class="col-md-12 col-sm-12 form-group text-center">
                        <button class="custom-btn green-bc" type="submit">
                            <i class="fa fa-plus"></i> Save change
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="widget">
            <div class="widget-title">
                Core values
            </div>
            <div class="widget-content">
                <div class="row">
                    <div class="col">
                        <div class="table-responsive-lg">
                            <table class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name </th>
                                        <th>Options</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $x = 1;
                                    @endphp
                                    @foreach ($values as $index => $value)
                                        <tr>
                                            <td>{{ $x }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>
                                                <button class="custom-btn btn-modal-view"
                                                    data-url="{{ route('admin.about.values.edit', ['id' => $value->id]) }}">
                                                    <i class="fa fa-edit"></i> Edit
                                                </button>
                                                <button class="custom-btn red-bc delete-btn"
                                                    data-url="{{ route('admin.about.values.delete', ['id' => $value->id]) }}">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>
                                        @php
                                            $x++;
                                        @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--End Page content-->
@endsection
