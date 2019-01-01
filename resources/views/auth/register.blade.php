@extends('layouts.app')

@section('content')
    <div class="container-fluid p-0 page-body-wrapper full-page-wrapper auth-page">
        <div class="content-wrapper">
            <div class="row w-100">
                <div class="col-lg-6 col-md-8 col-sm-8 col-xs-12 mx-auto">
                   <registration-form

                        url="{{ route('register.user') }}"
                        user="{{ json_encode($user) }}">
                   </registration-form>
                    <p class="footer-text text-center">copyright © 2018 Bombay sweets.</p>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>

@endsection