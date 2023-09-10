<?php

namespace App\Services;

use App\Repositories\Order\OrderInterface;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OrderService
{
    protected $order_repo;

    public function __construct(OrderInterface $order_repo)
    {
        $this->order_repo = $order_repo;
    }

    public function order($order_token)
    {
        return $this->order_repo->first(['order_token' => $order_token]);
    }

    public function checkOrder($order_token)
    {
        $order = $this->order($order_token);
        if (!$order) {
            $status = 'error';
            $msg = 'Order not found';
            $order = [];
        }else{
            $status = 'success';
            $msg = 'Success';
            $order = $order; 
        }
        return [
            'status' => $status,
            'msg'    => $msg,
            'order'   => $order
        ];
    }

    public function createOrder($params){
        $params['order_token'] = (string) Str::uuid();
        try {
            $order = $this->order_repo->create($params);
            return $order;
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return false;
        }
    }

}