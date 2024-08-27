<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Requests\SubCategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\PaginationHelper;
use App\Services\SubCategoryService;
use Illuminate\View\View;

class SubCategoryController extends Controller
{
    protected $subCategoryService;

    public function __construct(SubCategoryService $subCategoryService)
    {
        $this->subCategoryService = $subCategoryService;

    }
    public function index(Request $request): View
    {
        $data =  $this->subCategoryService->getAll();
        $subCategories = PaginationHelper::paginate($data, 10);
        return view('admin.subCategory.index',['subCategories'=>$subCategories ]);
    }
    public function create(Request $request): View
    {
        $categories =  $this->subCategoryService->getAllCategories();
        return view('admin.subCategory.add',['categories'=>$categories ]);
    }


    public function store(SubCategoryRequest $request): RedirectResponse
    {
       // $validated = $request->validated()->toArray();

        $data=[
            'name' => $request->name,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'description' =>$request->descriptions,
        ];
        $resp=$this->subCategoryService->save($data);
        if($resp["msg"]=="created"){
            return redirect()->route('subCategory.index', ['created'=>'successfuly created']);
         }else{
             return redirect()->back()->with('error', $th->getMessage());
         }




        return Redirect::route('index')->with('status', 'successfully save');
    }

}
