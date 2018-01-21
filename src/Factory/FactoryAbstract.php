<?php

namespace DVE\CEXApiClient\Factory;

class FactoryAbstract
{
    /**
     * @var array
     */
    private $cachedObjects = [];

    protected function getCachedObject(string $key): ?object
    {
        if(array_key_exists($key, $this->cachedObjects)) {
            return $this->cachedObjects[$key];
        }

        return null;
    }

    /**
     * @param string $key
     * @param object $object
     * @return FactoryAbstract
     */
    protected function setCachedObject(string $key, object $object): FactoryAbstract
    {
        $this->cachedObjects[$key] = $object;
        return $this;
    }

    /**
     * @param string $key
     * @param callable $fn
     * @return null|object
     */
    protected function createObjectIfNotExists(string $key, callable $fn): ?object
    {
        $object = $this->getCachedObject($key);

        if(!$object) {
            $object = $fn();
            $this->setCachedObject($key, $object);
        }

        return $object;
    }
}