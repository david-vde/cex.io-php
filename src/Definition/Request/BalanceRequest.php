<?php

namespace DVE\CEXApiClient\Definition\Request;

class BalanceRequest extends PrivateRequestAbstract
{
    public function getUri(): string
    {
        return '/balance';
    }

    public function getMethod(): string
    {
        return 'POST';
    }
}