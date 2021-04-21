<?php
declare(strict_types=1);

namespace VertxOne\Symfony\RaiffeisenRu\Ecom\Service;

use VertxOne\Symfony\RaiffeisenRu\Ecom\HostTrait;

class PaymentLinkGenerator
{
    use HostTrait;

    /** @var string */
    private $publicId;

    public function __construct(
        $isTestMode,
        string $publicId
    )
    {
        $this->isTestMode = $isTestMode;
        $this->publicId = $publicId;
    }

    /**
     * @param float $amount Сумма платежа в рублях
     * @param string|null $order_id Идентификатор заказа в магазине, максимальная длина 40 символов
     * @param string|null $success_url URL ресурса, куда будет перенаправлен клиент в случае успешного платежа
     * @param string|null $fail_url URL ресурса, куда будет перенаправлен клиент в случае неуспешного платежа
     * @return string Абсолютная ссылка
     */
    public function generate(float $amount, ?string $order_id = null, ?string $success_url = null, ?string $fail_url = null): string
    {
        $query = [
            'publicId' => $this->publicId,
            'amount' => $amount,
        ];

        if($order_id) {
            $query['orderId'] = $order_id;
        }

        if($success_url) {
            $query['successUrl'] = $success_url;
        }

        if($fail_url) {
            $query['failUrl'] = $fail_url;
        }

        return $this->getHost() . '/pay?' . http_build_query($query);
    }
}