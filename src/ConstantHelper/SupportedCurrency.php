<?php

namespace DVE\CEXApiClient\ConstantHelper;

class SupportedCurrency
{
    public const EUR = 'EUR';
    public const USD = 'USD';
    public const GBP = 'GBP';
    public const RUB = 'RUB';
    public const GHS = 'GHS';
    public const BTC = 'BTC';
    public const BCH = 'BCH';
    public const BTG = 'BTG';
    public const ETH = 'ETH';
    public const XRP = 'XRP';
    public const DASH = 'DASH';
    public const ZEC = 'ZEC';

    /**
     * @return array
     */
    public static function getSupportedCurrencies()
    {
        return [
            self::EUR   => self::EUR,
            self::USD   => self::USD,
            self::GBP   => self::GBP,
            self::RUB   => self::RUB,
            self::GHS   => self::GHS,
            self::BTC   => self::BTC,
            self::BCH   => self::BCH,
            self::BTG   => self::BTG,
            self::ETH   => self::ETH,
            self::XRP   => self::XRP,
            self::DASH  => self::DASH,
            self::ZEC   => self::ZEC
        ];
    }

    /**
     * @return array
     */
    public static function getSupportedCurrencyPairs()
    {
        return [
            self::BTC . ':' . self::USD => [self::BTC, self::USD],
            self::BTC . ':' . self::EUR => [self::BTC, self::EUR],
            self::BTC . ':' . self::GBP => [self::BTC, self::GBP],
            self::BTC . ':' . self::RUB => [self::BTC, self::RUB],
            self::ETH . ':' . self::USD => [self::ETH, self::USD],
            self::ETH . ':' . self::EUR => [self::ETH, self::EUR],
            self::ETH . ':' . self::GBP => [self::ETH, self::GBP],
            self::ETH . ':' . self::BTC => [self::ETH, self::BTC],
            self::BCH . ':' . self::USD => [self::BCH, self::USD],
            self::BCH . ':' . self::EUR => [self::BCH, self::EUR],
            self::BCH . ':' . self::GBP => [self::BCH, self::GBP],
            self::BCH . ':' . self::BTC => [self::BCH, self::BTC],
            self::BTG . ':' . self::USD => [self::BTG, self::USD],
            self::BTG . ':' . self::EUR => [self::BTG, self::EUR],
            self::BTG . ':' . self::BTC => [self::BTG, self::BTC],
            self::DASH . ':' . self::USD => [self::DASH, self::USD],
            self::DASH . ':' . self::EUR => [self::DASH, self::EUR],
            self::DASH . ':' . self::GBP => [self::DASH, self::GBP],
            self::DASH . ':' . self::BTC => [self::DASH, self::BTC],
            self::XRP . ':' . self::USD => [self::XRP, self::USD],
            self::XRP . ':' . self::EUR => [self::XRP, self::EUR],
            self::XRP . ':' . self::BTC => [self::XRP, self::BTC],
            self::ZEC . ':' . self::USD => [self::ZEC, self::USD],
            self::ZEC . ':' . self::EUR => [self::ZEC, self::EUR],
            self::ZEC . ':' . self::GBP => [self::ZEC, self::GBP],
            self::ZEC . ':' . self::BTC => [self::ZEC, self::BTC],
            self::GHS . ':' . self::BTC => [self::GHS, self::BTC]
        ];
    }

    /**
     * @param string $symbol
     * @return bool
     */
    public static function isSupportedCurrency(string $symbol)
    {
        return in_array($symbol, self::getSupportedCurrencies());
    }

    /**
     * @param string $symbol1
     * @param string $symbol2
     * @return bool
     */
    public static function isSupportedCurrencyPair(string $symbol1, string $symbol2)
    {
        return in_array($symbol1.':'.$symbol2, self::getSupportedCurrencyPairs());
    }
}