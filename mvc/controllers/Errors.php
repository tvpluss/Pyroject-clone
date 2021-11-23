
<?php
class Errors extends Controller
{

    function Default($error = "404 PAGE NOT FOUND")
    {
        echo $error;
        echo ("<a href=\"Index.php\">Quay về trang chính</a>");
        // $url =  "//{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";
        // echo $url;
        // $escaped_url = htmlspecialchars($url, ENT_QUOTES, 'UTF-8');
        // echo '<a href="' . $escaped_url . '">' . $escaped_url . '</a>';
    }
}
