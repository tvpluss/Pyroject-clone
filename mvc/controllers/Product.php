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
        $model = $this->model("ProductModel");
        $data = $model->getAllProducts();
        // echo json_encode($result);

        // print_r($result);
        $this->view("product", $data);
        // $this->model("ProductModel");
        // $this->view("product");
    }
}
