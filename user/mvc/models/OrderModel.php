<?php
require_once "./mvc/core/Format.php";
class OrderModel extends DB
{
    public function getOrder($orderId)
    {
        $query = "SELECT transaction.Quantity, Product_ID, Nane, Picture, Total_amount_of_each_product AS Price  FROM transaction, product WHERE transaction.Product_ID = product.ID AND transaction.Order_ID = ?";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "s", $orderId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $products = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = array(
                    'Name' => $row['Nane'],
                    'Quantity' => $row['Quantity'],
                    'ID' => $row['Product_ID'],
                    'Picture' => $row['Picture'],
                    'Price' => $row['Price']
                );
                array_push($products, $product);
            }
        }
        return $products;
    }
    public function getBuyingHistory($UserID)
    {
        $query = "SELECT ID AS Order_ID, Created, Status FROM order_details WHERE User_ID=? ORDER BY Created DESC;";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "s", $UserID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $BuyingHistory = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $AnOrder = array(
                    'Order_ID' => $row['Order_ID'],
                    'Created' => $row['Created'],
                    'Status' => $row['Status'],
                );
                array_push($BuyingHistory, $AnOrder);
            }
        }
        return $BuyingHistory;
    }
    public function insertAnOrder($UserID, $LastName, $FirstName, $Email, $Telephone, $StreetAddress, $TownCity, $Account, $BankName, $Note = "", $PostcodeZIP = "", $Status = "Đang chờ")
    {
        $Created = date("Y-m-d");
        if (
            empty($Status) || empty($UserID) || empty($LastName) || empty($FirstName) || empty($Email) || empty($Telephone) || empty($StreetAddress) ||
            empty($TownCity) || empty($Account) || empty($BankName)
        ) {
            return "emptyfield";
        } else {
            $rst = 'Begin';
            $query = "INSERT INTO order_details(Status, User_ID, Last_Name, First_name, Email, Telephone, Street_address, Postcode_ZIP,Created ,Town_City, Account, Bank_Name, Note) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($this->con);
            if (!mysqli_stmt_prepare($stmt, $query)) {
                return "sqlerror";
                // return false;
            }
            mysqli_stmt_bind_param($stmt, "sssssssssssss", $Status, $UserID, $LastName, $FirstName, $Email, $Telephone, $StreetAddress, $PostcodeZIP, $Created, $TownCity, $Account, $BankName, $Note);
            mysqli_stmt_execute($stmt);
            // $result = mysqli_stmt_get_result($stmt);
            $last_id = mysqli_insert_id($this->con);
            // return $last_id;
            // return $last_id;
            if ($last_id) {
                // return "Here";
                $rst .= '-> get cart_ID';
                $query1 = "SELECT cart.ID FROM cart WHERE cart.User_ID = ?";
                mysqli_stmt_prepare($stmt, $query1);
                mysqli_stmt_bind_param($stmt, "s", $UserID);
                mysqli_stmt_execute($stmt);
                $result1 = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_row($result1);

                $rst .= '-> get item_list';
                $query2 = "SELECT cart_item_list.product_ID, cart_item_list.quantity, product.Sell_price FROM cart_item_list, product WHERE cart_item_list.cart_ID = ? AND cart_item_list.product_ID = product.ID";
                mysqli_stmt_prepare($stmt, $query2);
                mysqli_stmt_bind_param($stmt, "s", $row[0]);    //row[0] = cart_item_list.cart.ID
                mysqli_stmt_execute($stmt);
                $result2 = mysqli_stmt_get_result($stmt);
                $item_list = array();
                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_array()) {
                        $total = $row2[1] * $row2[2];
                        $item = array(
                            'order_ID' => $last_id,
                            'product_ID' => $row2[0],
                            'quantity' => $row2[1],
                            'total_amount_of_each_product' => $total  //total_amount_of_each_product = quantity * Sell_price
                        );
                        array_push($item_list, $item);
                    }
                } else {  //neu gio hang trong, xoa don hang vua tao
                    $query3 = "DELETE FROM order_details WHERE order_details.ID = ?";
                    mysqli_stmt_prepare($stmt, $query3);
                    mysqli_stmt_bind_param($stmt, "s", $last_id);
                    mysqli_stmt_execute($stmt);
                    return "emptycart";
                }

                $query4 = "INSERT INTO transaction(Order_ID, Product_ID, Quantity, Total_amount_of_each_product) VALUES (?,?,?,?)";
                mysqli_stmt_prepare($stmt, $query4);
                foreach ($item_list as $key => $value) {
                    mysqli_stmt_bind_param($stmt, "ssss", $value['order_ID'], $value['product_ID'], $value['quantity'], $value['total_amount_of_each_product']);
                    mysqli_stmt_execute($stmt);
                    // echo 'order_ID: ' . $value['order_ID'] . ", product_ID: " . $value['product_ID'] . ", quantity: " . $value['quantity'] . ", total: " . $value['total_amount_of_each_product'] . PHP_EOL;
                }
                $rst = $rst . '-> insert product to transaction ' . count($item_list);
                //tinh: Total_amount_of_each_product = Total_amount_of_each_product * Quantity

                //xoa tat ca item trong cart_item_list sau khi tao don hang thanh cong
                $rst .= '-> delete item from cart_item_list';
                $query5 = "DELETE FROM cart_item_list WHERE cart_item_list.cart_ID = ?";
                mysqli_stmt_prepare($stmt, $query5);
                mysqli_stmt_bind_param($stmt, "s", $row[0]);    //row[0] = cart_item_list.cart.ID
                mysqli_stmt_execute($stmt);
                // echo '<script>alert("Tạo đơn hàng thành công.")</script>';
                // echo $rst;
                return "success";
            } else {
                // echo '<script>alert("Lỗi: Hệ thống bận, không thể tạo đơn hàng lúc này.")</script>';
                // return "here";
                return "failed";
            }
        }
    }
}
