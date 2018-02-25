<?php

namespace DVE\CEXApiClient\Definition\Request;

class OrderDetailsRequest extends PrivateRequestAbstract
{
    /**
     * @var string
     */
    private $id;

    /**
     * @return string
     */
    public function getUri(): string
    {
        return '/get_order';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return 'POST';
    }

    /**
     * @return array
     */
    public function getBodyParams(): array
    {
        return parent::getBodyParams() + [
            'id'      =>  $this->id
        ];
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return OrderDetailsRequest
     */
    public function setId(string $id): OrderDetailsRequest
    {
        $this->id = $id;
        return $this;
    }
}