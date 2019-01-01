@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 col-xs-12 grid-margin stretch-card">
            <div class="card">
                    @if($total = count($pendingRestaurants))
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <td>SN</td>
                            <td>Email</td>
                            <td>Option</td>
                        </tr>
                        </thead>
                        @php
                            $count =  0;
                        @endphp
                        @foreach($pendingRestaurants as $pendingRestaurant)
                            <tr>
                                <td>{{ ++$count}}</td>
                                <td>
                                    {{ $pendingRestaurant->email }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info">Edit</button>
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <p>No available pending restaurants</p>
                    @endif
            </div>
        </div>

    </div>
@stop