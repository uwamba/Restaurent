<?php

namespace app\Contracts;

interface MenuInterface{
    public function all();
    public function update($id,array $data);
    public function delete($id);
    public function find($id);
    public function save(array $date);
}
