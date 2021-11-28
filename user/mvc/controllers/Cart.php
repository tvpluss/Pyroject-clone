<?php

class Cart extends Controller
{

    public function Default()
    {
        echo "This is the cart page";
        $this->view("checkout");
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