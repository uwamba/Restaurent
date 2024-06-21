<?php

namespace App\Http\Requests;

use App\Models\Caategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\SubCategory;
use App\Helpers\PaginationHelper;
use App\Services\SubCategoryService;
use Illuminate\View\View;

class SubCategoryRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:300','unique:sub_categories'],
            'category_id' => ['required'],
            'descriptions' => ['required'],
        ];
    }
}
