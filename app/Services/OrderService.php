<?php

namespace App\Services;

use App\Contracts\OrderInterface;

class OrderService

{
    protected $orderRepository;
    public function __construct(OrderInterface $orderRepository) {
        $this->orderRepository=$orderRepository;

    }


    public function getAll()
    {
        return $this->orderRepository->all();
    }


    public function save(array $data){
     return $this->orderRepository->save($data);
    }

}
