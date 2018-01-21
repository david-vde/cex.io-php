<?php

namespace DVE\CEXApiClient\Definition\Request;

interface RequestInterface
{
    public function getUri(): string;
    public function toArray(): array;
    public function isPrivate(): bool;
    public function getMethod(): string;
}