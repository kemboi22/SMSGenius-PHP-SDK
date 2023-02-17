<?php

namespace Kemboielvis22\SmsgeniusPhpSdk;

use Kemboielvis22\SmsgeniusPhpSdk\Helpers\SMS;

class SMSGenius
{
    protected string $apikey ;
    protected string $baseurl = "https://sms.genius.ke/api/";
    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }

    public function SMS(): SMS
    {
        return new SMS($this->apikey);
    }

    protected function postCurl($url, $array)
    {
        $cURL = curl_init($this->baseurl.$url);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURL, CURLOPT_POSTFIELDS, $array);
        $response = curl_exec($cURL);
        curl_close($cURL);
        return json_decode($response, true);
    }

    protected function getCurl($url)
    {
        $cURL = curl_init();
        curl_setopt($cURL, CURLOPT_URL, $this->baseurl.$url);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($cURL);
        curl_close($cURL);
        return json_decode($response, true);
    }


}