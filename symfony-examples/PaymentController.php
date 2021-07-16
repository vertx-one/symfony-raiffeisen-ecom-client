<?php

namespace App\Controller\Raiffeisen;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Serializer\SerializerInterface;

class PaymentController extends AbstractController
{
    /**
     * @Route("/raif/payment/form", name="raif_test")
     */
    public function form(Request $request, PaymentClient $paymentApi, UrlGeneratorInterface $urlGenerator)
    {
        $successUrl = null;
        $failUrl = null;

        $orderId = $request->get('order_id');

        if($request->get('urls')) {
            $successUrl = $urlGenerator->generate('raif_payment_status', ['id' => $orderId], UrlGeneratorInterface::ABSOLUTE_URL);
            $failUrl = $urlGenerator->generate('raif_payment_status', ['id' => $orderId], UrlGeneratorInterface::ABSOLUTE_URL);
        }

        $paymentRequest = new PaymentRequest($request->get('amount'), $orderId, $successUrl, $failUrl);
        return new Response($paymentApi->createPaymentFormLink($paymentRequest));
    }

    /**
     * @Route("/raif/payment/notification", name="raif_payment_notification")
     */
    public function notification(Request $request, SerializerInterface $serializer)
    {
        $data = $request->getContent();
        $notification = $serializer->deserialize($data, PaymentNotification::class, 'json');
        dd($notification);
    }

    /**
     * @Route("/raif/payment/status", name="raif_payment_status")
     */
    public function status(Request $request, PaymentClient $paymentApi)
    {
        $order_id = $request->get('order_id');
        $orderTransaction = $paymentApi->getOrderStatus($order_id);
        dd($orderTransaction);
    }
}
