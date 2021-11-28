<?php
class ArticleModel extends DB
{
    public function getAllArticles()
    {
        $query = "SELECT ID, Title, Author, Post_Date FROM news";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $articles = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $article = array(
                    'ID' => $row['ID'],
                    'Title' => $row['Title'],
                    'Author' => $row['Author'],
                    'Post_Date' => $row['Post_Date']
                );
                array_push($articles, $article);
            }
        }
        return $articles;
    }
    public function getArticle($ID)
    {
        $query = "SELECT Content FROM news WHERE ID=? LIMIT 1";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "s", $ID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if ($row == false) {
            return false;
        } else {
            return $row['Content'];
        }
    }
    public function insertArticle($Title, $Author, $Post_Date, $Content)
    {
        if(empty($Title) || empty($Author) || empty($Post_Date) || empty($Content)){
            return false;
        }
        else{
            $query = "INSERT INTO news(Title, Author, Post_Date, Content) VALUES (?,?,?,?)";
            $stmt = mysqli_stmt_init($this->con);
            mysqli_stmt_prepare($stmt, $query);
            mysqli_stmt_bind_param($stmt, "ssss", $Title, $Author, $Post_Date, $Content);
            mysqli_stmt_execute($stmt);
            if (mysqli_affected_rows($this->con) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function updateArticle($ID, $Title, $Author, $Post_Date, $Content)
    {
        if(empty($ID) || empty($Title) || empty($Author) || empty($Post_Date) || empty($Content)){
            return false;
        }
        else{
            $query = "UPDATE news SET Title=?, Author=?, Post_Date=?, Content=? WHERE ID=?";
            $stmt = mysqli_stmt_init($this->con);
            mysqli_stmt_prepare($stmt, $query);
            mysqli_stmt_bind_param($stmt, "sssss", $Title, $Author, $Post_Date, $Content, $ID);
            mysqli_stmt_execute($stmt);
            if (mysqli_affected_rows($this->con) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function deleteArticle($ID)
    {
        $query = "DELETE FROM news WHERE ID=?";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "s", $ID);
        mysqli_stmt_execute($stmt);
        if (mysqli_affected_rows($this->con) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
