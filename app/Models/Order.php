<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;



class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_name',
        'phone',
        'description',
        'user_id',
    ];

    public function menus()
    {
    	return $this->belongsToMany(Menu::class,'menu_order', 'order_id', 'menu_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
