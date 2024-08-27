<?php

namespace App\Services;

use App\Contracts\StockInterface;

class StockService

{
    protected $stockRepository;
    public function __construct(StockInterface $stockRepository) {
        $this->stockRepository=$stockRepository;

    }


    public function getAll()
    {
        return $this->stockRepository->all();
    }

    public function save(array $data){
     return $this->stockRepository->save($data);
    }
    public function stockOut(array $data){
        return $this->stockRepository->stockOut($data);
       }

}
