<?php
class Login extends Controller
{
    function __construct()
    {
        $this->view("login");
    }
    function Process()
    {
        // print_r($_POST);
        $model = $this->model("Authentication");
        $model->Login($_POST['username'], $_POST['password']);
    }
}
