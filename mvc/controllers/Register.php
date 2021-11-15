<?php
class Register extends Controller
{
    function __construct()
    {
        $this->view("register");
        if (isset($_POST['submit'])) {
            // echo "post called";
            $this->post();
        }
    }
    function post()
    {
        $model = $this->model("Authentication");
        $model->Register($_POST['username'], $_POST['password'], $_POST['confirmPassword']);
    }
}
