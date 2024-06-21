<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Category;

use App\Contracts\SubCategoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SubCategoryRepository implements SubCategoryInterface{


    public function all(){
        $categories=SubCategory::all();
        return  $categories;
    }
    public function getCategories(){
        $categories=Category::all();
        return  $categories;
    }
    public function update($id,array $data){
        try {
            DB::beginTransaction();
            SubCategory::whereId($id)->update($data);
            DB::commit();
            return ['msg'=>'created','desc'=>'successfuly updated'];
        } catch(\Illuminate\Database\QueryException $ex){
            return ['msg'=>'error','desc'=>$ex->getMessage()];
        }
    }
    public function delete($id){

    }
    public function find($id){

    }

    public function save(Array $data){

           try {
            $created=SubCategory::create($data);
            return ['msg'=>'created','desc'=>'successfuly created'];

           } catch(\Illuminate\Database\QueryException $ex){
            return ['msg'=>'error','desc'=>$ex->getMessage()];

          }


        return $created;
    }



}
