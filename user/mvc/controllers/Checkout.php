<?php

require_once "./mvc/core/Format.php";
class Checkout extends Controller
{
    public function Default()
    {
        $data = $_POST['data'];
        $newData = json_decode($data, true);
        $this->view("checkout", $newData);
    }
}
