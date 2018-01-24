<?php

namespace DVE\CEXApiClient\Definition\Response;

abstract class PlaceOrderResponse implements ResponseInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $time;

    /**
     * @var string
     */
    private $type;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return PlaceOrderResponse
     */
    public function setId(int $id): PlaceOrderResponse
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getTime(): int
    {
        return $this->time;
    }

    /**
     * @param int $time
     * @return PlaceOrderResponse
     */
    public function setTime(int $time): PlaceOrderResponse
    {
        $this->time = $time;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return PlaceOrderResponse
     */
    public function setType(string $type): PlaceOrderResponse
    {
        $this->type = $type;
        return $this;
    }
}