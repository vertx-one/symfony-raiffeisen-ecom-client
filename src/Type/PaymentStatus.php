<?php


namespace VertxOne\Symfony\RaiffeisenRu\Ecom\Type;


class PaymentStatus
{
    /** @var string Статус */
    private $value;

    /** @var \DateTimeInterface Дата и время проведения */
    private $date;

    public function isSuccessful(): bool
    {
        return $this->value === 'SUCCESS';
    }

    public function isNotFound(): bool
    {
        return $this->value === 'NOT_FOUND';
    }

    public function isCanceled(): bool
    {
        return $this->value === 'CANCEL';
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): void
    {
        $this->value = $value;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): void
    {
        $this->date = $date;
    }
}