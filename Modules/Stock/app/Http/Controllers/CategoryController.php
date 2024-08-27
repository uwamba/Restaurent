<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Category;
use App\Helpers\PaginationHelper;
use App\Services\CategoryService;
use Illuminate\View\View;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;

    }
    public function index(Request $request): View
    {
        $data =  $this->categoryService->getAll();
        $categories = PaginationHelper::paginate($data, 10);
        return view('admin.category.index',['categories'=>$categories ]);
    }
    public function create(Request $request): View
    {
        return view('admin.category.add');
    }


    public function store(CategoryRequest $request): RedirectResponse
    {
       // $validated = $request->validated()->toArray();

        $data=[
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'description' =>$request->descriptions,
        ];
        $resp=$this->categoryService->save($data);
        if($resp["msg"]=="created"){
            return redirect()->route('category.index', ['created'=>'successfuly created']);
         }else{
             return redirect()->back()->with('error', $th->getMessage());
         }




        return Redirect::route('index')->with('status', 'successfully save');
    }

}
