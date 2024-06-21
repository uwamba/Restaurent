<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;


class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'total_quantity_before',
        'total_quantity_after',
        'total_price',
        'unit_price',
        'total_value_before',
        'total_value_after',
        'consumable_id',
        'user_id',
    ];

    public function consumable()
    {
        return $this->belongsTo(Consumable::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
