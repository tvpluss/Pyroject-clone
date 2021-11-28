<?php
class ShowProduct extends Controller
{
    function Default()
    {
        $model = $this->model("ProductModel");
        $data = $model->getAllProducts();
        // echo json_encode($result);

        // print_r($result);
        $this->view("ShowProduct", $data);
    }
    function Process()
    {
        
    }
}