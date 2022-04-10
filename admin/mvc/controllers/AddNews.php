<?php
class AddNews extends Controller
{
    function Default()
    {
        $this->view("addNews");
    }
    function Process()
    {
        print_r($_POST);
        $model = $this->model("ArticleModel");
        $model->insertArticle($_POST['Title'],$_POST['Author'],$_POST['Post_Date'],$_POST['Content'],$_POST['Picture']);
    }
}