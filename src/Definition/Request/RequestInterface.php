<?php

namespace DVE\CEXApiClient\Definition\Request;

interface RequestInterface
{
    public function getUri(): string;
    public function getBodyParams(): array;
    public function getQueryParams(): array;
    public function isPrivate(): bool;
    public function getMethod(): string;
}