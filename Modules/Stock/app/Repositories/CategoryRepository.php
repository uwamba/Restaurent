<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Contracts\CategoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CategoryRepository implements CategoryInterface{


    public function all(){
        $categories=Category::all();
        return  $categories;
    }
    public function update($id,array $data){
        try {
            DB::beginTransaction();
            Category::whereId($id)->update($data);
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
            $created=Category::create($data);
            return ['msg'=>'created','desc'=>'successfuly created'];

           } catch(\Illuminate\Database\QueryException $ex){
            return ['msg'=>'error','desc'=>$ex->getMessage()];

          }


        return $created;
    }



}
