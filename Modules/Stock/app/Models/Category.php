<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'description',
    ];
    public function Subcategories()
    {
        return $this->hasMany(SubCategory::class);
    }
    public function UserCreateCategory()
    {
        return $this->belongsTo(User::class);
    }

}
