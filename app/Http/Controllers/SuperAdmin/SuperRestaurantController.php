<?php
/**
 * Created by PhpStorm.
 * User: NAJMUL AHMED
 * Date: 12/26/2018
 * Time: 1:42 AM
 */

namespace App\Http\Controllers\SuperAdmin;


use App\Http\Controllers\Controller;
use App\TempAccount;

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

    public function getPendingRestaurants()
    {
        $pendingRestaurants = TempAccount::where('is_register', false)
                                            ->latest()
                                            ->get();
        return view('restaurants.pending_restaurants_list', compact('pendingRestaurants'));
    }

}