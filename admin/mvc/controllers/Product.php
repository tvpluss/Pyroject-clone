<?php
class Product extends Controller
{
    function Default()
    {
        $this->view("showProduct");
    }
    function Edit()
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
    function ProcessEdit()
    {
    }
}
