<?php
class Product extends Controller
{
    function Default()
    {

        if (isset($_GET["ID"])) {
            $this->EditProduct($_GET["ID"]);
        } else {
            $model = $this->model("ProductModel");
            $data = $model->getAllProducts();
            $this->view("ShowProduct", $data);
        }
    }
    function EditProduct($ID)
    {
        $model = $this->model("ProductModel");
        $data = $model->getProduct($ID);
        // print_r($ID);
        $this->view("editProduct", $data[0]);
    }
    function Save()
    {
        $model = $this->model("ProductModel");
        $model->update_product($_POST, $_POST['ID']);
    }
    function Process()
    {
        if ($_GET["del"] == 1) {
            $model = $this->model("ProductModel");
            $model->del_product($_POST['ID']);
        }
    }
}