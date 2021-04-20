<?php


namespace VertxOne\Symfony\RaiffeisenRu\Ecom\Type;


use Symfony\Component\Validator\Constraints as Assert;

class PaymentNotification
{
    /**
     * @Assert\NotBlank()
     * @Assert\EqualTo("payment")
     * @var string Тип сообщения
     */
    public $event;

    /** @var PaymentTransaction */
    public $transaction;
}