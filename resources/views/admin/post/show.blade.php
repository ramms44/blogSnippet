@extends('layouts.backend.app')

@section('title','Post')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/plugins/markitup/skins/markitup/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/plugins/markitup/sets/default/style.css') }}" />

    <link href="{{ asset('assets/backend/css/global.css') }}" rel="stylesheet">

@endpush

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <!-- Vertical Layout | With Floating Label -->
                <a href="{{ route('admin.post.index') }}" class="btn btn-danger waves-effect">BACK</a>
                @if($post->is_approved == false)
                    <button type="button" class="btn btn-success waves-effect pull-right" onclick="approvePost({{ $post->id }})">
                        <i class="material-icons">done</i>
                        <span>Approve</span>
                    </button>
                    <form method="post" action="{{ route('admin.post.approve',$post->id) }}" id="approval-form" style="display: none">
                        @csrf
                        @method('PUT')
                    </form>
                @else
                    <button type="button" class="btn btn-success pull-right" disabled>
                        <i class="material-icons">done</i>
                        <span>Approved</span>
                    </button>
                @endif
                <br>
                <br>
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    {{ $post->title }}
                                    <small>Posted By <strong> <a href="">{{ $post->user->name }}</a></strong> on {{ $post->created_at->toFormattedDateString() }}</small>
                                </h2>
                            </div>
                            <div class="body">
                                <section>
                                    <h3>Code Snippet auto preview</h3><a class="clearLink" href="#" title="Click to clear all">clear</a>
                                    <textarea id="html" value="" placeholder="HTML" autocapitalize="off">{!! $post->html !!}</textarea>
                                    <textarea id="css" value="" placeholder="CSS" autocapitalize="off">{!! $post->css !!}</textarea>
                                    <textarea id="js" value="" placeholder="JavaScript" autocapitalize="off">{!! $post->js !!}</textarea>
                                    <iframe id="preview"></iframe>
                                </section>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header bg-cyan">
                                <h2>
                                    Categoryies
                                </h2>
                            </div>
                            <div class="body">
                                @foreach($post->categories as $category)
                                    <span class="label bg-cyan">{{ $category->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="card">
                            <div class="header bg-green">
                                <h2>
                                    Tags
                                </h2>
                            </div>
                            <div class="body">
                                @foreach($post->tags as $tag)
                                    <span class="label bg-green">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="card">
                            <div class="header bg-amber">
                                <h2>
                                    Featured Image
                                </h2>
                            </div>
                            <div class="body">
                                <img class="img-responsive thumbnail" src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt="">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
    <!-- JavaScript -->
    <script src="{{ asset('assets/backend/js/jquery.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/backend/js/editor.js') }}" type="text/javascript"></script>


    <script src="{{ asset('assets/backend/js/prism.js') }}"></script>
    <script src="{{ asset('assets/backend/js/prism-highlight.js') }}"></script>
    <script src="{{ asset('assets/backend/js/app.js') }}"></script>

@endpush