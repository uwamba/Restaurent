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

        $sqn=Stock::where('consumable_id',$data['consumable_id'])->where('status','in')->orderBy('sequence_number','desc')->first()->sequence_number ?? 0;

        $sqn=$sqn + 1;

        $lastTotalQuantity=Stock::where('consumable_id',$data['consumable_id'])->where('status','in')->orderBy('sequence_number','desc')->first()->total_quantity_after ?? 0;
        $lastQuantity=Stock::where('consumable_id',$data['consumable_id'])->where('status','in')->orderBy('sequence_number','desc')->first()->quantity ?? 0;
        $lastValue=Stock::where('consumable_id',$data['consumable_id'])->where('status','in')->orderBy('sequence_number','desc')->first()->total_value_after ?? 0;
        //dd($lastQuantity);
        $newdata=[
            'user_id' => Auth::user()->id,
            'trans_type' => 'in',
            'sequence_number' =>0,
            'remain' => '0',
            'total_quantity_before' => $lastQuantity,
            'total_quantity_after' => $lastQuantity + $data['quantity'],
            'total_value_before' =>0,
            'total_value_after' =>0,
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

       public function stockOut(Array $data){
        DB::beginTransaction();

        $lastTotalQuantity=Stock::where('consumable_id',$data['consumable_id'])->latest()->first()->total_quantity_after ?? 0;
        $lastQuantity=Stock::where('consumable_id',$data['consumable_id'])->latest()->first()->quantity ?? 0;


           try {
            $qty=$data['quantity'];
            $qty = -1 * abs($qty);
                 $newdata=[
                    'user_id' => Auth::user()->id,
                    'trans_type' => 'out',
                    'remain' =>'0',
                    'unit_price'=>$price,
                    'quantity' =>$qty,
                    'total_quantity_before' => $lastTotalQuantity,
                    'total_quantity_after' => $lastTotalQuantity - $data['quantity'],
                    'total_value_before' => 0,
                    'total_value_after' => 0,
                ];
                $allData=array_merge($data,$newdata);
                $created=Stock::create($allData);

            DB::commit();
            return ['msg'=>'created','desc'=>'successfuly updated'];

           } catch(\Illuminate\Database\QueryException $ex){
            return ['msg'=>'error','desc'=>$ex->getMessage()];

          }


        return $created;
    }



}
