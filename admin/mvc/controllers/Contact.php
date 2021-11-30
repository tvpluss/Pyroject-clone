<?php

class Contact extends Controller
{
    public function Default()
    {
        $model = $this->model("ContactModel");
        $data = $model->getAllContact();
        $this->view("contact", $data);
    }
    public function changeStatus()
    {
        $messageId = $_POST['messageId'];
        $status = $_POST['status'];
        $model = $this->model("ContactModel");
        $data = $model->updateContactStatus($status, $messageId);
        echo $data;
    }
}
