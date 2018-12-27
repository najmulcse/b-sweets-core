@extends('layouts.app')

@section('content')
    <div class="row pb-1">
        <div class="pull-left col-2">
            <button class="btn btn-success btn-block">Add category
                <i class="mdi mdi-plus"></i>
            </button>
        </div>
    </div>
    <div class="row">
        {{--<categories--}}
            {{--url="'{{ route('categories') }}'"--}}
            {{--categories="{{ $categories }}">--}}
        {{--</categories>--}}
        @if(count($categories) > 0)
            @foreach($categories as $category)
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <a href=""  class="" style="text-decoration: none;">
                                <img class="card-img-top" height="170px;" src="http://www.biryanicentre.com.pk/images/deals/deal-2.jpg" alt="Card image cap">
                                <div class="card-body p-2">
                                    <p class="card-text text-center font-weight-bold">{{ $category->name }}</p>
                                </div>
                            </a>
                        </div>
                </div>
            @endforeach
        @else
            <h2>
                No categories found!
            </h2>
        @endif
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
                <add-more-category
                url="{{ route('store.category') }}"
                >
                </add-more-category>
            </div>
    </div>
@stop

