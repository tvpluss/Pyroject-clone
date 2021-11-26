<?php
class Register extends Controller
{
    function Default()
    {
        $this->view("register");
    }
    function Process()
    {
        print_r($_POST);
        $model = $this->model("Authentication");
        $model->Register($_POST);
    }
    function CheckUsename()
    {
        $array = [];
        $model = $this->model("Authentication");
        $array["result"] = $model->CheckUsename($_GET['Usename']);
        echo json_encode($array);
    }
}