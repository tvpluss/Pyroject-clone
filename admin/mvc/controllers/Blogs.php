
<?php
class Blogs extends Controller
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
        $limit = 3;
        if (!isset($_GET['page'])) {
            header("Location: ./Blogs?page=1");
            exit();
        }
        $model = $this->model("ArticleModel");
        $data = [];
        $data['totalArticles'] = $model->getTotalArticles();
        $data['totalPages'] = ceil($data['totalArticles'] / $limit);
        $data['currentPage'] = $_GET['page'];
        if ($data['totalPages'] == 0) {
            $data['totalPages'] = 1;
        }
        if ($data['currentPage'] <= 0) {
            header("Location: ./Blogs?page=1");
            exit();
        }
        if ($data['currentPage'] > $data['totalPages']) {
            header("Location: ./Blogs?page=" . $data['totalPages']);
            exit();
        }
        $data['articles'] = $model->getAllArticlesWLimit(($data['currentPage'] - 1) * $limit, $limit);

        $this->view("blogs", $data);
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
    function Process()
    {
        if ($_GET["del"] == 1) {
            $model = $this->model("ArticleModel");
            $model->deleteArticle($_POST['ID']);
        } else {
            print_r($_POST);
            $model = $this->model("ProductModel");
            $model->update_product($_POST, $_POST['ID']);
        }
    }
}
