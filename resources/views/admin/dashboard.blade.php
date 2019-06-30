@extends('layouts.backend.app')

@section('title','Dashboard')

@push('css')
    <style>
        img {
            width: 100%;
            height: auto;
        }
    </style>
    <link href="{{ asset('assets/backend/css/docs.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/css/flag-icon.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Dashboard</h4>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row">

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-box-two widget-two-info">
                            <i class="mdi mdi-chart-areaspline widget-two-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Total Posts</p>
                                <h2>{{ $posts->count() }} <small><i class="mdi mdi-postage-stamp text-success"></i></small></h2>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-4">
                        <div class="card-box widget-box-two widget-two-orange">
                            <i class="mdi mdi-account-convert widget-two-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">Total Author</p>
                                <h2>{{ $author_count }}<small><i class="mdi mdi-account-box-multiple text-danger"></i></small></h2>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-2 col-lg-4 col-sm-6">
                        <div class="card-box widget-box-two widget-two-pink">
                            <i class="mdi mdi-layers widget-two-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Total Favorite</p>
                                <h2>{{ Auth::user() ->favorite_posts()->count() }}<small><i class="mdi mdi-arrow-top-right text-success"></i></small></h2>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-box-two widget-two-danger">
                            <i class="mdi mdi-av-timer widget-two-icon"></i>
                            <div class="wigdet-two-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Request Per Minute">Pending Posts</p>
                                <h2>{{ $total_pending_posts }}<small><i class="mdi mdi-arrow-up text-danger"></i></small></h2>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-box-two widget-two-purple">
                            <i class="mdi mdi-account-multiple widget-two-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Total Users">Total Views</p>
                                <h2>{{ $all_views }}<small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-3 col-md-4">
                        <div class="card-box widget-box-two widget-two-brown">
                            <i class="mdi mdi-layers-outline widget-two-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="New Downloads">Categories</p>
                                <h2>{{ $category_count }}<small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-2 col-lg-4 col-sm-6">
                        <div class="card-box widget-box-two widget-two-primary">
                            <i class="mdi mdi-label widget-two-icon "></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="New Downloads">Tags</p>
                                <h2>{{ $tag_count }}<small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card-box widget-box-two widget-two-success">
                            <i class="mdi mdi-account-box widget-two-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="New Downloads">Today Authors</p>
                                <h2>{{ $new_authors_today }}<small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                        <div class="card-box widget-box-one">
                            <div class="header">
                                <h4 class="text-primary">MOST POPULAR POST</h4>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Rank</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Country</th>
                                            <th>Views</th>
                                            <th>Favorite</th>
                                            <th>Comments</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($popular_posts as $key=>$post)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ str_limit($post->title,'20') }}</td>
                                                <td><p>{{ $post->user->name }}</p><p><a class="avatar" href="{{ route('author.profile',$post->user->username) }}"><img width="50" height="50" src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="Profile Image"></a></p></td>
                                                <td><p>{{ $post->user->country }}</p><p><span class="flag-icon flag-icon-id"></span></p></td>
                                                <td>{{ $post->view_count }}</td>
                                                <td>{{ $post->favorite_to_users_count }}</td>
                                                <td>{{ $post->comments_count }}</td>
                                                <td>
                                                    @if($post->status == true)
                                                        <span class="label bg-purple">Published</span>
                                                    @else
                                                        <span class="label bg-danger">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary waves-effect" target="_blank" href="{{ route('post.details',$post->slug) }}">View</a>
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                        <div class="card-box widget-box-one">
                            <div class="header">
                                <h4 class="text-primary">TOP MEMBER</h4>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Rank</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Country</th>
                                            <th>Views</th>
                                            <th>Favorite</th>
                                            <th>Comments</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($popular_posts as $key=>$post)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ str_limit($post->title,'20') }}</td>
                                                <td><p>{{ $post->user->name }}</p><p><a class="avatar" href="{{ route('author.profile',$post->user->username) }}"><img width="50" height="50" src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="Profile Image"></a></p></td>
                                                <td><p>{{ $post->user->country }}</p><p><span class="flag-icon flag-icon-id"></span></p></td>
                                                <td>{{ $post->view_count }}</td>
                                                <td>{{ $post->favorite_to_users_count }}</td>
                                                <td>{{ $post->comments_count }}</td>
                                                <td>
                                                    @if($post->status == true)
                                                        <span class="label bg-purple">Published</span>
                                                    @else
                                                        <span class="label bg-danger">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary waves-effect" target="_blank" href="{{ route('post.details',$post->slug) }}">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                        <div class="card-box widget-box-one">
                            <div class="header">
                                <h4 class="text-purple">RECENT MEMBER</h4>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead class="bg-purple text-white">
                                        <tr>
                                            <th>Member</th>


                                            <th>Country</th>
                                            <th>Views</th>
                                            <th>Favorite</th>
                                            <th>Comments</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($popular_posts as $key=>$post)
                                            <tr>
                                                <td><p>{{ $post->user->name }}</p><p><a class="avatar" href="{{ route('author.profile',$post->user->username) }}"><img width="50" height="50" src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="Profile Image"></a></p></td>
                                                <td><p>{{ $post->user->country }}</p><p><span class="flag-icon flag-icon-id"></span></p></td>
                                                <td>{{ $post->view_count }}</td>
                                                <td>{{ $post->favorite_to_users_count }}</td>
                                                <td>{{ $post->comments_count }}</td>
                                                <td>
                                                    @if($post->status == true)
                                                        <span class="label bg-purple">Published</span>
                                                    @else
                                                        <span class="label bg-danger">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary waves-effect" target="_blank" href="{{ route('post.details',$post->slug) }}">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                        <div class="card-box widget-box-one">
                            <div class="header">
                                <h4 class="text-purple">TOP COUNTRIES</h4>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead class="bg-purple text-white">
                                        <tr>
                                            <th>Rank</th>
                                            <th>Country</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($popular_posts as $key=>$post)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td><p>{{ $post->user->country }}</p><p><span class="flag-icon flag-icon-id"></span></p></td>

                                                <td>
                                                    @if($post->status == true)
                                                        <span class="label bg-purple">Published</span>
                                                    @else
                                                        <span class="label bg-danger">Pending</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary waves-effect" target="_blank" href="{{ route('post.details',$post->slug) }}">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->



                <!-- end row -->



                <!-- end row -->

            </div> <!-- container-fluid -->

        </div> <!-- content -->


    </div>
@endsection

@push('js')
    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('assets/backend/plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="assets/backend/plugins/flot-charts/jquery.flot.js"></script>
    <script src="assets/backend/plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="assets/backend/plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="assets/backend/plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="assets/backend/plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="assets/backend/plugins/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="{{ asset('assets/backend/js/pages/index.js') }}"></script>
    <script src="{{ asset('assets/backend/js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('assets/backend/js/docs.js') }}"></script>
@endpush