<?php

class Order extends Controller
{
  public function Default()
  {

    if (isset($_GET["orderId"])) {
      $this->getOrder();
    } else {
      $model = $this->model("OrderModel");
      $data = $model->getAllOrders();
      $this->view("order", $data);
    }
  }
  public function getOrder()
  {
    $id = $_GET["orderId"];
    $model = $this->model("OrderModel");
    $data = $model->getOrder($id);
    $this->view("orderdetails", $data);
  }
  public function changeStatus()
  {
    $orderId = $_POST["orderId"];
    $status = $_POST["status"];
    $model = $this->model("OrderModel");
    $data = $model->updateOrderStatus($status, $orderId);
    echo $data;
  }
}