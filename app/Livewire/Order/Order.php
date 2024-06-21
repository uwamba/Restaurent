<?php

namespace App\Livewire\Order;

use Livewire\Component;
use App\Models\Category;

class Order extends Component
{
    public function render()
    {
        return view('livewire.order.order');
    }
    public $orderProducts = [];
    public $allProducts = [];

    public function mount()
    {
        $this->allProducts = Category::all();
        $this->orderProducts = [
            ['product_id' => '', 'quantity' => 1]
        ];
    }

    public function addProduct()
    {
        $this->orderProducts[] = ['product_id' => '', 'quantity' => 1];
    }

    public function removeProduct($index)
    {
        unset($this->orderProducts[$index]);
        $this->orderProducts = array_values($this->orderProducts);
    }


}
