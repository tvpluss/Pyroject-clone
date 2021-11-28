<?php

class Article extends Controller
{


    public function Default() // echo ($data);
    {
        $data = $_GET['articleId'];
        $model = $this->model("ArticleModel");
        $Article = $model->getArticle($data);
        if ($Article == false) {
            echo "No Article Found";
        } else {
            // print_r($Article);
            $this->view("article", $Article);
        };
    }
}
