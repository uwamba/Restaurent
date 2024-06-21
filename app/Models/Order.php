<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;


class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'descriptions',
        'user_id',
    ];

    public function menu()
    {
    	return $this->belongsToMany(Menu::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
