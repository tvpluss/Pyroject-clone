<?php
require_once "./mvc/core/Format.php";

class CartModel extends DB
{
	public function getCartItemQuantity($productId, $cartId)
	{
		// echo "hello";
		$sql = "SELECT * FROM cart_item_list WHERE cart_ID = ? AND product_ID = ?";
		$stmt = mysqli_stmt_init($this->con);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			return "Sql error";
			// header("Location: ../Product?error=sqlerror");
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "ss", $cartId, $productId);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$row = mysqli_fetch_assoc($result);
			// echo ("<script>console.log(" . $row['quantity'] . ")</script>");
			// return 
			if ($row == false) {
				return 0;
			} else {
				return $row['quantity'];
			}
		}
	}
	public function substractOnCart($productId, $cartId)
	{
		$currentQuantity = $this->getCartItemQuantity($productId, $cartId);
		$quantity = $currentQuantity - 1;
		if ($quantity == 0) {
			$sql = "DELETE FROM cart_item_list  WHERE cart_ID = ? AND product_ID = ?";
			$stmt = mysqli_stmt_init($this->con);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				return 0;
			} else {
				mysqli_stmt_bind_param($stmt, "ss", $cartId, $productId);
				mysqli_stmt_execute($stmt);
				return 1;
			}
		}
		$sql = "UPDATE cart_item_list SET quantity = ? WHERE cart_ID = ? AND product_ID = ?";
		$stmt = mysqli_stmt_init($this->con);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			return 0;
		} else {
			mysqli_stmt_bind_param($stmt, "sss", $quantity, $cartId, $productId);
			mysqli_stmt_execute($stmt);
			return 1;
		}
	}
	public function addToCart($productId, $cartId, $quantity = 1)
	{
		$currentQuantity = $this->getCartItemQuantity($productId, $cartId);
		if ($currentQuantity == 0) {
			$sql = "INSERT INTO cart_item_list(cart_ID, product_ID, quantity) VALUES (?, ?, ?)";
			$stmt = mysqli_stmt_init($this->con);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				return 0;
			} else {
				mysqli_stmt_bind_param($stmt, "sss", $cartId, $productId, $quantity);
				mysqli_stmt_execute($stmt);
				return 1;
			}
		} else {
			$quantity += $currentQuantity;
			$sql = "UPDATE cart_item_list SET quantity = ? WHERE cart_ID = ? AND product_ID = ?";
			$stmt = mysqli_stmt_init($this->con);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				return 0;
			} else {
				mysqli_stmt_bind_param($stmt, "sss", $quantity, $cartId, $productId);
				mysqli_stmt_execute($stmt);
				return 1;
			}
			// return $currentQuantity;
		}
		// $query = "INSERT "
	}
	public function viewCart($cartId)
	{
		$query = "SELECT * FROM cart_item_list, product WHERE cart_item_list.product_ID = product.ID AND cart_item_list.cart_ID = ?";
		$stmt = mysqli_stmt_init($this->con);
		if (!mysqli_stmt_prepare($stmt, $query)) {
			return 0;
		} else {
			mysqli_stmt_bind_param($stmt, "s", $cartId);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			$items = [];
			$fm = new Format();
			if ($result->num_rows > 0) {
				while ($row = $result->fetch_assoc()) {
					$item = array(
						'ID' => $row['product_ID'],
						'Nane' => $row['Nane'],
						'Picture' => $row['Picture'],
						'quantity' => $row['quantity'],
						'Sell_price' => $row['Sell_price'],
					);
					array_push($items, $item);
				}
			}
			return $items;
		}
	}
	// public function add_to_cart($quantity, $id){
	//     //CÁI NÀY H LÀM TRONG DB CŨ, CHƯA FIX CHO VỪA VỚI DB NÀY, DB CŨ THÌ TRONG CART CÓ PRODUCT
	// 	$quantity = $this->fm->validation($quantity);
	// 	$quantity = mysqli_real_escape_string($this->db->con, $quantity);
	// 	$id = mysqli_real_escape_string($this->db->con, $id);
	// 	$sId = session_id();
	// 	$check_cart = "SELECT * FROM cart WHERE productId = '$id' AND sId ='$sId'";
	// 	$result_check_cart = $this->db->select($check_cart);
	// 	if($result_check_cart){
	// 		$msg = "<span class='error'>Sản phẩm đã được thêm vào</span>";
	// 		return $msg;
	// 	}else{

	// 		$query = "SELECT * FROM product WHERE productId = '$id'";
	// 		$result = $this->db->select($query)->fetch_assoc();

	// 		$image = $result["image"];
	// 		$price = $result["price"];
	// 		$productName = $result["productName"];

	// 		$query_insert = "INSERT INTO cart(productId,quantity,sId,image,price,productName) VALUES('$id','$quantity','$sId','$image','$price','$productName')";
	// 		$insert_cart = $this->db->insert($query_insert);
	// 		if($insert_cart){
	// 			$msg = "<span class='error'>Thêm sản phẩm thành công</span>";
	// 			return $msg;

	// 		}
	// 	}

	// }


	// public function update_quantity_cart($quantity, $cart_ID, $productid){
	// 	$quantity = mysqli_real_escape_string($this->db->con, $quantity);
	// 	$cart_ID = mysqli_real_escape_string($this->db->con, $cart_ID);
	//     $productid = mysqli_real_escape_string($this->db->con, $productid);
	// 	$query = "UPDATE cart_item_list SET

	// 			quantity = '$quantity'

	// 			WHERE cart_ID = '$cart_ID', product_id = '$productid'";
	// 	$result = $this->db->update($query);
	// 	if($result){
	// 		$msg = "<span class='error'>Cập nhật thành công</span>";
	// 		return $msg;
	// 	}else{
	// 		$msg = "<span class='error'> Không thanh cong</span>";
	// 		return $msg;
	// 	}

	// }
	// public function del_product_cart($cart_ID){
	// 	$cart_ID = mysqli_real_escape_string($this->db->con, $cart_ID);
	// 	$query = "DELETE FROM cart_item_list WHERE cartId = '$cart_ID'";
	// 	$result = $this->db->delete($query);
	// 	if($result){
	//         //trả về dòng đã xóa sp
	// 		$msg = "<span class='error'>Xóa sản phẩm thành công</span>";
	// 		return $msg;

	// 	}
	// }

	// public function check_cart(){
	// 	$sId = session_id();
	// 	$query = "SELECT * FROM cart WHERE sId = '$sId'";
	// 	$result = $this->db->select($query);
	// 	return $result;
	// }

	// public function del_all_data_cart(){
	// 	$sId = session_id(); 
	// 	$query = "DELETE FROM cart WHERE sId = '$sId'";
	// 	$result = $this->db->delete($query);
	// 	//coi lại cho tương khích nha P

	// }




}
