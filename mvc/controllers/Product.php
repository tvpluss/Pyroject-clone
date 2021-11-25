<?php
class product extends Controller
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
}
