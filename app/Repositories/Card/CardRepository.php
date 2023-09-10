<?php

namespace App\Repositories\Card;

use App\Repositories\BaseRepository;
use App\Models\Card;


class CardRepository extends BaseRepository implements CardInterface
{
    protected $model;

    public function __construct(Card $model)
    {
        $this->model = $model;
    }

}
