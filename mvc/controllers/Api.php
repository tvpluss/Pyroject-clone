<?php
class Api extends Controller
{
    function CheckUsename()
    {
        // echo json_encode(array("array", "ID"));
        // return "ID";
        // echo $_GET['Usename'];
        $array = [];
        $model = $this->model("Authentication");
        $array["result"] = $model->CheckUsename($_GET['Usename']);
        echo json_encode($array);
    }
}
