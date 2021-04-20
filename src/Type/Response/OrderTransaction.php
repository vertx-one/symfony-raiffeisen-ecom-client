<?php


namespace VertxOne\Symfony\RaiffeisenRu\Ecom\Type\Response;


use VertxOne\Symfony\RaiffeisenRu\Ecom\Type\PaymentTransaction;

class OrderTransaction
{
    /** @var string Enum: "SUCCESS"|"ERROR" Код состояния http запроса */
    private $code;

    /** @var PaymentTransaction */
    private $transaction;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    /**
     * @return PaymentTransaction
     */
    public function getTransaction(): PaymentTransaction
    {
        return $this->transaction;
    }

    /**
     * @param PaymentTransaction $transaction
     */
    public function setTransaction(PaymentTransaction $transaction): void
    {
        $this->transaction = $transaction;
    }


}