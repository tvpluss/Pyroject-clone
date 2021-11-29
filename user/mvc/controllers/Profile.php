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
    public function Default()
    {
        $this->view("profile");
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
}
