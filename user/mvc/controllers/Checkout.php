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
    public function Process()
    {
        // echo $_POST['ID'];
        $model = $this->model("OrderModel");
        $result = $model->insertAnOrder($_POST['ID'], $_POST['LastName'], $_POST['FirstName'], $_POST['Email'], $_POST['Telephone'], $_POST['StreetAddress'], $_POST['TownCity'], $_POST['Account'], $_POST['BankName']);
        echo $result;
    }
}
