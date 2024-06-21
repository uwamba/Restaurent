<?php

namespace App\Services;

use App\Contracts\ConsumableInterface;

class ConsumableService

{
    protected $consumableRepository;
    public function __construct(ConsumableInterface $consumableRepository) {
        $this->consumableRepository=$consumableRepository;

    }


    public function getAll()
    {
        return $this->consumableRepository->all();
    }
    public function getAllCategories()
    {
        return $this->consumableRepository->getCategories();
    }

    public function save(array $data){
     return $this->consumableRepository->save($data);
    }

}
