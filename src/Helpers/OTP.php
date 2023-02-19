<?php

namespace Kemboielvis22\SmsgeniusPhpSdk\Helpers;

class OTP extends \Kemboielvis22\SmsgeniusPhpSdk\SMSGenius
{
    private string $otp = "";
    public function __construct($apikey)
    {
        parent::__construct($apikey);
    }

    public function otp($otp)
    {
        $this->otp = $otp;
        return $this;
    }

    public function sendOTP(array $array)
    {
        return $this->postCurl("send/otp", $array);
    }

    public function verifyOTP($otp = null)
    {
        if ($otp != null){
            $this->otp($otp);
        }
        $URL = "get/otp?secret={$this->apikey}&otp={$this->otp}";
        return $this->getCurl($URL);
    }

}