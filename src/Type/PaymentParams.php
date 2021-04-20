<?php


namespace VertxOne\Symfony\RaiffeisenRu\Ecom\Type;


class PaymentParams
{
    /** @var string string <= 12 characters Номер для идентификации */
    private $rrn;


    /** @var string string <= 6 characters Код авторизации платежа, полученный от эмитента */
    private $authCode;

    /** @var string - ИД QR-кода */
    private $qrId;

    /**
     * @return string
     */
    public function getRrn(): string
    {
        return $this->rrn;
    }

    /**
     * @param string $rrn
     * @return PaymentParams
     */
    public function setRrn(string $rrn): PaymentParams
    {
        $this->rrn = $rrn;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthCode(): string
    {
        return $this->authCode;
    }

    /**
     * @param string $authCode
     * @return PaymentParams
     */
    public function setAuthCode(string $authCode): PaymentParams
    {
        $this->authCode = $authCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getQrId(): string
    {
        return $this->qrId;
    }

    /**
     * @param string $qrId
     * @return PaymentParams
     */
    public function setQrId(string $qrId): PaymentParams
    {
        $this->qrId = $qrId;
        return $this;
    }
}