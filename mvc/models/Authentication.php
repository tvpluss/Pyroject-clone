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
                        //password is correct
                        //create Session
                        $_SESSION['sessionId'] = $row['ID'];
                        $_SESSION['sessionUser'] = $row['Usename'];
                        $_SESSION['sessionFirstName'] = $row['First_Name'];
                        $_SESSION['sessionLastName'] = $row['Last_Name'];
                        $_SESSION['sessionUser'] = $row['Usename'];
                        $_SESSION['sessionEmail'] = $row['Email'];
                        $_SESSION['sessionTelephone'] = $row['Telephone'];
                        $_SESSION['sessionUser'] = $row['Usename'];
                        //redirect user to homepage
                        header("Location: ../Intro?success=loggedin");
                        exit();
                    } else {
                        header("Location: ../Intro?error=wrongpassword");
                        exit();
                    }
                } else {
                    header("Location: ../Intro?error=nouser");
                    exit();
                }
            }
        }
    }

    public function Register($array)
    {
        // print_r($array);
        //check if any varible is empty
        if (empty($array['username']) || empty($array['password']) || empty($array['confirmPassword'])) {
            header("Location: ../Register?error=emptyfields&username=" . $array['username']);
            exit();
        }
        // check if username have any invalid character
        else if (!preg_match("/^[a-zA-Z0-9]*/", $array['username'])) {
            header("Location: ../Register?error=invalidusername&username=" . $array['username']);
            exit();
        }
        //check if the confirm password matched
        else if ($array['password'] !== $array['confirmPassword']) {
            header("Location: ../Register?error=passwordsdonotmatch&username=" . $array['username']);
            exit();
        }
        // check if username is already taken
        else {
            //prepared statement increased security in our database

            $sql = "SELECT Usename FROM user WHERE Usename =?";
            $stmt = mysqli_stmt_init($this->con);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../Register?error=sqlerror");
                exit();
            } else {
                mysqli_stmt_bind_param($stmt, "s", $array['username']);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $rowCount = mysqli_stmt_num_rows($stmt);

                if ($rowCount > 0) {
                    header("Location: ../Register?error=usernametaken");
                    exit();
                } else {
                    //Finally, after all check, we insert into database
                    $sql = "INSERT INTO user (Last_Name, First_Name, Usename ,Password, Email, Telephone, Street_Address, Town_City, Postcode_ZIP, Account, Bank_Name, User_Type ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'member' )";
                    $stmt = mysqli_stmt_init($this->con);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../Register?error=stmterror");
                        exit();
                    } else {
                        //hash password
                        $hashPass = password_hash($array['password'], PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param(
                            $stmt,
                            "sssssssssss",
                            $array['lastname'],
                            $array['firstname'],
                            $array['username'],
                            $hashPass,
                            $array['email'],
                            $array['telephone'],
                            $array['streetAddress'],
                            $array['townCity'],
                            $array['postcode'],
                            $array['account'],
                            $array['bankName']

                        );
                        mysqli_stmt_execute($stmt);
                        header("Location: ../Register?success=registered");
                        exit();
                    }
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($this->con);
    }
}
