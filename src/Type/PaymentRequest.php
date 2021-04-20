<?php


namespace VertxOne\Symfony\RaiffeisenRu\Ecom\Type;


use Symfony\Component\Validator\Constraints as Assert;

class PaymentRequest
{
    /**
     * @Assert\NotBlank()
     * @var string Идентификатор магазина
     */
    private $publicId;

    /**
     * @Assert\NotBlank()
     * @var float Сумма платежа в рублях
     */
    private $amount;

    /**
     * @Assert\Length
     * @var string Идентификатор заказа в магазине
     */
    private $orderId;

    /** @var string URL ресурса, куда будет перенаправлен клиент в случае успешного платежа */
    private $successUrl;

    /** @var string URL ресурса, куда будет перенаправлен клиент в случае неуспешного платежа */
    private $failUrl;

    public function __construct(float $amount, ?string $orderId = null, ?string $successUrl = null, ?string $failUrl = null)
    {
        $this->amount = $amount;
        $this->orderId = $orderId;
        $this->successUrl = $successUrl;
        $this->failUrl = $failUrl;
    }

    /**
     * @param string $publicId
     * @return PaymentRequest
     */
    public function setPublicId(string $publicId): PaymentRequest
    {
        $this->publicId = $publicId;
        return $this;
    }


    public function buildQuery(): string
    {
        $data = [
            'publicId' => $this->publicId,
            'amount' => $this->amount,
        ];

        if($this->orderId) {
            $data['orderId'] = $this->orderId;
        }

        if($this->successUrl) {
            $data['successUrl'] = $this->successUrl;
        }

        if($this->orderId) {
            $data['failUrl'] = $this->failUrl;
        }

        return http_build_query($data);
    }
}