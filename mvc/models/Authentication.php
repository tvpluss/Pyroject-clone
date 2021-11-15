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

    public function Register($username, $password, $confirmPassword)
    {

        //check if any varible is empty
        if (empty($username) || empty($password) || empty($confirmPassword)) {
            header("Location: ./Register?error=emptyfields&username=" . $username);
            exit();
        }
        // check if username have any invalid character
        else if (!preg_match("/^[a-zA-Z0-9]*/", $username)) {
            header("Location: ./Register?error=invalidusername&username=" . $username);
            exit();
        }
        //check if the confirm password matched
        else if ($password !== $confirmPassword) {
            header("Location: ./Register?error=passwordsdonotmatch&username=" . $username);
            exit();
        }
        // check if username is already taken
        else {
            //prepared statement increased security in our database

            $sql = "SELECT username FROM user WHERE username =?";
            $stmt = mysqli_stmt_init($this->con);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ./Register?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $rowCount = mysqli_stmt_num_rows($stmt);

                if ($rowCount > 0) {
                    header("Location: ./Register?error=usernametaken");
                    exit();
                } else {
                    //Finally, after all check, we insert into database
                    $sql = "INSERT INTO user (username, password) VALUES (?, ?)";
                    $stmt = mysqli_stmt_init($this->con);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ./Register?error=sqlerror");
                        exit();
                    } else {
                        //hash password
                        $hashPass = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ss", $username, $hashPass);
                        mysqli_stmt_execute($stmt);
                        header("Location: ./Register?success=registered");
                        exit();
                    }
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($this->con);
    }
}
