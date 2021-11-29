
<?php
class ShowNews extends Controller
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
        $this->view("ShowNews", $Articles);
    }
    function Article($data)
    {
        // echo ($data);
        $model = $this->model("ArticleModel");
        $Article = $model->getArticle($data);

        if ($Article == false) {
            header("Location: ./Index?error=noArticle");
            // echo "No Article Found";
            exit();
        } else {
            $data = [];
            $data['Article'] = $Article;
            $data['Articles'] = $this->GetAllArticles();
            print_r($data);
            // $this->view("article", $data);
        };
    }
    function Process(){
        if($_GET["del"]==1){
            $model = $this->model("ArticleModel");
            $model->deleteArticle($_POST['ID']);
        }
        else{
        print_r($_POST);
        $model = $this->model("ProductModel");
        $model->update_product($_POST,$_POST['ID']);
        }
    }
}
