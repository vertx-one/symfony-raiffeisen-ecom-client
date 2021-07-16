<?php

namespace App\Controller\Raiffeisen;

use App\Service\Payment\Raiffeisen\PaymentClient;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class RefundController extends AbstractController
{
    /**
     * @Route("/raif/payment/refund", name="raif_payment_refund_get")
     */
    public function getRefund(Request $request, PaymentClient $paymentApi)
    {
        $order_id = $request->get('order_id');
        $refund_id = $request->get('refund_id');

        $refund = $paymentApi->getRefund($order_id, $refund_id);
        dd($refund);
    }

    /**
     * @Route("/raif/payment/refund/post", name="raif_payment_refund_post")
     */
    public function postRefund(Request $request, PaymentClient $paymentApi)
    {
        $order_id = $request->get('order_id');
        $refund_id = $request->get('refund_id');
        $amount = $request->get('amount');

        $refund = $paymentApi->postRefund($order_id, $refund_id, $amount);
        dd($refund);
    }
}
