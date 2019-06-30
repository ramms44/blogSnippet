@extends('layouts.backend.app')

@section('title','Category')

@push('css')

@endpush

@section('content')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <!-- Vertical Layout | With Floating Label -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card-box widget-box-one">
                            <div class="header">
                                <h4>
                                    Edit CATEGORY
                                </h4>
                                <br>
                            </div>
                            <div class="body">
                                <form action="{{ route('admin.category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Category Name</label>
                                            <input type="text" id="name" class="form-control" name="name" value="{{ $category->name }}">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <input type="file" name="image">
                                    </div>

                                    <a  class="btn btn-sm btn-danger m-t-15 waves-effect" href="{{ route('admin.category.index') }}">BACK</a>
                                    <button type="submit" class="btn btn-sm btn-primary m-t-15 waves-effect">SUBMIT</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

@endpush