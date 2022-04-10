
<?php
class Errors extends Controller
{

    function Default($error = "404 PAGE NOT FOUND")
    {
        echo $error;
        echo ("<br/><a href=\"Index.php\">Quay về trang chính</a>");
    }
}
