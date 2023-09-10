<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use Faker\Factory as Faker;

class OrderController extends Controller
{
    protected $order_service;

    public function __construct(OrderService $order_service)
    {
        $this->order_service = $order_service;
    }

    public function index()
    {
        $faker = Faker::create();
        $data['full_name'] = $faker->name();
        $data['service'] = $faker->text($maxNbChars = 20);
        $data['amount'] = $faker->randomNumber(3);
        return view('order-page', $data);
    }

    public function submitOrder(OrderRequest $request)
    {
        $order = $this->order_service->createOrder($request->validated());
        if($order){
            return redirect()->route('payment.index', $order->order_token);
        }else{            
            toastr()->error('Oops! Something went wrong!', 'Oops!');
            return redirect()->back();
        }
    }
}
