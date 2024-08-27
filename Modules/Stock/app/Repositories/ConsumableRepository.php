<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\Consumable;

use App\Contracts\ConsumableInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ConsumableRepository implements ConsumableInterface{


    public function all(){
        $categories=Consumable::all();
        return  $categories;
    }
    public function getCategories(){
        $categories=Consumable::all();
        return  $categories;
    }
    public function update($id,array $data){
        try {
            DB::beginTransaction();
            Consumable::whereId($id)->update($data);
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
            $created=Consumable::create($data);
            return ['msg'=>'created','desc'=>'successfuly created'];

           } catch(\Illuminate\Database\QueryException $ex){
            return ['msg'=>'error','desc'=>$ex->getMessage()];

          }


        return $created;
    }



}
