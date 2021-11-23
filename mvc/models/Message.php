<?php
class Message extends DB
{
    public function Submit($Name, $Telephone, $Email, $Message_content)
    {
        $query = "INSERT INTO contact(Name, Telephone, Email, Message_content) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($this->con);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            // header("Location: ../Contact?error=stmterror");
            return false;
            exit();
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                "ssss",
                $Name,
                $Telephone,
                $Email,
                $Message_content
            );
            mysqli_stmt_execute($stmt);
            return true;
            // header("Location: ../Contact?success=sent");
            exit();
        }
        mysqli_close($this->con);
    }
}
