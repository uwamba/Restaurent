<?php

namespace App\Http\Controllers;

use App\Models\Consumable;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Http\Requests\SubCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\PaginationHelper;
use App\Services\ConsumableService;
use Illuminate\View\View;

class ConsumableController extends Controller
{

    protected $consumableService;
    public function __construct(ConsumableService $consumableService)
    {
        $this->consumableService = $consumableService;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  $this->consumableService->getAll();
        $consumables = PaginationHelper::paginate($data, 10);
        return view('admin.consumables.index',['consumables'=>$consumables ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        $subCategory=SubCategory::all();
        return view('admin.consumables.add',['categories'=>$categories,'subCategory'=>$subCategory]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=[
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'maximum_items' =>$request->min,
            'minimum_items' =>$request->max,
            'unit' =>$request->unit,
            'subcategory_id' =>$request->subcategory_id,
        ];
        $resp=$this->consumableService->save($data);
        if($resp["msg"]=="created"){
            return redirect()->route('consumable.index', ['created'=>'successfuly created']);
         }else{
             return redirect()->back()->with('error', $th->getMessage());
         }




        return Redirect::route('index')->with('status', 'successfully save');
    }

    /**
     * Display the specified resource.
     */
    public function show(Consumable $consumable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Consumable $consumable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consumable $consumable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consumable $consumable)
    {
        //
    }
}
