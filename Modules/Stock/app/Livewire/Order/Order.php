<?php

namespace App\Livewire\Order;

use Livewire\Component;
use App\Models\Menu;

class Order extends Component
{
    public function render()
    {
        return view('livewire.order.order');
    }
    public $orderMenus = [];
    public $allMenus = [];
    public $price = 0;
    public $selectedOption=0;

    public function mount()
    {
        $this->allMenus = Menu::all();
        $this->orderMenus = [
            ['menu_id' => '', 'quantity' => 1,'price'=>$this->price]
        ];
    }


    public function addMenu()
    {
        $this->orderMenus[] = ['menu_id' => '', 'quantity' => 1,'price'=> $this->price];
    }


    public function removeMenu($index)
    {
        unset($this->orderMenus[$index]);
        $this->orderMenus = array_values($this->orderMenus);
    }


}
