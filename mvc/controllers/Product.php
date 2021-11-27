<?php
class Product extends Controller
{
    // function __construct()
    // {

    //     // echo $_SESSION['sessionId'];
    //     // $this->model("ProductModel");
    //     // $this->view("product");

    // }
    public function Default()
    {
        $model = $this->model("ProductModel");
        $data = $model->getAllProducts();
        // echo json_encode($result);

        // print_r($result);
        $this->view("product", $data);
        // $this->model("ProductModel");
        // $this->view("product");
    }
    public function Details($data)
    {
        echo "Details" . $data;
    }


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
        // echo 1 . " " . $result;
        // // echo gettype($_POST['cartId']);
        // // echo $_POST['cartId'] . " " . $_POST['productId'];
        // $result = $model->addToCart($_POST['productId'], $_POST['cartId']);
        // // $ID = $_POST['productID'];
        // echo $result;
    }
}
