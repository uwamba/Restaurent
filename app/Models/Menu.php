<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;


class Menu extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'discount',
        'user_id',
    ];

    public function Order()
    {
        return $this->belongsTo(Order::class);
    }
    public function OrderMenu()
    {
        return $this->hasOne(OrderMenu::class);
    }



    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
