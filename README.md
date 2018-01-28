# CEX.IO API php client

This is a non-official PHP client for the CEX.io market place API.

## Read first

CEX.io use a **nonce** number to sign the private requests. The nonce cannot be the same or smaller than the previous one.

To make the job easy with this client, the requests are signed automatically when required. The current timestamp with microseconds is used as **nonce**.

If you have previously used your **API key** with different scripts before, be sure that the generated nonce will not be smaller than the last one used.
 
If you are not sure, please generate a new API key on CEX.io to avoid ***"invalid request"** issues.  

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

## Get Order Book

```
$orderBook = $client->orderBook('BTC', 'EUR', 5);
 
foreach($orderBook->getBids() as $bid) {
    echo $bid->getAmount() . ' BTC @ ' . $bid->getRate() . ' EUR'."\n";
}
 
foreach($orderBook->getAsks() as $ask) {
    echo $ask->getAmount() . ' BTC @ ' . $ask->getRate() . ' EUR'."\n";
}

```

## Get Last Price


```
$response = $client->lastPrice('BTC', 'EUR');
echo 'The last price for BTC/EUR pair is ' . $response->getLprice() . ' EUR'."\n";
```

## Get Account Balance

```
$balance = $client->balance();
echo 'You have ' . $balance->getXRP()->getAvailable() . ' XRP'."\n";
```

## Place Order

### Limit 

```
$response = $client->placeLimitOrder(OrderType::SELL, SupportedCurrency::XRP, SupportedCurrency::BTC, 40, 0.000142);
```
 
or

```
$response = $client->placeSellLimitOrder(SupportedCurrency::XRP, SupportedCurrency::BTC, 40, 0.000142);
```

### Market

```
$response = $client->placeMarketOrder(OrderType::SELL, SupportedCurrency::XRP, SupportedCurrency::BTC, 40);
```

or

```
$response = $client->placeSellMarketOrder(SupportedCurrency::XRP, SupportedCurrency::BTC, 40);
```