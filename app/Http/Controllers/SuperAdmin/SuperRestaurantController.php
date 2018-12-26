<?php
/**
 * Created by PhpStorm.
 * User: NAJMUL AHMED
 * Date: 12/26/2018
 * Time: 1:42 AM
 */

namespace App\Http\Controllers\SuperAdmin;


use App\Http\Controllers\Controller;

class SuperRestaurantController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getRestaurants()
    {

        return view('restaurants.index');
    }

}