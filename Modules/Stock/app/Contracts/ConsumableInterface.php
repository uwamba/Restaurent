<?php

namespace app\Contracts;

interface ConsumableInterface{
    public function all();
    public function update($id,array $data);
    public function delete($id);
    public function find($id);
    public function save(array $date);
}
