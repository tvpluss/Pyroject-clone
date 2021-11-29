<?php

class Article extends Controller
{

    function GetAllArticles()
    {
        $model = $this->model("ArticleModel");
        $Articles = $model->getAllArticles();
        return $Articles;
    }
    public function Default() // echo ($data);
    {
        $data = $_GET['articleId'];
        $model = $this->model("ArticleModel");
        $Article = $model->getArticle($data);
        if ($Article == false) {
            header("Location: ./News?error=noArticle");
            // echo "No Article Found";
            exit();
        } else {
            $data = [];
            $data['Article'] = $Article;
            $data['Articles'] = $this->GetAllArticles();
            // print_r($data);
            $this->view("article", $data);
        };
    }
}
