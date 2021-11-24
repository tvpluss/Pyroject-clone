<?php
class product extends Controller
{
    function __construct()
    {

        // echo $_SESSION['sessionId'];
       // $this->model("ProductModel");
       // $this->view("product");

    }
    public function Default(){
        $this->model("ProductModel");
        $this->view("product");
    }
}
