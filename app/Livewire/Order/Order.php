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

    public function mount()
    {
        $this->allMenus = Menu::all();
        $this->orderMenus = [
            ['menu_id' => '', 'quantity' => 1]
        ];
    }

    public function addMenu()
    {
        $this->orderMenus[] = ['menu_id' => '', 'quantity' => 1];
    }

    public function removeMenu($index)
    {
        unset($this->orderMenus[$index]);
        $this->orderMenus = array_values($this->orderMenus);
    }


}
