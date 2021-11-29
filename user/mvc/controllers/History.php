<?php
class History extends Controller
{

    public function Default()
    {
        $userId = $_GET['ID'];
        $sessionId = $_SESSION['sessionId'];
        if ($userId == $sessionId) {
            $model = $this->model("OrderModel");
            $data = $model->getBuyingHistory($userId);
            $this->view("History", $data);
        } else {
            header("Location: ./Index?error=nopermission");
        }
    }
}
