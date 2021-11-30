<?php

class Order extends Controller
{
  public function Default()
  {

    if (isset($_GET["orderId"])) {
      $this->getOrder();
    } else {
      $limit = 10;
      if (!isset($_GET['page'])) {
        header("Location: ./Order?page=1");
        exit();
      }
      $model = $this->model("OrderModel");
      $data = [];
      $data['totalOrders'] = $model->getTotalOrders();
      $data['totalPages'] = ceil($data['totalOrders'] / $limit);
      $data['currentPage'] = $_GET['page'];
      if ($data['totalPages'] == 0) {
        $data['totalPages'] = 1;
      }
      if ($data['currentPage'] <= 0) {
        header("Location: ./Order?page=1");
        exit();
      }
      if ($data['currentPage'] > $data['totalPages']) {
        header("Location: ./Order?page=" . $data['totalPages']);
        exit();
      }
      $data['orders'] = $model->getAllOrdersWLimit(($data['currentPage'] - 1) * $limit, $limit);

      // echo json_encode($result);

      // print_r($data['totalPages']);
      // $this->view("Order", $data);
      // $this->model("OrderModel");
      // $this->view("Order");
      // $model = $this->model("OrderModel");
      // $data = $model->getAllOrders();
      // $this->view("ShowOrder", $data);
      // $model = $this->model("OrderModel");
      // $data = $model->getAllOrders();
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
