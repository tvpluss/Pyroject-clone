<?php
class Contact extends Controller
{
    function Default()
    {
        $this->view("contact");
    }
    function Sayhi()
    {
        // print_r($_POST);
        $model = $this->model("Authentication");
        $model->Login($_POST['username'], $_POST['password']);
    }
    function Submit()
    {
        echo "Submit";
    }
}
