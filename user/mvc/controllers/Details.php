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
        if (isset($_GET['ID'])) {
            $id = $_GET['ID'];
            $model = $this->model("ProductModel");
            $data = $model->getProductsBetter($id);
            // print_r($data);
            // $data = $model->get_details_catalog($id);
            // $data2 = $model->get_details_tag($id);
            // print_r($data);
            // print_r($data2);
            $this->view("details", $data);
        } else {
            require_once "./mvc/controllers/Errors.php";
            $error = new Errors;
            $error->Default("No Product ID");
        }
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
