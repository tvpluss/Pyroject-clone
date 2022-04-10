<?php
class EditNews extends Controller
{
    function Default()
    {
        if (isset($_POST['ID'])) {
            $id = $_POST['ID'];
            $model = $this->model("ArticleModel");
            $data = $model->getArticle($id);
            //$data2 = $model->get_details_tag($id);
            $this->view("editNews", $data);
        } else {
            require_once "./mvc/controllers/Errors.php";
            $error = new Errors;
            $error->Default("No Product ID");
        }
    }
    function Process()
    {
        if ($_GET["del"] == 1) {
            $model = $this->model("ProductModel");
            $model->del_product($_POST['ID']);
        } else {
            print_r($_POST);
            $model = $this->model("ArticleModel");
            $data = $model->updateArticle($_POST['ID'], $_POST['Title'], $_POST['Author'], $_POST['Post_Date'], $_POST['Content'], $_POST['Picture']);
            // $this->view('EditNews', $data);
        }
    }
}
