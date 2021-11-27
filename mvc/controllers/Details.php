<?php
class Details extends Controller
{
    function __construct()
    {

        // echo $_SESSION['sessionId'];
        //$this->model("ProductModel");
        //$this->model("DetailsModel");
        //$this->model("CategoryModel");
        //$this->view("Details");


    }
    public function Default()
    {
        $id = isset($_GET['ID']) ? $_GET['ID'] : 0;
        $model = $this->model("ProductModel");
        $data = $model->get_details_catalog($id);
        // $data2 = $model->get_details_catalog($id);
        $this->view("details", $data);
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
}
