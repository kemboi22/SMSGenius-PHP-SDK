<?php

namespace Kemboielvis22\SmsgeniusPhpSdk\Helpers;

class SMS extends \Kemboielvis22\SmsgeniusPhpSdk\SMSGenius
{
    protected string $smsID;
    protected string $campaignID;

    protected string $sendSingleSMSURL = "send/sms";
    protected string $sendBulkSMSURL = "send/sms.bulk";


    public function __construct($apikey)
    {
        parent::__construct($apikey);
    }

    public function smsID($smsID): static
    {
        $this->smsID = $smsID;
        return $this;
    }

    public function campaignID($campaignID): static
    {
        $this->campaignID = $campaignID;
        return $this;
    }

    public function sendSingleSMS(array $array)
    {
        $secret = array("secret" => $this->apikey);
        $mergedArray = $array + $secret;
        return $this->postCurl("send/sms", $mergedArray);
    }

    public function sendBulkSMS(array $array)
    {
        $secret = array("secret" => $this->apikey);
        $mergedArray = $array + $secret;
        return $this->postCurl("send/sms.bulk", $mergedArray);
    }

    public function deleteReceivedMessages($smsID = "")
    {
        if ($smsID != "")
        {
            $this->smsID($smsID);
        }
        $deleteReceivedSMSURL = "delete/sms.received?secret=".$this->apikey."&id=".$this->smsID;
        return $this->getCurl($deleteReceivedSMSURL);
    }

    public function deleteSMSCampaign($campaignID = "")
    {
        if ($campaignID != "")
        {
            $this->campaignID($campaignID);
        }
        $deleteCampaignURL = "delete/sms.campaign?secret={$this->apikey}&id={$this->campaignID}";
        return $this->getCurl($deleteCampaignURL);
    }

    public function deleteSentMessage($smsID= "")
    {
        if ($smsID != ""){
            $this->smsID($smsID);
        }
        $deleteSentSMSURL = "delete/sms.sent?secret={$this->apikey}&id={$this->smsID}";
        return $this->getCurl($deleteSentSMSURL);

    }

    public function getDevices()
    {
        $getDevicesURL = "get/devices?secret={$this->apikey}";
        return $this->getCurl($getDevicesURL);

    }

    public function getPendingMessages()
    {
        $getPendingSMSURL = "get/sms.pending?secret={$this->apikey}";
        return $this->getCurl($getPendingSMSURL);

    }

    public function getReceivedMessages()
    {
        $getReceivedSMSURL = "get/sms.received?secret={$this->apikey}";
        return $this->getCurl($getReceivedSMSURL);
    }

    public function getSentMessages()
    {
        $getSentSMSURL = "get/sms.sent?secret={$this->apikey}";
        return $this->getCurl($getSentSMSURL);
        
    }



    public function startSMSCampaign($campaignID = "")
    {
        if ($campaignID != "")
        {
            $this->campaignID($campaignID);
        }
        $startSMSCampaignURL = "remote/start.sms?secret={$this->apikey}&campaign={$this->campaignID}";
        return $this->getCurl($startSMSCampaignURL);
        
    }

    public function stopSMSCampaign()
    {
        $stopCampaignURL = "remote/stop.sms?secret={$this->apikey}&campaign={$this->campaignID}";
        return $this->getCurl($stopCampaignURL);
    }

    public function getSMSCampaigns()
    {
        $getSMSCampaignURL = "get/sms.campaigns?secret={$this->apikey}";
        return $this->getCurl($getSMSCampaignURL);

    }

}