<?php
class Product extends Controller
{
    // function __construct()
    // {

    //     // echo $_SESSION['sessionId'];
    //     // $this->model("ProductModel");
    //     // $this->view("product");

    // }



    public function getCartItemQuantity($productId, $cartId)
    {
        $model = $this->model("CartModel");
        $result = $model->getCartItemQuantity($productId, $cartId);
        return $result;
    }
    public function addToCart()
    {
        $productId = $_POST['productId'];
        $cartId = intval($_POST['cartId']);
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
        $model = $this->model("CartModel");
        $result = $model->addToCart($productId, $cartId, $quantity);
        echo $result;
    }
    public function Details()
    {
        $id = $_GET['ID'];
        $model = $this->model("ProductModel");
        $data = $model->get_details_catalog($id);
        // $data2 = $model->get_details_catalog($id);
        $this->view("details", $data);
    }
    public function Default()
    {
        $limit = 4;

        if (!isset($_GET['page'])) {
            header("Location: ./Product?page=1");
            exit();
        }
        if (isset($_GET["limit"])) {
            $limit = 100;
        }
        $model = $this->model("ProductModel");
        $data = [];
        $data['totalProducts'] = $model->getTotalProducts();
        $data['totalPages'] = ceil($data['totalProducts'] / $limit);
        $data['currentPage'] = $_GET['page'];
        if ($data['currentPage'] <= 0) {
            header("Location: ./Product?page=1");
            exit();
        }
        if ($data['currentPage'] > $data['totalPages']) {
            header("Location: ./Product?page=" . $data['totalPages']);
            exit();
        }
        $data['products'] = $model->getAllProductsBetter(($data['currentPage'] - 1) * $limit, $limit);

        // echo json_encode($result);

        // print_r($data['totalPages']);
        $this->view("product", $data);
        // $this->model("ProductModel");
        // $this->view("product");
    }
}
