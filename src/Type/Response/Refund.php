<?php


namespace VertxOne\Symfony\RaiffeisenRu\Ecom\Type\Response;


class Refund
{
    /** @var string Enum: "SUCCESS"|"ERROR" Код состояния http запроса */
    private $code;

    /** @var float Сумма возврата в рублях */
    private $amount;

    /** @var string  Enum: "IN_PROGRESS"|"COMPLETED"|"DECLINED" Код состояния запроса на возврат */
    private $refundStatus;

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return Refund
     */
    public function setCode(string $code): Refund
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(): float
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return Refund
     */
    public function setAmount(float $amount): Refund
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getRefundStatus(): string
    {
        return $this->refundStatus;
    }

    /**
     * @param string $refundStatus
     * @return Refund
     */
    public function setRefundStatus(string $refundStatus): Refund
    {
        $this->refundStatus = $refundStatus;
        return $this;
    }
}