<?php

namespace DVE\CEXApiClient\Exception;

use Psr\Http\Message\ResponseInterface;
use Shudrum\Component\ArrayFinder\ArrayFinder;

class CexApiClientResponseException extends \Exception
{
    /**
     * @var ArrayFinder
     */
    private $body;

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * CexApiClientResponseException constructor.
     * @param ResponseInterface $response
     */
    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
        $this->body = new ArrayFinder((array)json_decode((string)$this->response->getBody(), true));
        $code = $this->response->getStatusCode();

        parent::__construct($this->body->get('error', 'Unknown error'), $code, null);
    }

    /**
     * @return ArrayFinder
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return ResponseInterface
     */
    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}