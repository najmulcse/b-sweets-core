@extends('layouts.app')

@section('content')
    <div class="row">
        @if(count($categories) > 0)
            @foreach($categories as $category)
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <img class="card-img-top" height="170px;" src="http://www.biryanicentre.com.pk/images/deals/deal-2.jpg" alt="Card image cap">
                        <div class="card-body p-2">
                            <p class="card-text text-center">{{ $category->name }}</p>
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
@stop

