<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'category_id',
        'description',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function UserCreateSubCategory()
    {
        return $this->belongsTo(User::class);
    }
}
