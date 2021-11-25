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
    public function Default(){
        $this->model("DetailsModel");
        $this->view("Details");
    }
}