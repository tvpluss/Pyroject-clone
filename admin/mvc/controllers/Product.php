<?php
class Product extends Controller
{
    function Default()
    {

        if (isset($_GET["ID"])) {
            $this->EditProduct($_GET["ID"]);
        } else {
            $limit = 5;
            if (!isset($_GET['page'])) {
                header("Location: ./Product?page=1");
                exit();
            }
            $model = $this->model("ProductModel");
            $data = [];
            $data['totalProducts'] = $model->getTotalProducts();
            $data['totalPages'] = ceil($data['totalProducts'] / $limit);
            $data['currentPage'] = $_GET['page'];
            if ($data['totalPages'] == 0) {
                $data['totalPages'] = 1;
            }
            if ($data['currentPage'] <= 0) {
                header("Location: ./Product?page=1");
                exit();
            }
            if ($data['currentPage'] > $data['totalPages']) {
                header("Location: ./Product?page=" . $data['totalPages']);
                exit();
            }
            $data['products'] = $model->getAllProductsBetter(($data['currentPage'] - 1) * $limit, $limit);

            // echo json_encode($result);

            // print_r($data['totalPages']);
            // $this->view("product", $data);
            // $this->model("ProductModel");
            // $this->view("product");
            // $model = $this->model("ProductModel");
            // $data = $model->getAllProducts();
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
