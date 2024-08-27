<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\PaginationHelper;
use App\Services\MenuService;
use Illuminate\View\View;

class MenuController extends Controller
{

    protected $menuService;
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  $this->menuService->getAll();
        $menu = PaginationHelper::paginate($data, 10);
        return view('admin.menu.index',['menu'=>$menu]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.menu.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $data=[

            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'discount' => $request->discount,
            'user_id' =>Auth::user()->id,

        ];
        $resp=$this->menuService->save($data);
        if($resp["msg"]=="created"){
            return redirect()->route('menu.index', ['created'=>'successfuly created']);
         }else{
             return redirect()->back()->with('error', $resp["desc"]);
         }




        return Redirect::route('index')->with('status', 'successfully save');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $consumable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $consumable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $consumable)
    {
        //
    }
}
