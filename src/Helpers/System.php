<?php

namespace Kemboielvis22\SmsgeniusPhpSdk\Helpers;

class System extends \Kemboielvis22\SmsgeniusPhpSdk\SMSGenius
{

    public function __construct($apikey)
    {
        parent::__construct($apikey);
    }
    public function getGatewayRoutes(){
        $URL = "get/rates?secret={$this->apikey}";
        return $this->getCurl($URL);
    }

    public function getShorteners(){
        $URL = "get/shorteners?secret={$this->apikey}";
        return $this->getCurl($URL);
    }

}