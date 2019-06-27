@extends('layouts.frontend.app')

@section('title','Contact')

@push('css')
    <link href="{{ asset('assets/frontend/css/single-post/styles.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/frontend/css/auth/responsive.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>Contact Us</b></h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">
            <form action="action_page.php">

                <label for="fname">First Name</label>
                <input type="text" id="fname" name="firstname" placeholder="Your name..">

                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">

                <label for="country">Country</label>
                <select id="country" name="country">
                    <option value="australia">Indonesia</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                    <option value="australia">Australia</option>
                    <option value="canada">Singapore</option>
                    <option value="usa">Malaysia</option>
                </select>

                <label for="subject">Subject</label>
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

                <input type="submit" value="Submit">

            </form>
        </div>
    </section><!-- section -->

@endsection

@push('js')

@endpush
