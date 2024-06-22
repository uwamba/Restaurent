<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;


class OrderMenu extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'menu_id',
        'quantity',
    ];

}
