<?php

namespace App\Repositories\Payment;

use App\Repositories\BaseRepository;
use App\Models\Payment;


class PaymentRepository extends BaseRepository implements PaymentInterface
{
    protected $model;

    public function __construct(Payment $model)
    {
        $this->model = $model;
    }

}
