<?php
class Login extends Controller
{
    function __construct()
    {
        $this->view("login");
        if (isset($_POST['submit'])) {
            // echo "post called";
            $this->post();
        }
    }
    function post()
    {
        $model = $this->model("Authentication");
        $model->Login($_POST['username'], $_POST['password']);
    }
}
