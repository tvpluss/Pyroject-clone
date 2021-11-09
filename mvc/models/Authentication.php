<?php
class Authentication extends DB
{
    public function Login($username, $password)
    {
        if (empty($username) || empty($password)) {
            header("Location: ./Login?error=emptyfields");
            exit();
        } else {
            $sql = "SELECT * FROM user WHERE username = ?";
            $stmt = mysqli_stmt_init($this->con);
            //check if query can be perform
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ./Login?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                //check if result is empty or not
                if ($row = mysqli_fetch_assoc($result)) {
                    //hash password to check if password is correct
                    $passCheck = password_verify($password, $row['password']);
                    if ($passCheck == false) {
                        header("Location: ./Login?error=wrongpassword");
                        exit();
                    } else if ($passCheck == true) {
                        //password is correct
                        //create Session
                        $_SESSION['sessionId'] = $row['ID'];
                        $_SESSION['sessionUser'] = $row['username'];
                        //redirect user to homepage
                        header("Location: ./Intro?success=loggedin");
                        exit();
                    } else {
                        header("Location: ./Intro?error=wrongpassword");
                        exit();
                    }
                } else {
                    header("Location: ./Intro?error=nouser");
                    exit();
                }
            }
        }
    }
}
