<?php

namespace Kemboielvis22\SmsgeniusPhpSdk\Helpers;

class USSD extends \Kemboielvis22\SmsgeniusPhpSdk\SMSGenius
{
    private string $ussdID = "";
    public function __construct($apikey)
    {
        parent::__construct($apikey);
    }

    public function ussdID($ussdID)
    {
        $this->ussdID = $ussdID;
        return $this;
    }

    public function clearPendingUSSD()
    {
        $URL = "clear/ussd?secret={$this->apikey}";
        return $this->getCurl($URL);
    }

    public function deleteUSSDRequest($ussdID = null)
    {
        if ($ussdID != null){
            $this->ussdID($ussdID);
        }
        $URL = "delete/ussd?secret={$this->apikey}&id={$this->ussdID}";
        return $this->getCurl($URL);
    }

    public function getUSSDRequest()
    {
        $URL = "get/ussd?secret={$this->apikey}";
        return $this->getCurl($URL);
    }

    public function sendUSSDRequest(Array $array)
    {
        return $this->postCurl("send/ussd",$array);
    }

}