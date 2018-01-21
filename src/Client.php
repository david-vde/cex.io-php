<?php

namespace DVE\CEXApiClient;

use DVE\CEXApiClient\Definition\Request\BalanceRequest;
use DVE\CEXApiClient\Definition\Request\RequestInterface;
use DVE\CEXApiClient\Definition\Request\Traits\SignatureTrait;
use DVE\CEXApiClient\Definition\Response\BalanceResponse;
use DVE\CEXApiClient\Definition\Response\Property\BalanceCurrencyProperty;
use Shudrum\Component\ArrayFinder\ArrayFinder;

class Client
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var RequestSigner
     */
    private $requestSigner;

    /**
     * @var \GuzzleHttp\Client
     */
    private $guzzleClient;

    /**
     * Client constructor.
     * @param Config $config
     * @param RequestSigner $requestSigner
     * @param \GuzzleHttp\Client $guzzleClient
     */
    public function __construct(Config $config, RequestSigner $requestSigner, \GuzzleHttp\Client $guzzleClient)
    {
        $this->config = $config;
        $this->requestSigner = $requestSigner;
        $this->guzzleClient = $guzzleClient;
    }

    /**
     * @return BalanceResponse
     */
    public function balance()
    {
        $balance = new BalanceRequest();
        $data = $this->request($balance);

        $response = (new BalanceResponse())
            ->setTimestamp($data['timestamp'])
            ->setUsername($data['username'])
            ->setEUR((new BalanceCurrencyProperty())->setAvailable($data->get('EUR.available'))->setOrders($data->get('EUR.orders')))
            ->setUSD((new BalanceCurrencyProperty())->setAvailable($data->get('USD.available'))->setOrders($data->get('USD.orders')))
            ->setGBP((new BalanceCurrencyProperty())->setAvailable($data->get('GBP.available'))->setOrders($data->get('GBP.orders')))
            ->setRUB((new BalanceCurrencyProperty())->setAvailable($data->get('RUB.available'))->setOrders($data->get('RUB.orders')))
            ->setBTC((new BalanceCurrencyProperty())->setAvailable($data->get('BTC.available'))->setOrders($data->get('BTC.orders')))
            ->setBCH((new BalanceCurrencyProperty())->setAvailable($data->get('BCH.available'))->setOrders($data->get('BCH.orders')))
            ->setBTG((new BalanceCurrencyProperty())->setAvailable($data->get('BTG.available'))->setOrders($data->get('BTG.orders')))
            ->setDASH((new BalanceCurrencyProperty())->setAvailable($data->get('DASH.available'))->setOrders($data->get('DASH.orders')))
            ->setETH((new BalanceCurrencyProperty())->setAvailable($data->get('ETH.available'))->setOrders($data->get('ETH.orders')))
            ->setGHS((new BalanceCurrencyProperty())->setAvailable($data->get('GHS.available'))->setOrders($data->get('GHS.orders')))
            ->setZEC((new BalanceCurrencyProperty())->setAvailable($data->get('ZEC.available'))->setOrders($data->get('ZEC.orders')))
            ->setXRP((new BalanceCurrencyProperty())->setAvailable($data->get('XRP.available'))->setOrders($data->get('XRP.orders')))
        ;

        return $response;
    }

    /**
     * @param RequestInterface $request
     * @return ArrayFinder
     */
    private function request(RequestInterface $request): ArrayFinder
    {
        if($request->isPrivate()) {
            $nonce = (int)(microtime(true) * 10000);
            $signature = $this->requestSigner->generate(
                $this->config->getApiUserID(),
                $this->config->getApiKey(),
                $this->config->getApiSecret(),
                $nonce
            );


            /** @var $request SignatureTrait */
            $request
                ->setNonce($nonce)
                ->setKey($this->config->getApiKey())
                ->setSignature($signature)
            ;
        }

        $params = $request->toArray();

        $options = [];

        if(count($params) > 0) {
            $options['form_params'] = $params;
        }

        $guzzleResponse = $this->guzzleClient->request(
            $request->getMethod(),
            $this->config->getApiUrl() . $request->getUri() . '/',
            $options
        );

        $data = json_decode((string)$guzzleResponse->getBody(), true);

        return new ArrayFinder($data);
    }
}