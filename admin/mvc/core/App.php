<?php
class App
{
    // QUAN TRỌNG: Path so với index.php
    // Đại diện cho địa chỉ, mặc định là Home
    protected $controller = "Error";
    // // Đại diện cho hoạt động, Mặc định là default
    protected $action = "Default";
    // // Đối số truyền vào 
    protected $params = [];

    function __construct()
    {

        $arr = $this->UrlProcess();
        if (empty($arr)) {
            $arr[0] = "Index";
        }
        // print_r($arr);
        // Controller
        if (isset($_SESSION['sessionAuth'])) {
        } else {
            $arr[0] = "Login";
        }
        if (file_exists("./mvc/controllers/" . $arr[0] . ".php")) {
            $this->controller = $arr[0];
            unset($arr[0]);
        } else {
            $this->controller = "Errors";
        }
        // print_r($this->controller);
        // Nếu không thay đổi giá trị, controller mặc định là home -> lấy controller phù hợp
        require_once "./mvc/controllers/" . $this->controller . ".php";
        // Controller chỉ mới là kiểu string, phải đưa nó về lại 1 cái controller đúng nghĩa
        $this->controller = new $this->controller;

        // Xử lý Action
        if (isset($arr[1])) {
            //Kiểm tra nếu có tồn tại action
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
            // Params
            $this->params = $arr ? array_values($arr) : [];
            // print_r($this->params);
            call_user_func_array([$this->controller, $this->action], $this->params);
        } else {
            call_user_func([$this->controller, $this->action]);
        }
    }
    // Lấy Url dưới dạng mảng
    function UrlProcess()
    {
        if (isset($_GET["url"])) {
            // Lấy các đối số, bỏ kí hiệu /
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
