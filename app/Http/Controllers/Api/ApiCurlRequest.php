<?php
use App\Http\Controllers\Controller;
use Api;


class ApiCurlRequest extends Controller {

    public $baseUrl = "http://mccltd.info/projects/bombay-sweets/api/api/";
    public $secretKey = 123456;


    public function curlRequest($requestUrl, $headers)
    {
        $url = curl_init($requestUrl);

        curl_setopt($url, CURLOPT_POST, true );
        curl_setopt($url, CURLOPT_POSTFIELDS, $headers);
        curl_setopt($url, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($url, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($url, CURLOPT_RETURNTRANSFER, true);
        $postResult = curl_exec($url);
        curl_close($url);
        return json_decode($postResult, true);
    }
    public function setBaseUrl($url)
    {
        $this->baseUrl = $url;
    }

    public function getBaseUrl()
    {
        $this->baseUrl;
    }

}