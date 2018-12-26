<?php

namespace App\Http\Controllers\Restaurants;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestaurantController extends Controller
{
    public function __construct()
    {

    }

    public function getCategories()
    {
        return view('categories.index');
    }
}
