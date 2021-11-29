<?php
class changePassword extends Controller
{
    public function Default()
    {
        $this->view("changePassword");
    }
    public function Process()
    {
        $ID = $_SESSION['sessionId'];
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $model = $this->model("Authentication");
        echo $model->changePassword($ID, $oldPassword, $newPassword);
        // echo "change" . $ID . $oldPassword . $newPassword;
    }
}
