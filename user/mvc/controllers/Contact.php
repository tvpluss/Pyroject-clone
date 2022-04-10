<?php
class Contact extends Controller
{
    function Default()
    {
        $this->view("contact");
    }
    function Submit()
    {
        // echo $_POST;
        $name = $_POST['name'];
        $phonenumber = $_POST['phonenumber'];
        $email = $_POST['email'];
        $content = $_POST['message'];
        $model = $this->model('MessageModel');
        $result = $model->Submit($name, $phonenumber, $email, $content);
        echo $result;
    }
}
