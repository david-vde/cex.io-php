<?php

namespace DVE\CEXApiClient;

use DVE\CEXApiClient\Definition\Request\BalanceRequest;
use DVE\CEXApiClient\Definition\Request\OrderBookRequest;
use DVE\CEXApiClient\Definition\Request\RequestInterface;
use DVE\CEXApiClient\Definition\Request\Traits\SignatureTrait;
use DVE\CEXApiClient\Definition\Response\BalanceResponse;
use DVE\CEXApiClient\Definition\Response\OrderBookResponse;
use DVE\CEXApiClient\Definition\Response\Property\BalanceCurrencyProperty;
use DVE\CEXApiClient\Definition\Response\Property\OrderBookBidAskProperty;
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

    public function orderBook(string $symbol1, string $symbol2, ?int $depth = null)
    {
        $orderBook = (new OrderBookRequest())
            ->setSymbol1($symbol1)
            ->setSymbol2($symbol2)
            ->setDepth($depth)
        ;
        $data = $this->request($orderBook);

        $response = (new OrderBookResponse())
            ->setTimestamp((int)$data->get('timestamp'))
            ->setId((int)$data->get('id'))
            ->setPair((string)$data->get('pair'))
            ->setSellTotal((float)$data->get('sell_total'))
            ->setBuyTotal((float)$data->get('buy_total'))
        ;

        $asks = [];
        foreach($data->get('asks') as $askData) {
            $asks[] = (new OrderBookBidAskProperty())
                ->setAmount($askData[1])
                ->setRate($askData[0])
            ;
        }
        $response->setAsks($asks);

        $bids = [];
        foreach($data->get('bids') as $bidsData) {
            $bids[] = (new OrderBookBidAskProperty())
                ->setAmount($bidsData[1])
                ->setRate($bidsData[0])
            ;
        }
        $response->setBids($bids);

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

        $options = [];

        // BODY params
        $bodyParams = $request->getBodyParams();
        if(count($bodyParams) > 0) {
            $options['form_params'] = $bodyParams;
        }

        // Query params
        $queryParams = '?';
        foreach($request->getQueryParams() as $queryParamName => $queryParamValue) {
            $queryParams .= $queryParamName . '=' . $queryParamValue . '&';
        }

        $guzzleResponse = $this->guzzleClient->request(
            $request->getMethod(),
            $this->config->getApiUrl() . $request->getUri() . '/' . $queryParams,
            $options
        );

        $data = json_decode((string)$guzzleResponse->getBody(), true);

        return new ArrayFinder($data);
    }
}