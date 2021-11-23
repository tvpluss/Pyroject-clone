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
        require_once "./mvc/controllers/Errors.php";
        $error = new Errors;
        $error->Default("No profile");
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
        echo ("
            <div>
            <h1>You have logged out</h1>
            <a href=\"../Index\">Go back to home</a>
            </div>");
    }
}
