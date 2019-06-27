@extends('layouts.frontend.app')

@section('title','About')

@push('css')
    <link href="{{ asset('assets/frontend/css/single-post/styles.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/auth/responsive.css') }}" rel="stylesheet">
@endpush

@section('content')


    <section class="blog-area section">
        <div class="container">

            <h2>About</h2><br><br>
            <p>Website ini dibuat dengan framework Laravel</p>


        </div>


    </section><!-- section -->

@endsection

@push('js')

@endpush