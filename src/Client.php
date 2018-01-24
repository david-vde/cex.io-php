<?php

namespace DVE\CEXApiClient;

use DVE\CEXApiClient\ClientTool\ClientToolFactory;
use DVE\CEXApiClient\ConstantHelper\OrderType;
use DVE\CEXApiClient\Definition\Request\BalanceRequest;
use DVE\CEXApiClient\Definition\Request\OrderBookRequest;
use DVE\CEXApiClient\Definition\Request\PlaceLimitOrderRequest;
use DVE\CEXApiClient\Definition\Request\PlaceMarketOrderRequest;
use DVE\CEXApiClient\Definition\Request\RequestInterface;
use DVE\CEXApiClient\Definition\Request\Traits\SignatureTrait;
use DVE\CEXApiClient\Definition\Response\BalanceResponse;
use DVE\CEXApiClient\Definition\Response\OrderBookResponse;
use DVE\CEXApiClient\Definition\Response\PlaceLimitOrderResponse;
use DVE\CEXApiClient\Definition\Response\PlaceMarketOrderResponse;
use DVE\CEXApiClient\Definition\Response\Property\BalanceCurrencyProperty;
use DVE\CEXApiClient\Definition\Response\Property\OrderBookBidAskProperty;
use DVE\CEXApiClient\Exception\CexAPiClientResponseException;
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
     * @var ClientToolFactory
     */
    public $tools;

    /**
     * @var \GuzzleHttp\Client
     */
    private $guzzleClient;

    /**
     * Client constructor.
     * @param Config $config
     * @param RequestSigner $requestSigner
     * @param ClientToolFactory $clientToolFactory
     * @param \GuzzleHttp\Client $guzzleClient
     */
    public function __construct(Config $config, RequestSigner $requestSigner, ClientToolFactory $clientToolFactory, \GuzzleHttp\Client $guzzleClient)
    {
        $clientToolFactory->setClient($this);

        $this->config = $config;
        $this->requestSigner = $requestSigner;
        $this->tools = $clientToolFactory;
        $this->guzzleClient = $guzzleClient;
    }

    /**
     * Create a new client object
     *
     * @param Config $config
     * @return Client
     */
    public static function create(Config $config)
    {
        $requestSigner = new RequestSigner();
        $guzzle = new \GuzzleHttp\Client();
        return new Client($config, $requestSigner, new ClientToolFactory(), $guzzle);
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
     * @param string $symbol1
     * @param string $symbol2
     * @param int|null $depth
     * @return OrderBookResponse
     */
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
     * @param string $symbol1
     * @param string $symbol2
     * @param float $amount
     * @param float $price
     * @return PlaceLimitOrderResponse
     */
    public function placeBuyLimitOrder(string $symbol1, string $symbol2, float $amount, float $price)
    {
        return $this->placeLimitOrder(OrderType::BUY, $symbol1, $symbol2, $amount, $price);
    }

    /**
     * @param string $symbol1
     * @param string $symbol2
     * @param float $amount
     * @param float $price
     * @return PlaceLimitOrderResponse
     */
    public function placeSellLimitOrder(string $symbol1, string $symbol2, float $amount, float $price)
    {
        return $this->placeLimitOrder(OrderType::SELL, $symbol1, $symbol2, $amount, $price);
    }

    /**
     * @param string $type
     * @param string $symbol1
     * @param string $symbol2
     * @param float $amount
     * @param float $price
     * @return PlaceLimitOrderResponse
     */
    public function placeLimitOrder(string $type, string $symbol1, string $symbol2, float $amount, float $price)
    {
        $placeOrder = (new PlaceLimitOrderRequest())
            ->setPrice($price)
            ->setType($type)
            ->setAmount($amount)
            ->setSymbol1($symbol1)
            ->setSymbol2($symbol2)
        ;

        $data = $this->request($placeOrder);

        $response = (new PlaceLimitOrderResponse())
            ->setComplete((bool)$data->get('complete'))
            ->setAmount((float)$data->get('amount'))
            ->setPrice((float)$data->get('price'))
            ->setPending((float)$data->get('pending'))
            ->setId((int)$data->get('id'))
            ->setTime((float)($data->get('time')/1000))
            ->setType((string)$data->get('type'))
        ;

        return $response;
    }

    /**
     * @param string $symbol1
     * @param string $symbol2
     * @param float $amount
     * @return PlaceMarketOrderResponse
     */
    public function placeBuyMarketOrder(string $symbol1, string $symbol2, float $amount)
    {
        return $this->placeMarketOrder(OrderType::BUY, $symbol1, $symbol2, $amount);
    }

    /**
     * @param string $symbol1
     * @param string $symbol2
     * @param float $amount
     * @return PlaceMarketOrderResponse
     */
    public function placeSellMarketOrder(string $symbol1, string $symbol2, float $amount)
    {
        return $this->placeMarketOrder(OrderType::SELL, $symbol1, $symbol2, $amount);
    }

    /**
     * @param string $type
     * @param string $symbol1
     * @param string $symbol2
     * @param float $amount
     * @return PlaceMarketOrderResponse
     */
    public function placeMarketOrder(string $type, string $symbol1, string $symbol2, float $amount)
    {
        $placeOrder = (new PlaceMarketOrderRequest())
            ->setType($type)
            ->setAmount($amount)
            ->setSymbol1($symbol1)
            ->setSymbol2($symbol2)
        ;

        $data = $this->request($placeOrder);

        $response = (new PlaceMarketOrderResponse())
            ->setSymbol1amount((float)$data->get('symbol1Amount'))
            ->setSymbol2amount((float)$data->get('symbol2Amount'))
            ->setMessage((string)$data->get('message'))
            ->setId((int)$data->get('id'))
            ->setTime((float)($data->get('time')/1000))
            ->setType((string)$data->get('type'))
        ;

        return $response;
    }

    /**
     * @param RequestInterface $request
     * @return ArrayFinder
     * @throws CexAPiClientResponseException
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

        if(array_key_exists('error', $data)) {
            throw new CexAPiClientResponseException($guzzleResponse);
        }

        return new ArrayFinder($data);
    }
}