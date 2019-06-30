@extends('layouts.backend.app')

@section('title','Tag')

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
                                    Edit TAG
                                </h4>
                                <br>
                            </div>
                            <div class="body">
                                <form action="{{ route('admin.tag.update',$tag->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Tag Name : </label>
                                            <input type="text" id="name" class="text" name="name" value="{{ $tag->name }}">

                                        </div>
                                    </div>

                                    <a  class="btn btn-sm btn-danger " href="{{ route('admin.tag.index') }}">BACK</a>
                                    <button type="submit" class="btn btn-sm btn-primary">SUBMIT</button>
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