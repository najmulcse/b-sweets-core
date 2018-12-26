@extends('layouts.app')

@section('content')
    <div class="row">
        @if(count($categories) > 0)
            @foreach($categories as $category)
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                    <div class="card card-statistics">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <i class="mdi mdi-cube text-danger icon-lg"></i>
                                </div>
                                <div class="float-right">
                                    <p class="mb-0 text-right">{{ $category->name }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h2>
                No categories found!
            </h2>
        @endif

    </div>
@endsection