<?php

namespace App\Http\Controllers\Restaurants;

//use ApiCurlRequest;
//use App\Http\Controllers\Api\ApiCurlRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function store(Request $request)
    {

        $categoryStoringUrl = 'http://mccltd.info/projects/bombay-sweets/api/api/store_category';
        $headers = array(
            'secret_key' => config('api.secret_key'),
            'name' => $request->input('name'),
            'restaurant_id' => Auth::user()->restaurant_id
        );
        $image = $request->file('icon');

        $imagePath = $image->getPathname();
        $imageType = $image->getMimeType();
        $imageName  = $image->getClientOriginalName();

        $response = Curl::to($categoryStoringUrl)
            ->withData( $headers )
            ->withFile('image',$imagePath, $imageType, $imageName)
            ->post();

        return response()->json($response, 200);
    }

}