fetchapp-php-2.0
================

A PHP library for version 2.0 of the FetchApp API

# Proposed Syntax

## Getting Account Information

```php

use FetchApp\API\FetchApp;

// Create a new FetchApp instance
$fetch = new FetchApp();

// Set the Authentication data (needed for all requests)
$fetch->setAuthenticationKey("demokey");
$fetch->setAuthenticationToken("demotoken");
try{
// Let's grab our Account data to make sure that everything is working!
    $account = $fetch->getAccountDetails();//    That was easy!

// Let's write some of the available Data to the page!
    echo $account->getAccountID();
    echo $account->getAccountName();
    echo $account->getBillingEmail();
    echo $account->getEmailAddress();
    echo $account->getURL();
    echo $account->getItemDownloadLimit();
    echo $account->getOrderExpirationInHours();
}
catch (Exception $e){
// This will occur on any call if the AuthenticationKey and AuthenticationToken are not set.
    echo $e->getMessage();
}
```