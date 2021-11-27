
<?php
class News extends Controller
{
    function __construct()
    {
        // $this->view("news");
    }
    function GetAllArticles()
    {
        $model = $this->model("ArticleModel");
        $Articles = $model->getAllArticles();
        return $Articles;
    }
    function Default()
    {
        $Articles = $this->GetAllArticles();
        // print_r($Articles);
        $this->view("news", $Articles);
    }
    function Article($data)
    {
        // echo ($data);
        $model = $this->model("ArticleModel");
        $Article = $model->getArticle($data);
        if ($Article == false) {
            echo "No Article Found";
        } else echo $Article;
    }
}
