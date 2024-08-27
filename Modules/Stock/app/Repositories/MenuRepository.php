<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

use App\Contracts\MenuInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MenuRepository implements MenuInterface{


    public function all(){
        $menu=Menu::all();
        return  $menu;
    }

    public function update($id,array $data){
        try {
            DB::beginTransaction();
            Menu::whereId($id)->update($data);
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
            $created=Menu::create($data);
            return ['msg'=>'created','desc'=>'successfuly created'];

           } catch(\Illuminate\Database\QueryException $ex){
            return ['msg'=>'error','desc'=>$ex->getMessage()];

          }


        return $created;
    }



}
