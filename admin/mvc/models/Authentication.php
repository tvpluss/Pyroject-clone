<?php
class Authentication extends DB
{
    public function CheckUsename($Usename)
    {
        $query = "SELECT * FROM user WHERE Usename=? LIMIT 1";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "s", $Usename);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if ($row != false) {
            return true;
        } else return false;
    }

    public function Login($username, $password)
    {
        if (empty($username) || empty($password)) {
            header("Location: ../Login?error=emptyfields");
            exit();
        } else {
            $sql = "SELECT * FROM user WHERE Usename = ?";
            $stmt = mysqli_stmt_init($this->con);
            //check if query can be perform
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../Login?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                //check if result is empty or not
                if ($row = mysqli_fetch_assoc($result)) {
                    //hash password to check if password is correct
                    $passCheck = password_verify($password, $row['Password']);
                    if ($passCheck == false) {
                        header("Location: ../Login?error=wrongpassword");
                        exit();
                    } else if ($passCheck == true) {
                        $record = $this->select("SELECT ID FROM cart WHERE User_ID = " . $row['ID']);
                        $cartId = mysqli_fetch_assoc($record)['ID'];
                        //password is correct
                        //create Session
                        if ($row['User_Type'] != "admin") {
                            header("Location: ../Login?error=notAdmin");
                            exit();
                        }
                        $_SESSION['cartId'] = $cartId;
                        $_SESSION['sessionId'] = $row['ID'];
                        $_SESSION['sessionUser'] = $row['Usename'];
                        $_SESSION['sessionFirstName'] = $row['First_Name'];
                        $_SESSION['sessionLastName'] = $row['Last_Name'];
                        $_SESSION['sessionUser'] = $row['Usename'];
                        $_SESSION['sessionEmail'] = $row['Email'];
                        $_SESSION['sessionTelephone'] = $row['Telephone'];
                        $_SESSION['sessionUser'] = $row['Usename'];
                        $_SESSION['sessionAuth'] = $row['User_Type'];
                        //redirect user to homepage
                        header("Location: ../Index?success=loggedin");
                        exit();
                    } else {
                        header("Location: ../Login?error=wrongpassword");
                        exit();
                    }
                } else {
                    header("Location: ../Intro?error=nouser");
                    exit();
                }
            }
        }
    }
}
