# CEX.IO API php client

## Create client

```
<?php 
 
use DVE\CEXApiClient\Client;
use DVE\CEXApiClient\Config;

$client = Client::create((new Config())
    ->setApiKey('YOUR_API_KEY')
    ->setApiSecret('YOUR_API_SECRET')
    ->setApiUserID('YOUR_API_USER_ID'))
;
```