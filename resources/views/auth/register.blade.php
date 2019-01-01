@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0 page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper p-0 d-flex align-items-center auth auth-bg-1 theme-one">
            <div class="row w-100">
                <div class="col-lg-4 col-md-6 col-sm-8 mx-auto">
                   <registration-form

                        url="'{{ route('register') }}'"
                        user="{{ json_encode($user) }}">
                   </registration-form>
                    <p class="footer-text text-center">copyright © 2018 Bombay sweets.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>

@endsection