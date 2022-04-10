<?php
class ReviewModel extends DB
{
    public function addReview($productID, $name, $email, $content)
    {
        $status = "Xác nhận";
        $sql = "INSERT INTO review(ProductID, Content, Email, Name, Status) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($this->con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            return 0;
        } else {
            mysqli_stmt_bind_param($stmt, "sssss", $productID, $content, $email, $name, $status);
            mysqli_stmt_execute($stmt);
            return "addedreview";
        }
    }
    public function getReview($productID)
    {
        $sql = "SELECT * FROM review WHERE ProductID = ?";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s", $productID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $reviews = [];
        if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $review = array(
                    'ID' => $row['ID'],
                    'Content' => $row['Content'],
                    'Email' => $row['Email'],
                    'Name' => $row['Name'],
                    'Status' => $row['Status']
                );
                array_push($reviews, $review);
            }
        }
        return $reviews;
    }
}
