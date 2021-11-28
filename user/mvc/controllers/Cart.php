<?php
require_once "Errors.php";

class Cart extends Controller
{

    public function Default()
    {
        $this->pageError = new Errors;
        if (isset($_SESSION['cartId'])) {
            if (isset($_GET['cartId'])) {
                if ($_GET['cartId'] != $_SESSION['cartId']) {
                    $this->pageError->Default("You don't have permision to view this cart");
                } else {
                    $model = $this->model("CartModel");
                    $result = $model->viewCart($_GET['cartId']);
                    $this->view("cart", $result);
                }
            } else {
                $this->pageError->Default("Please specify which cart to view");
            }
        } else {
            $this->pageError->Default("No permision to view cart");
        }
        // echo "This is the cart page";
    }
    public function getCartItemQuantity($productId, $cartId)
    {
        $model = $this->model("CartModel");
        $result = $model->getCartItemQuantity($productId, $cartId);
        return $result;
    }
    public function addToCart()
    {
        $productId = $_POST['productId'];
        $cartId = intval($_POST['cartId']);
        $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : 1;
        $model = $this->model("CartModel");
        $result = $model->addToCart($productId, $cartId, $quantity);
        echo $result;
    }
}
