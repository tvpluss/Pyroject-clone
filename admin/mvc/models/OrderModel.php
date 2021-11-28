<?php
class Order extends DB
{
    public function getAllOrders()
    {
        $query = "SELECT * FROM order_details";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $orders = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $order = array(
                    'ID' => $row['ID'],
                    'Status' => $row['Status'],
                    'User_ID' => $row['User_ID'],
                    'Last_Name' => $row['Last_Name'],
                    'First_name' => $row['First_name'],
                    'Email' => $row['Email'],
                    'Telephone' => $row['Telephone'],
                    'Street_address' => $row['Street_address'],
                    'Postcode_ZIP' => $row['Postcode_ZIP'],
                    'Town_City' => $row['Town_City'],
                    'Created' => $row['Created'],
                    'Account' => $row['Account'],
                    'Bank_Name' => $row['Bank_Name'],
                    'Note' => $row['Note']
                );
                array_push($orders, $order);
            }
        }
        return $orders;
    }
    public function getAnOrder($ID)
    {
        $query = "SELECT * FROM order_details WHERE ID=?";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "s", $ID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        if ($row == false) {
            return false;
        } else {
            return $row;
        }
    }
    public function updateOrderStatus($Status, $ID)
    {
        if (empty($Status) || empty($ID)) {
            return false;
        } else {
            $query = "UPDATE order_details SET Status=? WHERE ID=?";
            $stmt = mysqli_stmt_init($this->con);
            mysqli_stmt_prepare($stmt, $query);
            mysqli_stmt_bind_param($stmt, "ss", $Status, $ID);
            mysqli_stmt_execute($stmt);
            if (mysqli_affected_rows($this->con) > 0) {
                return true;
            } else {
                return false;
            }
        }
    }
    public function getBuyingHistory($UserID)
    {
        $query = "SELECT User_ID, ID AS Order_ID, Created FROM order_details WHERE User_ID=? ORDER BY Created DESC;";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "s", $UserID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $BuyingHistory = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $AnOrder = array(
                    'User_ID' => $row['User_ID'],
                    'Order_ID' => $row['Order_ID'],
                    'Created' => $row['Created'],
                );
                array_push($BuyingHistory, $AnOrder);
            }
        }
        return $BuyingHistory;
    }
    public function insertAnOrder($Status, $UserID, $LastName, $FirstName, $Email, $Telephone, $StreetAddress, $TownCity, $Created, $Account, $BankName, $Note = "", $PostcodeZIP = "")
    {
        if (
            empty($Status) || empty($UserID) || empty($LastName) || empty($FirstName) || empty($Email) || empty($Telephone) || empty($StreetAddress) ||
            empty($TownCity) || empty($Created) || empty($Account) || empty($BankName)
        ) {
            return false;
        } else {
            $query = "INSERT INTO ordder_details(Status, User_ID, Last_Name, First_name, Email, Telephone, Street_address, Postcode_ZIP, Town_City, Created, Account, Bank_Name, Note) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($this->con);
            mysqli_stmt_prepare($stmt, $query);
            mysqli_stmt_bind_param($stmt, "sssssssssssss", $Status, $UserID, $LastName, $FirstName, $Email, $Telephone, $StreetAddress, $PostcodeZIP, $TownCity, $Created, $Account, $BankName, $Note);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $last_id = mysqli_insert_id($this->con);

            if ($result->num_rows > 0) {
                $query1 = "SELECT cart.ID FROM cart WHERE cart.User_ID = ?";
                mysqli_stmt_prepare($stmt, $query1);
                mysqli_stmt_bind_param($stmt, "s", $UserID);
                mysqli_stmt_execute($stmt);
                $result1 = mysqli_stmt_get_result($stmt);
                $row = mysqli_fetch_row($result1);

                $query2 = "SELECT cart_item_list.product_ID, cart_item_list.quantity, product.Sell_price FROM cart_item_list, product WHERE cart_item_list.cart_ID = ? AND cart_item_list.product_ID = product.ID";
                mysqli_stmt_prepare($stmt, $query2);
                mysqli_stmt_bind_param($stmt, "s", $row[0]);    //row[0] = cart_item_list.cart.ID
                mysqli_stmt_execute($stmt);
                $result2 = mysqli_stmt_get_result($stmt);
                $item_list = array();
                if ($result2->num_rows > 0) {
                    while ($row2 = $result2->fetch_assoc()) {
                        $total = $row[1] * $row[2];
                        $item = array(
                            'order_ID' => $last_id,
                            'product_ID' => $row2[0],
                            'quantity' => $row2[1],
                            'total_amount_of_each_product' => $total  //total_amount_of_each_product = quantity * Sell_price
                        );
                        array_push($item_list, $item);
                    }
                } else {  //neu gio hang trong, xoa don hang vua tao
                    $query3 = "DELETE FROM ordder_details WHERE ordder_details.ID = ?";
                    mysqli_stmt_prepare($stmt, $query3);
                    mysqli_stmt_bind_param($stmt, "s", $last_id);
                    mysqli_stmt_execute($stmt);
                    // echo '<script>alert("Lỗi: Giỏ hàng trống, không thể tạo đơn hàng.")</script>';
                    return false;
                }
                $query4 = "INSERT INTO transaction(Order_ID, Product_ID, Quantity, Total_amount_of_each_product) VALUES (?,?,?,?)";
                mysqli_stmt_prepare($stmt, $query4);
                foreach ($item_list as $data) {
                    mysqli_stmt_bind_param($stmt, "ssss", $data[0], $data[1], $data[2], $data[3]);
                    mysqli_stmt_execute($stmt);
                }
                //tinh: Total_amount_of_each_product = Total_amount_of_each_product * Quantity

                //xoa tat ca item trong cart_item_list sau khi tao don hang thanh cong
                $query5 = "DELETE FROM cart_item_list WHERE cart_item_list.cart_ID = ?";
                mysqli_stmt_prepare($stmt, $query5);
                mysqli_stmt_bind_param($stmt, "s", $row[0]);    //row[0] = cart_item_list.cart.ID
                mysqli_stmt_execute($stmt);
                // echo '<script>alert("Tạo đơn hàng thành công.")</script>';
                return true;
            } else {
                // echo '<script>alert("Lỗi: Hệ thống bận, không thể tạo đơn hàng lúc này.")</script>';
                return false;
            }
        }
    }
}
