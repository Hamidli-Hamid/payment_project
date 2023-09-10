<?php

namespace App\Services;

use App\Repositories\Card\CardInterface;
use App\Repositories\Order\OrderInterface;
use App\Repositories\Payment\PaymentInterface;

class CardService
{
    protected $order_repo, $payment_repo, $card_repo;

    public function __construct(OrderInterface $order_repo, PaymentInterface $payment_repo, CardInterface $card_repo)
    {
        $this->order_repo = $order_repo;
        $this->payment_repo = $payment_repo;
        $this->card_repo = $card_repo;
    }


    public function card($request)
    {
        $date = explode('/', $request->date);
        $date_month = $date[0];
        $date_year = $date[1];
        $params = [
            'card_number' => str_replace(' ', '', $request->card_number),
            'date_month' => $date_month,
            'date_year' => '20' . $date_year,
            'cvv' => $request->cvv,
            'full_name' => $request->full_name,
        ];
        return $this->card_repo->first($params);
    }

    public function checkCard($request)
    {
        $card = $this->card($request);
        if (!$card) {
            $status = 'error';
            $msg = 'Card information is incorrect';
            $card = [];
        }
        elseif ($card->status != 1) {
            $status = 'error';
            $msg = $card->status_msg;
        }else{
            $status = 'success';
            $msg = 'Success';
        }
        return [
            'status' => $status,
            'msg'    => $msg,
            'card'   => $card
        ];
    }

}
