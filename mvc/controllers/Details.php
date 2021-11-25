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
    public function Default($id){
        $model = $this->model("ProductModel");
        $data = $model->get_details_catalog($id);
        $data2= $model->get_details_catalog($id);
        $this->view("Details",$data,$data2);
    }
}