<?php
class EditProduct extends Controller
{
    function Default()
    {
        if (isset($_POST['ID'])) {
            $id = $_POST['ID'];
            $model = $this->model("ProductModel");
            $data = $model->get_details_catalog($id);
            //$data2 = $model->get_details_tag($id);
            $this->view("editProduct", $data[0]);
        } else {
            require_once "./mvc/controllers/Errors.php";
            $error = new Errors;
            $error->Default("No Product ID");
        }
    }
    function Process(){
        if($_GET["del"]==1){
            $model = $this->model("ProductModel");
            $model->del_product($_POST['ID']);
        }
        else{
        print_r($_POST);
        $model = $this->model("ProductModel");
        $model->update_product($_POST,$_POST['ID']);
        }
    }
}
