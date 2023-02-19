<?php

namespace Kemboielvis22\SmsgeniusPhpSdk;

use Kemboielvis22\SmsgeniusPhpSdk\Helpers\Account;
use Kemboielvis22\SmsgeniusPhpSdk\Helpers\OTP;
use Kemboielvis22\SmsgeniusPhpSdk\Helpers\SMS;
use Kemboielvis22\SmsgeniusPhpSdk\Helpers\System;
use Kemboielvis22\SmsgeniusPhpSdk\Helpers\USSD;
use Kemboielvis22\SmsgeniusPhpSdk\Helpers\WhatsApp;

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

    protected function postCurl(string $url, array $array)
    {
        $cURL = curl_init($this->baseurl.$url);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($cURL, CURLOPT_POSTFIELDS, $array);
        $response = curl_exec($cURL);
        curl_close($cURL);
        return json_decode($response, true);
    }

    protected function getCurl(string $url)
    {
        $cURL = curl_init();
        curl_setopt($cURL, CURLOPT_URL, $this->baseurl.$url);
        curl_setopt($cURL, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($cURL);
        curl_close($cURL);
        return json_decode($response, true);
    }

    public function account(): Account
    {
        return new Account($this->apikey);
    }

    public function OTPClass(): OTP
    {
        return new OTP($this->apikey);
    }

    public function SMSClass(): SMS
    {
        return new SMS($this->apikey);
    }

    public function System(): System
    {
        return new System($this->apikey);
    }

    public function USSD(): USSD
    {
        return new USSD($this->apikey);
    }

    public function WhatsApp(): WhatsApp
    {
        return new WhatsApp($this->apikey);
    }

}