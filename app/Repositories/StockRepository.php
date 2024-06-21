<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\Consumable;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;
use App\Contracts\StockInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StockRepository implements StockInterface{


    public function all(){
        $categories=Stock::all();
        return  $categories;
    }
    public function getCategories(){
        $categories=Stock::all();
        return  $categories;
    }
    public function update($id,array $data){
        try {
            DB::beginTransaction();
            Stock::whereId($id)->update($data);
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
        $lastQuantity=Stock::latest()->first()->total_quantity ?? 0;
        $lastValue=Stock::latest()->first()->total_value ?? 0;

        $newdata=[
            'user_id' => Auth::user()->id,
            'total_quantity_before' => $lastQuantity,
            'total_quantity_after' => $lastQuantity + $data['quantity'],
            'total_value_before' =>$lastValue,
            'total_value_after' =>$data['unit_price'] * $data['quantity'],
        ];
        $allData=array_merge($data,$newdata);

           try {

            $created=Stock::create($allData);
            return ['msg'=>'created','desc'=>'successfuly created'];

           } catch(\Illuminate\Database\QueryException $ex){
            return ['msg'=>'error','desc'=>$ex->getMessage()];

          }


        return $created;
    }



}
