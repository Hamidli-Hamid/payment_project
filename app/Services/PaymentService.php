<?php

namespace App\Services;

use App\Repositories\Card\CardInterface;
use App\Repositories\Payment\PaymentInterface;

class PaymentService
{
    protected $order_repo, $payment_repo, $card_repo;

    public function __construct(PaymentInterface $payment_repo, CardInterface $card_repo)
    {
        $this->payment_repo = $payment_repo;
        $this->card_repo = $card_repo;
    }



    public function makePayment($order, $card)
    {
        $balance_status = $this->checkBalance($order, $card);

        if ($balance_status == 1) {
            $this->save_payment($order, $card, 1);
            toastr()->success('Your payment has been processed successfully');
        } else {
            $this->save_payment($order, $card, 3);
            toastr()->error('You dont have enough funds in your balance');
            return redirect()->back();
        }
        return redirect()->route('order.index');
    }

    
    public function checkBalance($order, $card)
    {
        if ($order->amount <= $card->balance) {
            return 1;
        } else{
            return 0;
        }
    }



    public function save_payment($order, $card, $status)
    {
        if($status==1){
            $this->balanceUpdate($card, $order->amount);
        }
        $params = $this->getPaymentParams($order, $card, $status);
        return $this->payment_repo->create($params);
    }

    protected function balanceUpdate($card, $amount){
        $card->balance = $card->balance - $amount;
        $card->save();
        return true;
    }

    protected function getPaymentParams($order, $card, $status)
    {
        return [
            'fk_id_order' => $order->id,
            'fk_id_card'  => $card->id,
            'amount'      => $order->amount,
            'status'      => $status
        ];
    }


}
