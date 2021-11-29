<?php

class Order extends Controller
{
  public function Default()
  {
    $model = $this->model("OrderModel");
    $data = $model->getAllOrders();
    $this->view("order", $data);
  }
}