<?php

namespace DVE\CEXApiClient\ClientTool;

use DVE\CEXApiClient\ConstantHelper\SupportedCurrency;

class BalanceClientTool extends ClientToolAbstract
{
    const ESTIMATED_GLOBAL_BALANCE_RATE_MODE_AVERAGE = 'egb-avg-rate-mode';
    const ESTIMATED_GLOBAL_BALANCE_RATE_MODE_NEAREST_ASK = 'egb-ask-rate-mode';
    const ESTIMATED_GLOBAL_BALANCE_RATE_MODE_NEAREST_BID = 'egb-bid-rate-mode';
    const ESTIMATED_GLOBAL_BALANCE_RATE_MODE_LAST_PRICE = 'egb-lprice-rate-mode';

    /**
     * @param string $totalCurrency Method only available for EUR or USD
     * @param string $rateMode Use BalanceClientTool::ESTIMATED_GLOBAL_BALANCE_RATE_MODE_* class constants
     * @return float|int
     */
    public function getEstimatedGlobalBalance(string $totalCurrency, $rateMode = self::ESTIMATED_GLOBAL_BALANCE_RATE_MODE_AVERAGE)
    {
        $totalBalance = 0.0;

        if(!in_array($totalCurrency, [SupportedCurrency::EUR, SupportedCurrency::USD])) {
            return 0;
        }

        $balance = $this->client->balance();

        $getter = 'get'.$totalCurrency;
        $totalBalance += $balance->$getter()->getAvailable() + $balance->$getter()->getOrders();

        foreach(SupportedCurrency::getSupportedCurrencyPairs() as $currencyPair) {
            $baseCurrency = $currencyPair[0];
            $quoteCurrency = $currencyPair[1];

            if($quoteCurrency === $totalCurrency) {
                $getter = 'get'.$baseCurrency;
                $curBalance = $balance->$getter()->getAvailable() + $balance->$getter()->getOrders();

                if($curBalance != 0) {
                    switch($rateMode) {
                        case self::ESTIMATED_GLOBAL_BALANCE_RATE_MODE_AVERAGE:
                            $baseCurrencyOrderBook = $this->client->orderBook($baseCurrency, $quoteCurrency, 1);
                            $rate = (
                                $baseCurrencyOrderBook->getAsks()[0]->getRate() +
                                $baseCurrencyOrderBook->getBids()[0]->getRate()
                            ) / 2;
                            break;

                        case self::ESTIMATED_GLOBAL_BALANCE_RATE_MODE_NEAREST_ASK:
                            $baseCurrencyOrderBook = $this->client->orderBook($baseCurrency, $quoteCurrency, 1);
                            $rate = $baseCurrencyOrderBook->getAsks()[0]->getRate();
                            break;

                        case self::ESTIMATED_GLOBAL_BALANCE_RATE_MODE_NEAREST_BID:
                            $baseCurrencyOrderBook = $this->client->orderBook($baseCurrency, $quoteCurrency, 1);
                            $rate = $baseCurrencyOrderBook->getBids()[0]->getRate();
                            break;

                        case self::ESTIMATED_GLOBAL_BALANCE_RATE_MODE_LAST_PRICE;
                            $baseCurrencyLastPrice = $this->client->lastPrice($baseCurrency, $quoteCurrency);
                            $rate = $baseCurrencyLastPrice->getLprice();
                            break;

                        default:
                            throw new \InvalidArgumentException('Rate mode not found.');
                    }

                    $totalBalance += $rate * $curBalance;
                }
            }
        }

        return $totalBalance;
    }

}