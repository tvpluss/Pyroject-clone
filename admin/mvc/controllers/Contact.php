<?php

class Contact extends Controller
{
    public function Default()
    {
        $model = $this->model("ContactModel");
        $data = $model->getAllContact();
        $this->view("contact", $data);
    }
}