<?php

namespace DVE\CEXApiClient\Definition\Response;

class LastPriceResponse implements ResponseInterface
{
    /**
     * @var float
     */
   private $lprice;

    /**
     * @var string
     */
   private $curr1;

    /**
     * @var string
     */
   private $curr2;

    /**
     * @return float
     */
    public function getLprice(): float
    {
        return $this->lprice;
    }

    /**
     * @param float $lprice
     * @return LastPriceResponse
     */
    public function setLprice(float $lprice): LastPriceResponse
    {
        $this->lprice = $lprice;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurr1(): string
    {
        return $this->curr1;
    }

    /**
     * @param string $curr1
     * @return LastPriceResponse
     */
    public function setCurr1(string $curr1): LastPriceResponse
    {
        $this->curr1 = $curr1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCurr2()
    {
        return $this->curr2;
    }

    /**
     * @param mixed $curr2
     * @return LastPriceResponse
     */
    public function setCurr2($curr2)
    {
        $this->curr2 = $curr2;
        return $this;
    }


}