<?php

namespace App\Services;

use App\Contracts\MenuInterface;

class MenuService

{
    protected $menuRepository;
    public function __construct(MenuInterface $menuRepository) {
        $this->menuRepository=$menuRepository;

    }


    public function getAll()
    {
        return $this->menuRepository->all();
    }

    public function save(array $data){
     return $this->menuRepository->save($data);
    }

}
