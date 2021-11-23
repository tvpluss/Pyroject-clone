<?php
class Article extends DB
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
}
