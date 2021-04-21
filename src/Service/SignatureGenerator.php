<?php
declare(strict_types=1);

namespace VertxOne\Symfony\RaiffeisenRu\Ecom\Service;

use VertxOne\Symfony\RaiffeisenRu\Ecom\Type\PaymentTransaction;

class SignatureGenerator
{
    /** @var string */
    private $publicId;

    /** @var string */
    private $secretKey;

    public function __construct(
        string $publicId,
        string $secretKey
    )
    {
        $this->publicId = $publicId;
        $this->secretKey = $secretKey;
    }

    /**
     * @param PaymentTransaction $transaction
     * @return string
     */
    public function generate(PaymentTransaction $transaction): string
    {
        // amount|publicId|order|transaction.status.value|transaction.status.date

        $data = [
            $transaction->getAmount(),
            $this->publicId,
            $transaction->getOrderId(),
            $transaction->getStatus()->getValue(),
            $transaction->getStatus()->getDate()->format(DATE_ATOM)
        ];

        return hash_hmac('sha256', implode('|', $data), $this->secretKey);
    }
}