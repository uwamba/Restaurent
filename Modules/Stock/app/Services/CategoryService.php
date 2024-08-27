<?php

namespace App\Services;

use App\Contracts\CategoryInterface;

class CategoryService

{
    protected $categoryRepository;
    public function __construct(CategoryInterface $categoryRepository) {
        $this->categoryRepository=$categoryRepository;

    }


    public function getAll()
    {
        return $this->categoryRepository->all();
    }

    public function save(array $data){
     return $this->categoryRepository->save($data);
    }

}
