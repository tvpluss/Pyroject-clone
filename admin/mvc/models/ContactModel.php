<?php
require_once "./mvc/core/Format.php";

class ContactModel extends DB
{
  public function getAllContact()
  {
    $query = "SELECT ID, Name, Telephone, Email, Message_content FROM contact";
    $stmt = mysqli_stmt_init($this->con);
    mysqli_stmt_prepare($stmt, $query);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $items = [];
    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $item = array(
          'ID' => $row['ID'],
          'Name' => $row['Name'],
          'Telephone' => $row['Telephone'],
          'Email' => $row['Email'],
          'Message_content' => $row['Message_content'],
        );
        array_push($items, $item);
      }
    }
    return $items;
  }
}