<?php
class Register extends Controller
{
    function Default()
    {
        $this->view("register");
    }
    function Process()
    {
        // print_r($_POST);
        $register = array(
            'lastname' => $_POST['lastname'],
            'firstname' => $_POST['firstname'],
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'password' => $_POST['password'],
            'confirmPassword' => $_POST['confirmPassword'],
            'streetAddress' => "",
            'townCity' => "",
            'account' => "",
            'bankName' => ""
        );
        $model = $this->model("Authentication");
        $result = $model->Register($register);
        echo $result;
    }
    function CheckUsename()
    {
        $array = [];
        $model = $this->model("Authentication");
        $array["result"] = $model->CheckUsename($_GET['Usename']);
        echo json_encode($array);
    }
}
