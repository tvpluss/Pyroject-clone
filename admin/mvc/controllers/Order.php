<?php

class Order extends Controller
{
  public function Default()
  {

    if (isset($_GET["orderId"])) {
      $id = $_GET["orderId"];
      $model = $this->model("OrderModel");
      $data = $model->getOrder($id);
      $this->view("orderdetails", $data);
    } else {
      $model = $this->model("OrderModel");
      $data = $model->getAllOrders();
      $this->view("order", $data);
    }
  }
}