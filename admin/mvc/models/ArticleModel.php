<?php
class ArticleModel extends DB
{
    public function getAllArticles()
    {
        $query = "SELECT ID, Title, Author, Post_Date, Content, Picture FROM news";
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
                    'Post_Date' => $row['Post_Date'],
                    'Content' => $row['Content'],
                    'Picture' => $row['Picture'],
                );
                array_push($articles, $article);
            }
        }
        return $articles;
    }
    public function getArticle($ID)
    {
        // $query = "SELECT ID, Title, Author, Post_Date, Picture FROM news WHERE ID=? LIMIT 1";
        // $stmt = mysqli_stmt_init($this->con);
        // mysqli_stmt_prepare($stmt, $query);
        // mysqli_stmt_execute($stmt);
        // $result = mysqli_stmt_get_result($stmt);
        // $articles = [];
        
        //         $article = array(
        //             'ID' => $result['ID'],
        //             'Title' => $result['Title'],
        //             'Author' => $result['Author'],
        //             'Post_Date' => $result['Post_Date'],
        //             'Picture' => $result['Picture']
        //         );
                
        
        // return $article;
        $this->db = new DB();
        //$this->fm = new Format();
        $query = "SELECT ID, Title, Author, Post_Date, Content, Picture FROM news WHERE ID=?";
        $stmt = mysqli_stmt_init($this->db->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt,'s',$ID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $items = [];
        
            $row = $result->fetch_assoc();
                $item = array(
                    'ID' => $row['ID'],
                    'Title' => $row['Title'],
                    'Author' => $row['Author'],
                    'Post_Date' => $row['Post_Date'],
                    'Content' => $row['Content'],
                    'Picture' => $row['Picture']
                );
                array_push($items, $item);
    
        
        return $item;

    }
    public function insertArticle($Title, $Author, $Post_Date, $Content, $Picture)
    {
        if(empty($Title) || empty($Author) || empty($Post_Date) || empty($Content) || empty($Picture)){
            return false;
        }
        else{
            $query = "INSERT INTO news(Title, Author, Post_Date, Content, Picture) VALUES (?,?,?,?,?)";
            $stmt = mysqli_stmt_init($this->con);
            mysqli_stmt_prepare($stmt, $query);
            mysqli_stmt_bind_param($stmt, "sssss", $Title, $Author, $Post_Date, $Content, $Picture);
            mysqli_stmt_execute($stmt);
            if (mysqli_affected_rows($this->con) > 0) {
                header("Location: ../ShowNews?success=addNews");
                    exit();
            } else {
                return false;
            }
        }
    }
    public function updateArticle($ID, $Title, $Author, $Post_Date, $Content, $Picture)
    {
        echo $ID;
        if(empty($ID) || empty($Title) || empty($Author) || empty($Post_Date) || empty($Content) || empty($Picture)){
            return false;
        }
        else{
            $query = "UPDATE news SET Title=?, Author=?, Post_Date=?, Content=?, Picture=? WHERE ID=?";
            $stmt = mysqli_stmt_init($this->con);
            mysqli_stmt_prepare($stmt, $query);
            mysqli_stmt_bind_param($stmt, "ssssss", $Title, $Author, $Post_Date, $Content, $Picture, $ID);
            mysqli_stmt_execute($stmt);
            if (mysqli_affected_rows($this->con) > 0) {
                header("Location: ../ShowNews?success=update");
                    exit();
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
            header("Location: ../ShowNews?success=deleteNews");
                    exit();
        } else {
            return false;
        }
    }
}
