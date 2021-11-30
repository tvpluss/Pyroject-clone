<?php
require_once "./mvc/core/Format.php";

class ContactModel extends DB
{
  public function getAllContact()
  {
    $query = "SELECT ID, Name, Telephone, Email, Message_content, Created, Status FROM contact ORDER BY Status ASC,Created DESC";
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
          'Status' => $row['Status'],
          'Created' => $row['Created']
        );
        array_push($items, $item);
      }
    }
    return $items;
  }
  public function updateContactStatus($Status, $ID)
  {
    if (empty($Status) || empty($ID)) {
      return 'empty';
    } else {
      $query = "UPDATE contact SET Status=? WHERE ID=?";
      $stmt = mysqli_stmt_init($this->con);
      mysqli_stmt_prepare($stmt, $query);
      mysqli_stmt_bind_param($stmt, "ss", $Status, $ID);
      mysqli_stmt_execute($stmt);
      if (mysqli_affected_rows($this->con) > 0) {
        return 'true';
      } else {
        return 'false';
      }
    }
  }
}
