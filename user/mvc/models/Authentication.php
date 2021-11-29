<?php
class Authentication extends DB
{
    public function changePassword($ID, $oldPassword, $newPassword)
    {
        $query = "SELECT Password FROM user WHERE ID = ?";
        $stmt = mysqli_stmt_init($this->con);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            return "sqlerror";
        } else {
            mysqli_stmt_bind_param($stmt, "s", $ID);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $passCheck = password_verify($oldPassword, $row['Password']);
                if ($passCheck == false) {
                    return "wrongpassword";
                } else {
                    $hashPass = password_hash($newPassword, PASSWORD_DEFAULT);
                    $query = "UPDATE user SET Password = ? WHERE ID = ?";
                    if (!mysqli_stmt_prepare($stmt, $query)) {
                        return "2sqlerror";
                    } else {
                        mysqli_stmt_bind_param($stmt, "ss", $hashPass, $ID);
                        mysqli_stmt_execute($stmt);
                        if (mysqli_stmt_affected_rows($stmt) > 0) {
                            return "success";
                        } else {
                            return "failed";
                        }
                    }
                    // return "rightpassword";
                }
            } else {
                return "nouser";
            }
        }
    }
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
            return "emptyfields";
            header("Location: ../Login?error=emptyfields");
            exit();
        } else {
            $sql = "SELECT * FROM user WHERE Usename = ?";
            $stmt = mysqli_stmt_init($this->con);
            //check if query can be perform
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                return "sqlerror";
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
                        // header("Location: ../Login?error=wrongpassword");
                        return "wrongpassword";
                        exit();
                    } else if ($passCheck == true) {
                        $record = $this->select("SELECT ID FROM cart WHERE User_ID = " . $row['ID']);
                        $cartId = mysqli_fetch_assoc($record)['ID'];
                        //password is correct
                        if (session_status() != PHP_SESSION_ACTIVE) {
                            session_start();
                        }
                        //create Session
                        $_SESSION['cartId'] = $cartId;
                        $_SESSION['sessionId'] = $row['ID'];
                        // $_SESSION['sessionUser'] = $row['Usename'];
                        $_SESSION['sessionFirstName'] = $row['First_Name'];
                        $_SESSION['sessionLastName'] = $row['Last_Name'];
                        $_SESSION['sessionUser'] = $row['Usename'];
                        $_SESSION['sessionEmail'] = $row['Email'];
                        $_SESSION['sessionTelephone'] = $row['Telephone'];
                        $_SESSION['sessionStreetAddress'] = $row['Street_Address'];
                        $_SESSION['sessionTownCity'] = $row['Town_City'];
                        $_SESSION['sessionPostcode'] = $row['Postcode_ZIP'];
                        $_SESSION['sessionAccount'] = $row['Account'];
                        $_SESSION['sessionBankName'] = $row['Bank_Name'];
                        // $_SESSION['sessionUser'] = $row['Usename'];
                        return "loggedin";
                        header("Location: ../Intro?success=loggedin");
                        exit();
                    } else {
                        return "wrongpassword";
                        header("Location: ../Intro?error=wrongpassword");
                        exit();
                    }
                } else {
                    return "nouser";
                    header("Location: ../Intro?error=nouser");
                    exit();
                }
            }
        }
    }
    public function updateProfile($array)
    {
        $sql = "UPDATE user SET Last_Name = ?, First_Name = ?, Usename = ?, Email= ?, Telephone = ?, Street_Address = ?, Town_City = ?, Postcode_ZIP = ?, Account = ?, Bank_Name = ?  WHERE ID = ?";
        $stmt = mysqli_stmt_init($this->con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            return "sqlerror";
        } else {
            foreach ($array as $item) {
                $item = mysqli_real_escape_string($this->con, $item);
            }
            mysqli_stmt_bind_param(
                $stmt,
                "sssssssssss",
                $array['Last_Name'],
                $array['First_Name'],
                $array['Usename'],
                $array['Email'],
                $array['Telephone'],
                $array['Street_Address'],
                $array['Town_City'],
                $array['Postcode_ZIP'],
                $array['Account'],
                $array['Bank_Name'],
                $array['ID']
            );
            mysqli_stmt_execute($stmt);
            if (mysqli_stmt_affected_rows($stmt)) {
                $_SESSION['sessionFirstName'] = $array['First_Name'];
                $_SESSION['sessionLastName'] = $array['Last_Name'];
                $_SESSION['sessionUser'] = $array['Usename'];
                $_SESSION['sessionEmail'] = $array['Email'];
                $_SESSION['sessionTelephone'] = $array['Telephone'];
                $_SESSION['sessionStreetAddress'] = $array['Street_Address'];
                $_SESSION['sessionTownCity'] = $array['Town_City'];
                $_SESSION['sessionPostcode'] = $array['Postcode_ZIP'];
                $_SESSION['sessionAccount'] = $array['Account'];
                $_SESSION['sessionBankName'] = $array['Bank_Name'];
                return "success";
            } else {
                return "failed";
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
                    // header("Location: ../Register?error=usernametaken");
                    return "usernametaken";
                    exit();
                } else {
                    //Finally, after all check, we insert into database
                    $sql = "INSERT INTO user (Last_Name, First_Name, Usename ,Password, Email, Telephone, Street_Address, Town_City, Postcode_ZIP, Account, Bank_Name, User_Type ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'member' )";
                    $stmt = mysqli_stmt_init($this->con);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        // header("Location: ../Register?error=stmterror");
                        return "sqlerror";
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
                        return "registered";
                        // header("Location: ../Login?success=registered");
                        // return true;
                        exit();
                    }
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($this->con);
    }
}
