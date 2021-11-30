<?php
class Profile extends Controller
{
    function __construct()
    {
        if (!isset($_SESSION['sessionId'])) {
            require_once "./mvc/controllers/Errors.php";
            $error = new Errors;
            $error->Default("No profile");
        }
    }
    public function viewHistory()
    {
        $limit = 5;
        if (!isset($_GET['page'])) {
            header("Location: ./Profile?action=viewhistory&page=1");
        }
        $data = [];
        $sessionId = $_SESSION['sessionId'];
        $model = $this->model("OrderModel");
        $data['totalOrders'] = $model->getNumOfOrder($sessionId);
        $data['totalPages'] = ceil($data['totalOrders'] / $limit);
        $data['currentPage'] = $_GET['page'];
        if ($data['currentPage'] <= 0) {
            header("Location: ./Profile?action=viewhistory&page=1");
            exit();
        }
        if ($data['currentPage'] > $data['totalPages']) {
            header("Location: ./Profile?action=viewhistory&page=" . $data['totalPages']);
            exit();
        }
        $data['Orders'] = $model->getBuyingHistory($sessionId, ($data['currentPage'] - 1) * $limit, $limit);
        // print_r($data);
        $this->view("history", $data);
    }
    public function Default()
    {
        if (isset($_GET['action'])) {
            if ($_GET['action'] == "edit") {
                $this->view("profile");
            } else if ($_GET['action'] == "changepassword") {
                $this->view("changePassword");
            } else if ($_GET['action'] == "viewhistory") {
                $this->viewHistory();
            } else if ($_GET['action'] = "vieworder") {
                $sessionId = $_SESSION['sessionId'];
                if ($_GET['userId'] != $sessionId) {
                    header("Location: ./Index?error=nopermission");
                } else {
                    $model = $this->model("OrderModel");
                    $data = $model->getOrder($_GET['orderId']);
                    // print_r($data);
                    $this->view("vieworder", $data);
                }
            }
        } else {
            $this->view("profile");
        }
    }
    public function Logout()
    {
        // Initialize the session.
        // If you are using session_name("something"), don't forget it now!
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        // Unset all of the session variables.
        $_SESSION = array();

        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(
                session_name(),
                '',
                time() - 42000,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }

        // Finally, destroy the session.
        session_destroy();
        header("Location: ../Index.php");
    }
    public function Edit()
    {
        // Luu thong tin vao database
        $newProfile = array(
            'ID' => $_SESSION['sessionId'],
            'Last_Name' => $_POST['Last_Name'],
            'First_Name' => $_POST['First_Name'],
            'Usename' => $_POST['Usename'],
            'Email' => $_POST['Email'],
            'Telephone' => $_POST['Telephone'],
            'Street_Address' => $_POST['Street_Address'],
            'Town_City' => $_POST['Town_City'],
            'Postcode_ZIP' => $_POST['Postcode_ZIP'],
            'Account' => $_POST['Account'],
            'Bank_Name' => $_POST['Bank_Name'],
        );
        // print_r($newProfile);
        $model = $this->model("Authentication");
        echo ($model->updateProfile($newProfile));
        // header("Location: ../Profile");
    }
    public function changePassword()
    {
        $ID = $_SESSION['sessionId'];
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
        $model = $this->model("Authentication");
        echo $model->changePassword($ID, $oldPassword, $newPassword);
        // echo "change" . $ID . $oldPassword . $newPassword;
    }
}
