@extends('layouts.backend.app')

@section('title','Dashboard')

@push('css')

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

                    <div class="col-xl-2 col-lg-4 col-sm-6">
                        <div class="card-box widget-box-one">
                            <i class="mdi mdi-chart-areaspline widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Total Posts</p>
                                <h2>{{ $posts->count() }} <small><i class="mdi mdi-postage-stamp text-success"></i></small></h2>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-2 col-lg-4 col-sm-6">
                        <div class="card-box widget-box-one">
                            <i class="mdi mdi-account-convert widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User Today">Total Author</p>
                                <h2>{{ $author_count }}<small><i class="mdi mdi-account-box-multiple text-danger"></i></small></h2>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-2 col-lg-4 col-sm-6">
                        <div class="card-box widget-box-one">
                            <i class="mdi mdi-layers widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Total Favorite</p>
                                <h2>{{ Auth::user() ->favorite_posts()->count() }}<small><i class="mdi mdi-arrow-top-right text-success"></i></small></h2>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-2 col-lg-4 col-sm-6">
                        <div class="card-box widget-box-one">
                            <i class="mdi mdi-av-timer widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Request Per Minute">Pending Posts</p>
                                <h2>{{ $total_pending_posts }}<small><i class="mdi mdi-arrow-up text-danger"></i></small></h2>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-2 col-lg-4 col-sm-6">
                        <div class="card-box widget-box-one">
                            <i class="mdi mdi-account-multiple widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Total Users">Total Views</p>
                                <h2>{{ $all_views }}<small><i class="mdi mdi-arrow-down text-danger"></i></small></h2>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-2 col-lg-4 col-sm-6">
                        <div class="card-box widget-box-one">
                            <i class="mdi mdi-layers-outline widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="New Downloads">Categories</p>
                                <h2>{{ $category_count }}<small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                            </div>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xl-2 col-lg-4 col-sm-6">
                        <div class="card-box widget-box-one">
                            <i class="mdi mdi-label widget-one-icon "></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="New Downloads">Tags</p>
                                <h2>{{ $tag_count }}<small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-4 col-sm-6">
                        <div class="card-box widget-box-one">
                            <i class="mdi mdi-account-box widget-one-icon"></i>
                            <div class="wigdet-one-content">
                                <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="New Downloads">Today Authors</p>
                                <h2>{{ $new_authors_today }}<small><i class="mdi mdi-arrow-up text-success"></i></small></h2>
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
                        <div class="card">
                            <div class="header">
                                <h4 class="text-info">MOST POPULAR POST</h4>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-hover dashboard-task-infos">
                                        <thead>
                                        <tr>
                                            <th>Rank</th>
                                            <th>Title</th>
                                            <th>Author</th>
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
                                                <td>{{ $post->user->name }}</td>
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
@endpush