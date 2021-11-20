<?php
class Register extends Controller
{
    function __construct()
    {
        $this->view("register");
    }
    function post()
    {
        $model = $this->model("Authentication");
        $model->Register($_POST['username'], $_POST['password'], $_POST['confirmPassword']);
    }

    function Sayhi()
    {
        print_r($_POST);
    }
}
