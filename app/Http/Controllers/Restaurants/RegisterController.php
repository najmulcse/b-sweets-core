<?php
/**
 * Created by PhpStorm.
 * User: NAJMUL AHMED
 * Date: 12/27/2018
 * Time: 10:16 PM
 */

namespace App\Http\Controllers\Restaurants;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ixudra\Curl\Facades\Curl;

class RegisterController extends Controller
{
    public $accessToken;

    public function ajaxCreateTempAccount(Request $request)
    {
        $tempUserCreatingUrl = 'http://localhost:8000/api/create_temporary_account';
        //$tempUserCreatingUrl = 'http://mccltd.info/projects/bombay-sweets/api/api/create_temporary_account';
        $this->accessToken = $this->createAccessToken();
        $headers = array(
            'secret_key' => config('api.secret_key'),
            'email' => $request->input('email'),
            'access_token' => $this->accessToken
        );

        $response = Curl::to($tempUserCreatingUrl)
            ->withData( $headers )
            ->asJson()
            ->post();
       // dd($response);

        return response()->json($response, 200);
    }

    private function createAccessToken()
    {
        return  trim(str_random(200).time());
    }

}