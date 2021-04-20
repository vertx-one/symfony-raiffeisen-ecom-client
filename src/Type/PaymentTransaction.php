<?php


namespace VertxOne\Symfony\RaiffeisenRu\Ecom\Type;


use Symfony\Component\Validator\Constraints as Assert;

class PaymentTransaction
{
    /**
     * @Assert\NotBlank()
     * @var int Идентификатор операции в Райффайзенбанке
     */
    private $id;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=40)
     * @var string Идентификатор заказа в магазине
     */
    private $orderId;

    /**
     * @Assert\NotBlank()
     * @var PaymentStatus
     */
    private $status;

    /** @var string Тип платежа. При оплате с карт придет значение - "acquiring", при СБП - "sbp" */
    private $paymentMethod;

    /** @var PaymentParams */
    private $paymentParams;

    /** @var float Сумма в рублях */
    private $amount;

    /**
     * @Assert\Length(max=255)
     * @var string Описание платежа
     */
    private $comment;

    /**
     * @var array Структура с дополнительными параметрами магазина
     */
    private $extra;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return PaymentTransaction
     */
    public function setId(int $id): PaymentTransaction
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $orderId
     * @return PaymentTransaction
     */
    public function setOrderId(string $orderId): PaymentTransaction
    {
        $this->orderId = $orderId;
        return $this;
    }

    /**
     * @return PaymentStatus
     */
    public function getStatus(): PaymentStatus
    {
        return $this->status;
    }

    /**
     * @param PaymentStatus $status
     * @return PaymentTransaction
     */
    public function setStatus(PaymentStatus $status): PaymentTransaction
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    /**
     * @param string $paymentMethod
     * @return PaymentTransaction
     */
    public function setPaymentMethod(string $paymentMethod): PaymentTransaction
    {
        $this->paymentMethod = $paymentMethod;
        return $this;
    }

    /**
     * @return PaymentParams
     */
    public function getPaymentParams(): PaymentParams
    {
        return $this->paymentParams;
    }

    /**
     * @param PaymentParams $paymentParams
     * @return PaymentTransaction
     */
    public function setPaymentParams(PaymentParams $paymentParams): PaymentTransaction
    {
        $this->paymentParams = $paymentParams;
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
     * @return PaymentTransaction
     */
    public function setAmount(float $amount): PaymentTransaction
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     * @return PaymentTransaction
     */
    public function setComment(string $comment): PaymentTransaction
    {
        $this->comment = $comment;
        return $this;
    }

    /**
     * @return object
     */
    public function getExtra(): object
    {
        return $this->extra;
    }

    /**
     * @param object $extra
     * @return PaymentTransaction
     */
    public function setExtra(object $extra): PaymentTransaction
    {
        $this->extra = $extra;
        return $this;
    }
}