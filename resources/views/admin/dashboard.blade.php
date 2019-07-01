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

                    <div class="col-xl-6">
                        <div class="card-box">
                            <div class="body">
                                <div id="chartMostPopularPost"></div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card-box">
                            <div class="body">
                                <div id="chartTopCountries"></div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card-box">
                            <div class="body">
                                <div id="chartRecentMember"></div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card-box">
                            <div class="body">
                                <div id="chartTopMember"></div>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card-box ">
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

                    <div class="col-xl-6">
                        <div class="card-box">
                            <div class="header">
                                <h4 class="text-primary">TOP MEMBER</h4>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Rank</th>

                                            <th>Author</th>
                                            <th>Country</th>
                                            <th>Views</th>
                                            <th>Favorite</th>

                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($popular_posts as $key=>$post)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>

                                                <td><p>{{ $post->user->name }}</p><p><a class="avatar" href="{{ route('author.profile',$post->user->username) }}"><img width="50" height="50" src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="Profile Image"></a></p></td>
                                                <td><p>{{ $post->user->country }}</p><p><span class="flag-icon flag-icon-id"></span></p></td>
                                                <td>{{ $post->view_count }}</td>
                                                <td>{{ $post->favorite_to_users_count }}</td>

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

                    <div class="col-xl-6">
                        <div class="card-box">
                            <div class="header">
                                <h4 class="text-purple">RECENT MEMBER</h4>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead class="bg-purple text-white">
                                        <tr>
                                            <th>Member</th>
                                            <th>Title</th>

                                            <th>Country</th>

                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($popular_posts as $key=>$post)
                                            <tr>
                                                <td><p>{{ $post->user->name }}</p><p><a class="avatar" href="{{ route('author.profile',$post->user->username) }}"><img width="50" height="50" src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="Profile Image"></a></p></td>
                                                <td>{{ str_limit($post->title,'20') }}</td>
                                                <td><p>{{ $post->user->country }}</p><p><span class="flag-icon flag-icon-id"></span></p></td>

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


                    <div class="col-xl-6">
                        <div class="card-box">
                            <div class="header">
                                <h4 class="text-purple">TOP COUNTRIES</h4>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead class="bg-purple text-white">
                                        <tr>
                                            <th>Rank</th>
                                            <th>Title</th>
                                            <th>Country</th>

                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($popular_posts as $key=>$post)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ str_limit($post->title,'20') }}</td>
                                                <td><p>{{ $post->user->country }}</p><p><span class="flag-icon flag-icon-id"></span></p></td>


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

    <script src="{{ asset('assets/backend/js/highcharts.js') }}"></script>
    <script>
        var colors = Highcharts.getOptions().colors,
            categories = [
                'Laravel',
                'PHP',
                'Bootstrap',
                'Codeigniter'
            ],
            data = [
                {
                    y: 62.74,
                    color: colors[2],
                    drilldown: {
                        name: 'Laravel',
                        categories: [
                            'Laravel v65.0',
                            'Laravel v64.0',
                            'Laravel v63.0',
                            'Laravel v62.0',
                            'Laravel v61.0'
                        ],
                        data: [
                            0.1,
                            1.3,
                            53.02,
                            1.4,
                            0.88
                        ]
                    }
                },
                {
                    y: 10.57,
                    color: colors[1],
                    drilldown: {
                        name: 'PHP',
                        categories: [
                            'PHP v58.0',
                            'PHP v57.0',
                            'PHP v56.0'
                        ],
                        data: [
                            1.02,
                            7.36,
                            0.35
                        ]
                    }
                },
                {
                    y: 7.23,
                    color: colors[0],
                    drilldown: {
                        name: 'Bootstrap',
                        categories: [
                            'Bootstrap v11.0',
                            'Bootstrap v10.0',
                            'Bootstrap v9.0',
                            'Bootstrap v8.0'
                        ],
                        data: [
                            6.2,
                            0.29,
                            0.27,
                            0.47
                        ]
                    }
                },
                {
                    y: 5.58,
                    color: colors[3],
                    drilldown: {
                        name: 'Codeigniter',
                        categories: [
                            'Codeigniter v11.0',
                            'Codeigniter v10.1',
                            'Codeigniter v10.0',
                            'Codeigniter v9.1',
                            'Codeigniter v9.0',
                            'Codeigniter v5.1'
                        ],
                        data: [
                            3.39,
                            0.96,
                            0.36,
                            0.54,
                            0.13,
                            0.2
                        ]
                    }
                },

                {
                    y: 7.62,
                    color: colors[6],
                    drilldown: {
                        name: 'Other',
                        categories: [
                            'Other'
                        ],
                        data: [
                            7.62
                        ]
                    }
                }
            ],
            browserData = [],
            versionsData = [],
            i,
            j,
            dataLen = data.length,
            drillDataLen,
            brightness;


        // Build the data arrays
        for (i = 0; i < dataLen; i += 1) {

            // add browser data
            browserData.push({
                name: categories[i],
                y: data[i].y,
                color: data[i].color
            });

            // add version data
            drillDataLen = data[i].drilldown.data.length;
            for (j = 0; j < drillDataLen; j += 1) {
                brightness = 0.2 - (j / drillDataLen) / 5;
                versionsData.push({
                    name: data[i].drilldown.categories[j],
                    y: data[i].drilldown.data[j],
                    color: Highcharts.Color(data[i].color).brighten(brightness).get()
                });
            }
        }

        // Create the chart
        Highcharts.chart('chartMostPopularPost', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Most Popular Post Snippets'
            },

            plotOptions: {
                pie: {
                    shadow: false,
                    center: ['50%', '50%']
                }
            },
            tooltip: {
                valueSuffix: '%'
            },
            series: [{
                name: 'Snippets',
                data: browserData,
                size: '60%',
                dataLabels: {
                    formatter: function () {
                        return this.y > 5 ? this.point.name : null;
                    },
                    color: '#ffffff',
                    distance: -30
                }
            }, {
                name: 'Versions',
                data: versionsData,
                size: '80%',
                innerSize: '60%',
                dataLabels: {
                    formatter: function () {
                        // display only if larger than 1
                        return this.y > 1 ? '<b>' + this.point.name + ':</b> ' +
                            this.y + '%' : null;
                    }
                },
                id: 'versions'
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 400
                    },
                    chartOptions: {
                        series: [{
                        }, {
                            id: 'versions',
                            dataLabels: {
                                enabled: false
                            }
                        }]
                    }
                }]
            }
        });
    </script>
    <script>
        Highcharts.chart('chartTopCountries', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Top Countries'
            },

            xAxis: {
                categories: [
                    'Indonesia',
                    'USA',
                    'Japan',
                    'Australia',

                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Countries'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} Members</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Country',
                data: [{{ $users->count() }}, 2, 1, 3]

            }]
        });
    </script>

    <script>
        Highcharts.chart('chartRecentMember', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Recent Member'
            },
            xAxis: {
                categories: ['Bootstrap', 'PHP', 'CSS', 'JS', 'Carousel']
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Total snippet post'
                }
            },
            legend: {
                reversed: true
            },
            plotOptions: {
                series: {
                    stacking: 'normal'
                }
            },
            series: [{
                name: 'Admin',
                data: [5, 3, 4, 7, 2]
            }, {
                name: 'Author',
                data: [2, 2, 3, 2, 1]
            }, {
                name: 'Member',
                data: [3, 4, 4, 2, 5]
            }]
        });
    </script>

    <script>
        Highcharts.chart('chartTopMember', {
            chart: {
                type: 'pie',
                options3d: {
                    enabled: true,
                    alpha: 45,
                    beta: 0
                }
            },
            title: {
                text: 'Top Member'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    depth: 35,
                    dataLabels: {
                        enabled: true,
                        format: '{point.name}'
                    }
                }
            },
            series: [{
                type: 'pie',
                name: 'Create Posts Snippets',
                data: [
                    ['Admin', 6.0],
                    ['Author', 3.8],
                    ['Member', 40.5],
                    ['User', 50.2]
                ]
            }]
        });
    </script>
@endpush