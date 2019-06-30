@extends('layouts.backend.app')

@section('title','Tag')

@push('css')
    <!-- JQuery DataTable Css -->
    <link href="{{ asset('assets/backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="block-header">
                    <a class="btn btn-purple btn-rounded w-md waves-effect waves-light m-b-5" href="{{ route('admin.tag.create') }}">

                        <span>Add New Tag</span>
                    </a>
                </div>
                <!-- Exportable Table -->
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card-box widget-box-one">
                            <div class="header">
                                <h4>
                                    All Tags
                                    <span class="badge-pill bg-primary">{{ $tags->count() }}</span>
                                </h4>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table m-0">
                                        <thead class="bg-purple text-white">
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Post Count</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Post Count</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Action</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($tags as $key=>$tag)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $tag->name }}</td>
                                                <td>{{ $tag->posts->count() }}</td>
                                                <td>{{ $tag->created_at }}</td>
                                                <td>{{ $tag->updated_at }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('admin.tag.edit',$tag->id) }}" class="btn btn-primary waves-effect">
                                                        <i class="mdi mdi-pencil-outline"></i>
                                                    </a>


                                                    <button class="btn btn-danger waves-effect" type="button" onclick="deleteTag({{ $tag->id }})">
                                                        <i class="mdi mdi-delete-empty"></i>
                                                    </button>
                                                    <form id="delete-form-{{ $tag->id }}" action="{{ route('admin.tag.destroy',$tag->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
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
        <!-- Start content -->


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
    <script src="{{ asset('assets/backend/js/sweetalert2.all.js') }}"></script>
    <script type="text/javascript">
        function deleteTag(id) {
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
                    document.getElementById('delete-form-'+id).submit();
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