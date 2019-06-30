@extends('layouts.backend.app')

@section('title','Post')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{ asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />


    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/plugins/markitup/skins/markitup/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/plugins/markitup/sets/default/style.css') }}" />

    <link href="{{ asset('assets/backend/css/global.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <!-- Vertical Layout | With Floating Label -->
                <form action="{{ route('author.post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                            <div class="card-box widget-box-one">
                                <div class="header">
                                    <h4>
                                        Add New Post
                                    </h4>

                                </div>
                                <br>
                                <div class="body">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label class="form-label">Post Title</label>
                                            <input type="text" id="title" class="form-control" name="title">

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Featured Image</label>
                                        <input type="file" name="image">
                                    </div>

                                    <div class="form-group">
                                        <input type="checkbox" id="publish" class="filled-in" name="status" value="1">
                                        <label for="publish">Publish</label>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                            <div class="card-box widget-box-one">
                                <div class="header">
                                    <h4>
                                        Categories Tags and Ads
                                    </h4>
                                </div>
                                <div class="body">

                                    <div class="form-group form-float">
                                        <div class="col-sm-10 {{ $errors->has('categories') ? 'focused error' : '' }}">
                                            <label for="category">Select Category</label>
                                            <select name="categories[]" id="category" class="form-control show-tick" >
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>



                                    <div class="form-group form-float">
                                        <div class="col-sm-10 {{ $errors->has('tags') ? 'focused error' : '' }}">
                                            <label for="tag">Select Tags</label>
                                            <select name="tags[]" id="tag" class="form-control show-tick" >
                                                @foreach($tags as $tag)
                                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group form-float">
                                        <div class="col-sm-10 {{ $errors->has('ad') ? 'focused error' : '' }}">
                                            <label for="ads">Select ads</label>
                                            <select name="ad[]" id="ads" class="form-control show-tick" >
                                                @foreach($ad as $ads)
                                                    <option value="{{ $ads->id }}">{{ $ads->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <a  class="btn btn-sm btn-danger m-t-15 waves-effect" href="{{ route('admin.category.index') }}">BACK</a>
                                    <button type="submit" class="btn btn-sm btn-primary m-t-15 waves-effect">SUBMIT</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="card-box widget-box-one">
                                <div class="header">
                                    <h4>
                                        Add Your Snippets Code
                                    </h4>
                                </div>
                                <div class="body">

                                    <textarea id="html" value="" placeholder="HTML" autocapitalize="off" name="html"></textarea>
                                    <textarea id="css" value="" placeholder="CSS" autocapitalize="off" name="css"></textarea>
                                    <textarea id="js" value="" placeholder="JavaScript" autocapitalize="off" name="js"></textarea>

                                    <iframe id="preview"></iframe>

                                </div>

                            </div>
                        </div>
                    </div>



                </form>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/backend/plugins/bootstrap-select/js/jquery.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/backend/plugins/markitup/sets/default/set.js') }}"></script>

    <script type="text/javascript" src="{{ asset('assets/backend/plugins/markitup/jquery.markitup.js') }}"></script>



    <script type="text/javascript" >
        $(document).ready(function() {
            $("#markItUp").markItUp(mySettings);
        });
    </script>


    <!-- JavaScript -->
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/editor.js') }}" type="text/javascript"></script>




@endpush