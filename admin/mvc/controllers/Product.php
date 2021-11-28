<?php
class Product extends Controller
{
    function Default()
    {
        $this->view("showProduct");
    }
    function Edit()
    {
        $this->view("editProduct");
        // print_r($_POST);
        // $model = $this->model("ProductModel");
        // $model->insert_product($_POST);
    }
    function ProcessEdit()
    {
    }
}
