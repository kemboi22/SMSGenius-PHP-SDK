<?php

namespace Kemboielvis22\SmsgeniusPhpSdk\Helpers;

class WhatsApp extends \Kemboielvis22\SmsgeniusPhpSdk\SMSGenius
{
    private string $chatID = "";
    private string $campaignID = "";
    public function __construct($apikey)
    {
        parent::__construct($apikey);
    }

    public function createWhatsAppCode()
    {
        $array = [
            "secret" => $this->apikey
        ];
        return $this->postCurl("create/whatsapp", $array);
    }

    public function deleteReceivedChat($chatID=null)
    {
        if ($chatID != null)
        {
            $this->chatID($chatID);
        }
        $URL = "delete/wa.received?secret={$this->apikey}&id={$this->chatID}";
        return $this->getCurl($URL);
    }

    public function deleteSentChat($chatID =null)
    {
        if ($chatID != null)
        {
            $this->chatID($chatID);
        }
        $URl = "delete/wa.sent?secret={$this->apikey}&id={$this->chatID}";
        return $this->getCurl($URl);
    }

    public function deleteWhatsAppCampaign($campaignID)
    {
        if ($campaignID != null)
        {
            $this->campaignID($campaignID);
        }
        $URL = "delete/wa.campaign?secret={$this->apikey}&id={$this->campaignID}";
        return $this->getCurl($URL);
    }

    public function getAccounts()
    {
        $URL = "get/wa.accounts?secret={$this->apikey}";
        return $this->getCurl($URL);
        
    }

    public function getPendingChats()
    {
        $URL = "get/wa.pending?secret={$this->apikey}";
        return $this->getCurl($URL);
    }

    public function getReceivedChats()
    {
        $URL = "get/wa.received?secret={$this->apikey}";
        return $this->getCurl($URL);
    }

    public function getSentChats()
    {
        $URL = "get/wa.sent?secret={$this->apikey}";
        return $this->getCurl($URL);
    }

    public function getWhatsAppCampaign()
    {
        $URL = "get/wa.campaigns?secret={$this->apikey}";
        return $this->getCurl($URL);
    }

    public function getWhatsAppQRImage()
    {
        
    }

    public function sendBulkChat($array)
    {

        return $this->postCurl("send/whatsapp.bulk", $array);
    }

    public function sendSingleChat($array)
    {
        return $this->postCurl("send/whatsapp", $array);
    }

    public function startWhatsAppCampaign($campaignID)
    {
        if ($campaignID != null)
        {
            $this->campaignID($campaignID);
        }
        $URL = "remote/start.chats?secret={$this->apikey}&campaign={$this->campaignID}";
        return $this->getCurl($URL);
    }

    public function stopWhatsAppCampaign($campaignID = null)
    {
        if ($campaignID != null)
        {
            $this->campaignID($campaignID);
        }
        $URL = "remote/stop.chats?secret={$this->apikey}&campaign={$this->campaignID}";
        return $this->getCurl($URL);
    }

    public function campaignID($campaignID): static
    {
        $this->campaignID = $campaignID;
        return $this;
    }

    public function chatID($chatID): static
    {
        $this->chatID = $chatID;
        return $this;
    }

}