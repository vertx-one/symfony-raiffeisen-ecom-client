<?php
declare(strict_types=1);

namespace VertxOne\Symfony\RaiffeisenRu\Ecom\Service;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use VertxOne\Symfony\RaiffeisenRu\Ecom\HostTrait;

class Client
{
    use HostTrait;

    /** @var string */
    private $secretKey;

    /** @var HttpClientInterface */
    private $httpClient;


    public function __construct(
        $isTestMode,
        string $secretKey,
        HttpClientInterface $httpClient
    )
    {
        $this->isTestMode = $isTestMode;
        $this->secretKey = $secretKey;

        $this->httpClient = $httpClient;
    }

    public function getEndpoint(): string
    {
        return $this->getHost() . '/api/payments/v1/orders';
    }

    /**
     * Установить урл для уведомлений
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function setCallback(string $callbackUrl): string
    {

        $url = $this->getHost() . '/api/settings/v1/callback';

        $resp = $this->httpClient
            ->request('POST', $url, [
                'auth_bearer' => $this->secretKey,
                'json' => [
                    'callbackUrl' => $callbackUrl
                ]
            ]);

        return $resp->getContent();
    }

    /**
     * Получить платежную транзакции по заказу
     * @param string $order_id
     * @return string json data
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getOrderStatus(string $order_id): string
    {
        $url = sprintf('%s/%s/transaction', $this->getEndpoint(), $order_id);

        $resp = $this->httpClient
            ->request('GET', $url, [
                'auth_bearer' => $this->secretKey,
            ]);

        return $resp->getContent();
    }

    /**
     * Отправить возврат в банк
     * @param string $order_id
     * @param string $refund_id
     * @param float $amount Сумма в рублях
     * @return string json data
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function postRefund(string $order_id, string $refund_id, float $amount): string
    {
        $url = sprintf('%s/%s/refunds/%s', $this->getEndpoint(), $order_id, $refund_id);

        $resp = $this->httpClient
            ->request('POST', $url, [
                'auth_bearer' => $this->secretKey,
                'json' => [
                    'amount' => $amount
                ]
            ]);

        return $resp->getContent();
    }

    /**
     * Получить возврат от банка
     * @param string $order_id
     * @param string $refund_id
     * @return string json data
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function getRefund(string $order_id, string $refund_id): string
    {
        $url = sprintf('%s/%s/refunds/%s', $this->getEndpoint(), $order_id, $refund_id);

        $resp = $this->httpClient
            ->request('GET', $url, [
                'auth_bearer' => $this->secretKey,
            ]);

        return $resp->getContent();
    }
}