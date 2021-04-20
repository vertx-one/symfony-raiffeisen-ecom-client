<?php


namespace VertxOne\Symfony\RaiffeisenRu\Ecom;

trait HostTrait
{
    /** @var bool */
    private $isTestMode;

    public function getHost(): string
    {
        return $this->isTestMode ? 'https://test.ecom.raiffeisen.ru' : 'https://e-commerce.raiffeisen.ru';
    }
}