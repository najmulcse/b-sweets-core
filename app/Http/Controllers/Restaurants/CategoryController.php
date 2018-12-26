<?php

namespace App\Http\Controllers\Restaurants;

//use ApiCurlRequest;
//use App\Http\Controllers\Api\ApiCurlRequest;
use App\Http\Controllers\Controller;
use Ixudra\Curl\Facades\Curl;

class CategoryController extends Controller
{

    public function __construct()
    {

    }

    public function getCategories()
    {

       $categoryUrl = 'http://mccltd.info/projects/bombay-sweets/api/api/categories';
        $headers = array(
            'secret_key' => config('api.secret_key'),
        );
        $response = Curl::to($categoryUrl)

            ->withData( $headers )
            ->asJson()
            ->post();


        $categories = $response->data;
        return view('categories.index',compact('categories'));
    }

}