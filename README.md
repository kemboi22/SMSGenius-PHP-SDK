# <b>SMS GENIUS PHP SDK</b>
<p>This SDK helps one to integrate their applications with SMSGenius API for sending messages with ease </p>
<p>The official documentation is on <a href="https://sms.genius.ke/dashboard/docs">sms.genius.ke</a></p>
<p>You can install the php sdk using composer</p>
  
``` 
 composer require kemboielvis/smsgenius-php-sdk
```
<p>SMS Genius platform can do the following: <br>
1. Sending SMS to any network <br>
2. Sending WhatsApp messages<br>
</p>

# HOW TO USE THE SDK
<hr>

1. USING SMS PLATFORM

    <p>First initialize the main class and pass in API key as the parameter</p>
    <p>You can get you api key from <a href="https://sms.genius.ke/dashboard/">sms.genius.ke</a> go to Tools and add a new key. You can add its permissions</p>
```php
<?php

require "./vendor/autoload.php";

$smsGenius = new \Kemboielvis22\SmsgeniusPhpSdk\SMSGenius("APIKEY");
```

<li>Delete Received Messages [<i>params(id)</i>]</li>

```php
$sms = $smsGenius->SMSClass();
// delete Received message with the ID passed in as a parameter
$response = $sms->deleteReceivedMessages("id");
// Response is an array 
```
<li>Delete SMS Campaign [<i>params(id)</i>]</li>

```php
$sms = $smsGenius->SMSClass();
// Delete an SMS Campaign with a specific campaign ID
$response = $sms->deleteSMSCampaign("id");
//The response is an array 
```

<li>Delete Sent Messages [<i>params(id)</i>]</li>

```php
$sms = $smsGenius->SMSClass();
// Delete a sent message with specific message id
$response = $sms->deleteSentMessage("id")
// Response is an array
```

<li>Get Devices</li>

```php
$sms = $smsGenius->SMSClass();
//Get all devices connected with you account
$devices = $sms->getDevices();
// Devices is an array containing all devices connected with your account
```

<li>Get Pending messages</li>

```php
$sms = $smsGenius->SMSClass();
// Get all pending messages
$pendingMessages = $sms->getPendingMessages();
// Pending Messages is an array 
```

<li>Get Received Messages</li>

```php
$sms = $smsGenius->SMSClass();
// Get all Received Messages
$receivedMessages = $sms->getReceivedMessages();
// Received Messages is an array 
```

<li>Get SMS Campaigns</li>

```php
$sms = $smsGenius->SMSClass();
// Get all SMS Campaigns available
$smsCampaign = $sms->getSMSCampaigns();
// SMS Campaign is an array 
```

<li>Get Sent Messages</li>

```php
$sms = $smsGenius->SMSClass();
// Get all sent Messages
$sentMessages = $sms->getSentMessages();
// Sent messages is an array 
```

<li>Send Bulk Messages</li>

```php
  $array = [
      "secret" => "API_SECRET", // your API secret from (Tools -> API Keys) page
      "mode" => "devices", // There are credits or devices
      "campaign" => "bulk test",
      "numbers" => "+254712123456,+639123456789,+639123456789",
      "groups" => "1,2,3,4",
      "device" => "00000000-0000-0000-d57d-f30cb6a89289", // For type Devices
      "sim" => 1, // For type Devices
      "priority" => 1, // For type Devices
      "message" => "Hello World!"
  ];


```

<li>Send Single Messages</li>

```php

```

<li>Start SMS Campaign [ <i>params(Campaign ID)]</i></li>

```php
$sms = $smsGenius->SMSClass();
// Start SMS Campaign
// Pass in the campaign ID To start the campaign
$campaign = $sms->startSMSCampaign("Campaign ID")
// Campaign is an array 

```

<li>Stop SMS Campaign [<i>params(campaign ID)</i>]</li>

```php
$sms = $smsGenius->SMSClass();
// Stop a SMS campaign.
// Pass the campaign ID as the parameter 
$campaign = $sms->stopSMSCampaign("Campign ID");
// campaign is an array 

```

2. ACCOUNT

<li>Get Partner Earnings</li>

```php
$account = $smsGenius->account();
// Get partner earnings
$earnings = $account->getPartnerEarnings();
// Earnings is an array 
```

<li>Get remaining Credits</li>

```php
$account = $smsGenius->account();
// Get remaining credits
$credits = $account->getRemainingCredits();
// Credits is an array
```

<li>Get Subscription Packages</li>

```php
$account = $smsGenius->account();
// Get subscription packages
$packages = $account->getSubscriptionPackage();
// Subscription packages is an array 
```

3. System

<li>Get Gateway routes</li>

```php
$system = $smsGenius->System();
// Get all gateway routes
$routes = $system->getGatewayRoutes();
// Routes is an array 
```

<li>Get Shortener's</li>

```php
$system = $smsGenius->System();
// Get all system shorteners
$shorteners = $system->getShorteners();
// Shortners is an Array
```

4 USSD

<li>Clear Pending USSD</li>

```php
$ussd = $smsGenius->USSD();
// Clear pending USSD's 
$response = $ussd->clearPendingUSSD();
// Response is an array
```
<li>Delete USSD Request [ <i>params(ussdid)</i> ]</li>

```php
$ussd = $smsGenius->USSD();
// Delete a USSD request
$response = $ussd->deleteUSSDRequest("USSDID");
// Response is an array
```

<li>Get USSD Requests</li>

```php
$ussd = $smsGenius->USSD();
// Get all USSD request
$allUssd = $ussd->getUSSDRequest();
// all USSD is an array
```

<li>Send a USSD Request</li>

```php
$array = [

];
$ussd = $smsGenius->USSD();
// Send a USSD request
$response = $ussd->sendUSSDRequest();
// Response is an array
```

4. OTP
<li>Send OTP</li>

```php
$array = [

];
$otp = $smsGenius->OTPClass();
// Send an otp to a specific phone number
$response = $otp->sendOTP();
// Response is an array 
```

<li>Verify OTP [ <i>params(OTP code)</i> ]</li>

```php
$otp = $smsGenius->OTPClass();
// Verify a sent OTP
$response = $otp->verifyOTP("OTP");
// Response is an array
```




    