<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;


class Consumable extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'unit',
        'maximum_items',
        'minimum_items',
        'category_id',
        'subcategory_id',
        'user_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
