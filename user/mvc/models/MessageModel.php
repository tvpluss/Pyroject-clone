<?php
class MessageModel extends DB
{
    public function Submit($Name, $Telephone, $Email, $Message_content)
    {

        $Created = date("Y-m-d H:i:s");
        $Status = "Mới";
        $query = "INSERT INTO contact(Name, Telephone, Email, Message_content, Created, Status) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($this->con);
        if (!mysqli_stmt_prepare($stmt, $query)) {
            // header("Location: ../Contact?error=stmterror");
            return false;
            exit();
        } else {
            mysqli_stmt_bind_param(
                $stmt,
                "ssssss",
                $Name,
                $Telephone,
                $Email,
                $Message_content,
                $Created,
                $Status
            );
            mysqli_stmt_execute($stmt);
            return true;
            // header("Location: ../Contact?success=sent");
            exit();
        }
        mysqli_close($this->con);
    }
}
