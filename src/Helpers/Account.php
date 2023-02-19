<?php

namespace Kemboielvis22\SmsgeniusPhpSdk\Helpers;

class Account extends \Kemboielvis22\SmsgeniusPhpSdk\SMSGenius
{
    public function __construct($apikey)
    {
        parent::__construct($apikey);
    }

    public function getPartnerEarnings()
    {
        $URL = "get/earnings?secret={$this->apikey}";
        return $this->getCurl($URL);
    }

    public function getRemainingCredits()
    {
        $URL = "get/credits?secret={$this->apikey}";
        return $this->getCurl($URL);
    }

    public function getSubscriptionPackage()
    {
        $URL = "get/subscription?secret={$this->apikey}";
        return $this->getCurl($URL);
    }

}