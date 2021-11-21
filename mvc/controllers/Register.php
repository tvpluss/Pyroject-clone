<?php
class Register extends Controller
{
    function __construct()
    {
        $this->view("register");
    }
    function Process()
    {
        // print_r($_POST);
        $model = $this->model("Authentication");
        $model->Register($_POST);
    }
    function CheckID()
    {
        return "ID";
    }
}
