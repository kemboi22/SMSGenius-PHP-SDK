<?php

namespace Kemboielvis22\SmsgeniusPhpSdk\Helpers;

class Contacts extends \Kemboielvis22\SmsgeniusPhpSdk\SMSGenius
{
    private string $contactID = "";
    private string $groupID = "";
    private string $unSubscribedID = "";
    public function __construct($apikey)
    {
        parent::__construct($apikey);
    }

    public function contactID($contactID): static
    {
        $this->contactID = $contactID;
        return $this;
    }

    public function groupID($groupID): static
    {
        $this->groupID = $groupID;
        return $this;
    }

    public function unSubscribedID($unSubscribed): static
    {
        $this->unSubscribedID = $unSubscribed;
        return $this;
    }

    public function createContact($array)
    {
        return $this->postCurl("create/contact", $array);
    }

    public function createGroup($array)
    {
        return $this->postCurl("create/group", $array);
    }

    public function deleteContact($contactID = "")
    {
        if($contactID != "")
        {
            $this->contactID($contactID);
        }
        return $this->getCurl("delete/contact?secret={$this->apikey}&id={$this->contactID}");
    }

    public function deleteGroup($groupID = "")
    {
        if($groupID != "")
        {
            $this->groupID($groupID);
        }
        return $this->getCurl("delete/group?secret={$this->apikey}&id={$this->groupID}");
    }

    public function deleteUnsubscribed($unSubscribed ="")
    {
        if ($unSubscribed != ""){
            $this->unSubscribedID($unSubscribed);
        }
        return $this->getCurl("delete/unsubscribed?secret={$this->apikey}&id={$this->unSubscribedID}");
    }

    public function getContacts()
    {
        return $this->getCurl("get/contacts?secret={$this->apikey}");
    }

    public function getGroups()
    {
        return $this->getCurl("groups?secret={$this->apikey}");
    }

    public function getUnsubscribed()
    {
        return $this->getCurl("get/unsubscribed?secret={$this->apikey}");
    }

}