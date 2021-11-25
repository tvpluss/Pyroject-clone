<?php
require_once "./mvc/core/Format.php";

class ProductModel extends DB
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new DB();
        $this->fm = new Format();
    }
    // public function getAllProducts()
    // {
    //     $query = "SELECT ID, Nane, Picture, Quantity, Buy_price, Sell_price, Description, Last_modified_day FROM product";
    //     $stmt = mysqli_stmt_init($this->con);
    //     mysqli_stmt_prepare($stmt, $query);
    //     mysqli_stmt_execute($stmt);
    //     $result = mysqli_stmt_get_result($stmt);
    //     $items = [];
    //     if ($result->num_rows > 0) {
    //         while ($row = $result->fetch_assoc()) {
    //             $item = array(
    //                 'ID' => $row['ID'],
    //                 'Nane' => $row['Nane'],
    //                 'Picture' => $row['Picture'],
    //                 'Quantity' => $row['Quantity'],
    //                 'Buy_price' => $row['Buy_price'],
    //                 'Sell_price' => $row['Sell_price'],
    //                 'Description' => $row['Description'],
    //                 'Last_modified_day' => $row['Last_modified_day'],
    //             );
    //             array_push($items, $item);
    //         }
    //     }
    //     return $items;
    // }
    public function get_all_product()
    {
        $query = "SELECT * FROM product";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_details_catalog($id)
    {
        $query = "

    		SELECT product.*, catalog.Name

    		FROM product INNER JOIN catalog ON product.Id = catalog.Product_ID WHERE product.ID = '$id'

    		";

        $result = $this->db->select($query);
        return $result;
    }
}
