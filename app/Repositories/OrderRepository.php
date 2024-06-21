<?php

namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

use App\Contracts\OrderInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrderRepository implements OrderInterface{

    public function orderItemsList($order_id){

    }
    public function orderApprove($order_id){

    }
    public function orderInvoice($order_id){

    }
    public function orderCreate(array $data){

    }


    public function orderlist(){
        $Order=Order::all();
        return  $Order;
    }


    public function orderUpdate($id,array $data){
        try {
            DB::beginTransaction();
            Order::whereId($id)->update($data);
            DB::commit();
            return ['msg'=>'created','desc'=>'successfuly updated'];
        } catch(\Illuminate\Database\QueryException $ex){
            return ['msg'=>'error','desc'=>$ex->getMessage()];
        }
    }
    public function orderDelete($id){

    }
    public function orderFind($id){

    }

    public function save(Array $data){

           try {
            $created=Order::create($data);
            return ['msg'=>'created','desc'=>'successfuly created'];

           } catch(\Illuminate\Database\QueryException $ex){
            return ['msg'=>'error','desc'=>$ex->getMessage()];

          }


        return $created;
    }



}
