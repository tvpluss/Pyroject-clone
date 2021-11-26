<?php
class AddProduct extends Controller
{
    function Default()
    {
        $this->view("addProduct");
    }
    function Process()
    {
        print_r($_POST);
        $model = $this->model("ProductModel");
        $model->insert_product($_POST);
    }
}