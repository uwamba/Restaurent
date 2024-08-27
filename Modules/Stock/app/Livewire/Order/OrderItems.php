<?php

namespace App\Livewire\Order;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\Menu;
use App\Models\Order;


class OrderItems extends ModalComponent
{
    public  $order;
    public $menus = [];
    public function mount()
    {

        //$this->menus = Menu::all();
        $this->menus=Order::where('id',$this->order)->get();

    }
    public function render()
    {
        return view('livewire.order.order-items');
    }
}
