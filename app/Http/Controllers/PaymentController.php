<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Services\CardService;
use App\Services\OrderService;
use App\Services\PaymentService;

class PaymentController extends Controller
{
    protected $order_service, $card_service, $payment_service;

    public function __construct(OrderService $order_service,CardService $card_service,PaymentService $payment_service)
    {
        $this->order_service = $order_service;
        $this->card_service = $card_service;
        $this->payment_service = $payment_service;
    }

    public function index($order_token){
        $order = $this->order_service->order($order_token);
        return view('payment', compact('order'));
    }

    public function makePayment(PaymentRequest $request, $order_token){
        // Order Check
        $order = $this->order_service->checkOrder($order_token);
        if($order['status']=='error'){
            toastr()->error($order['msg']);
            return redirect()->back();
        }

        // Card Check
        $card = $this->card_service->checkCard($request);
        if($card['status']=='error'){
            toastr()->error($card['msg']);
            return redirect()->back(); 
        }

        return $this->payment_service->makePayment($order['order'], $card['card']);

    }
}
