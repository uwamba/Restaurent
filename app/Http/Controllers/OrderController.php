<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\PaginationHelper;
use App\Services\OrderService;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{

    protected $orderService;
    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  $this->orderService->getAll();
        $orders = PaginationHelper::paginate($data, 10);
        return view('admin.order.index',['orders'=>$orders ]);
    }

    public function invoice($order)
    {

        $data =  Order::where('id',$order)->get();
        $pdf = Pdf::loadView('admin.invoices.order_invoice',['orders'=>$data]);
        return $pdf->download('$order'.'_invoice'.'.pdf');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.order.add');
    }



    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'phone' => $request->phone,
            'user_id' => "1",
            'description' => $request->customer_name,
        ]);

        foreach ($request->orderMenus as $menu) {
            $price=Menu::where('id', $menu['menu_id'])->value('price');
            $order->menus()->attach($menu['menu_id'],
                ['quantity' => $menu['quantity'],'price' => $price]);

        }

        /* $data=[
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'description' => $request->description,
        ];
        $resp=$this->orderService->save($data);
        if($resp["msg"]=="created"){
            return redirect()->route('order.index', ['created'=>'successfuly created']);
         }else{
             return redirect()->back()->with('error', $resp["desc"]);
         }
        */




        return Redirect::route('order.index')->with('status', 'successfully save');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
