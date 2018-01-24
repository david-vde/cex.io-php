# CEX.IO API php client

This is a non-official PHP client for the CEX.io market place API.

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