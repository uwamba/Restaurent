<?php

namespace app\Contracts;

interface OrderInterface{
    public function orderlist();
    public function orderUpdate($id,array $data);
    public function orderDelete($id);
    public function orderFind($id);
    public function orderItemsList($order_id);
    public function orderApprove($order_id);
    public function orderInvoice($order_id);
    public function orderCreate(array $data);
}
