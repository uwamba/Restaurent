<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Consumable;
use Illuminate\Http\Request;
use App\Http\Requests\StockRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\PaginationHelper;
use App\Services\StockService;
use Illuminate\View\View;

class StockController extends Controller
{

    protected $stockService;
    public function __construct(StockService $stockService)
    {
        $this->stockService = $stockService;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  $this->stockService->getAll();
        $stocks = PaginationHelper::paginate($data, 10);
        return view('admin.stock.index',['stocks'=>$stocks ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $consumables=Consumable::all();
        return view('admin.stock.add',['consumables'=>$consumables]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data=[
            'consumable_id' => $request->consumable,
            'quantity' => $request->quantity,
            'unit_price' =>$request->unit_price,
        ];
        $resp=$this->stockService->save($data);
        if($resp["msg"]=="created"){
            return redirect()->route('stock.index', ['created'=>'successfuly created']);
         }else{
             return redirect()->back()->with('error', $resp["desc"]);
         }

        return Redirect::route('index')->with('status', 'successfully save');
    }
    public function out(Request $request)
    {

        $consumables=Consumable::all();
        return view('admin.stock.out',['consumables'=>$consumables]);
    }
    public function stockOut(Request $request)
    {

        $data=[
            'consumable_id' => $request->consumable,
            'quantity' => $request->quantity,

        ];
        $resp=$this->stockService->stockOut($data,$id);
        if($resp["msg"]=="created"){
            return redirect()->route('stock.index', ['created'=>'successfuly created']);
         }else{
             return redirect()->back()->with('error', $resp["desc"]);
         }

        return Redirect::route('index')->with('status', 'successfully save');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consumable $consumable)
    {
        //
    }



}
