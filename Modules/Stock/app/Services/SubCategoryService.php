<?php

namespace App\Services;

use App\Contracts\SubCategoryInterface;

class SubCategoryService

{
    protected $subCategoryRepository;
    public function __construct(SubCategoryInterface $subCategoryRepository) {
        $this->subCategoryRepository=$subCategoryRepository;

    }


    public function getAll()
    {
        return $this->subCategoryRepository->all();
    }
    public function getAllCategories()
    {
        return $this->subCategoryRepository->getCategories();
    }

    public function save(array $data){
     return $this->subCategoryRepository->save($data);
    }

}
