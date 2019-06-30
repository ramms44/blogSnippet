@extends('layouts.backend.app')

@section('title','Post')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">

                <!-- Exportable Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card-box widget-box-one">
                            <div class="header">
                                <h4>
                                    All Favorite Posts
                                    <span class="badge-pill bg-primary">{{ $posts->count() }}</span>
                                </h4>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table m-0 table-colored-bordered table-bordered-purple">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th><i class="mdi mdi-cards-heart"></i></th>
                                            {{--<th><i class="material-icons">comment</i><</th>--}}
                                            <th><i class="mdi mdi-eye"></i></th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th><i class="mdi mdi-cards-heart"></i></th>
                                            {{--<th><i class="material-icons">comment</i><</th>--}}
                                            <th><i class="mdi mdi-eye"></i></th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($posts as $key=>$post)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ str_limit($post->title,'10') }}</td>
                                                <td>{{ $post->user->name }}</td>
                                                <td>{{ $post->favorite_to_users->count() }}</td>
                                                <td>{{ $post->view_count }}</td>
                                                <td class="text-center">

                                                    <a href="{{ route('admin.post.show',$post->id) }}" class="btn btn-info waves-effect">
                                                        <i class="mdi mdi-eye"></i>
                                                    </a>

                                                    <button class="btn btn-danger waves-effect" type="button" onclick="removePost({{ $post->id }})">
                                                        <i class="mdi mdi-delete-empty"></i>
                                                    </button>
                                                    <form id="remove-form-{{ $post->id }}" action="{{ route('post.favorite',$post->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
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
                <!-- #END# Exportable Table -->
            </div>
        </div>
    </div>

@endsection

@push('js')
    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <script src="{{ asset('assets/backend/js/pages/tables/jquery-datatable.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function removePost(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('remove-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush