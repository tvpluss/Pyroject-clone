<?php
require_once "./mvc/core/Format.php";

class ProductModel extends DB
{
    // private $db;
    // private $fm;

    /*public function __construct()
    {
        // $this->db = new DB();
        // $this->fm = new Format();
    }*/
    public function getTotalProducts()
    {
        $query = "SELECT COUNT(ID) FROM product WHERE 1";
        $stmt = mysqli_stmt_init($this->con);

        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result)['COUNT(ID)'];
    }
    public function getAllProductsBetter(
        $offset,
        $limit
    ) {
        $this->db = new DB();
        $this->fm = new Format();
        $query = "SELECT ID, Nane, Picture, Quantity, Buy_price, Sell_price, Description, Last_modified_day FROM product LIMIT ? OFFSET ?";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "ss", $limit, $offset);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $items = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $catalog_query = "SELECT Name FROM catalog WHERE catalog.Product_ID = ?";
                $catalog_stmt = mysqli_stmt_init($this->con);
                mysqli_stmt_prepare($catalog_stmt, $catalog_query);
                mysqli_stmt_bind_param($catalog_stmt, "s", $row['ID']);
                mysqli_stmt_execute($catalog_stmt);
                $catalog_result = mysqli_stmt_get_result($catalog_stmt);
                $catalog = [];
                if ($catalog_result->num_rows) {
                    while ($catalog_row = $catalog_result->fetch_assoc()) {
                        array_push($catalog, $catalog_row['Name']);
                    }
                }
                $tag_query = "SELECT Name FROM tag WHERE tag.Product_ID = ?";
                $tag_stmt = mysqli_stmt_init($this->con);
                mysqli_stmt_prepare($tag_stmt, $tag_query);
                mysqli_stmt_bind_param(
                    $tag_stmt,
                    "s",
                    $row['ID']
                );
                mysqli_stmt_execute($tag_stmt);
                $tag_result = mysqli_stmt_get_result($tag_stmt);
                $tag = [];
                if ($tag_result->num_rows) {
                    while ($tag_row = $tag_result->fetch_assoc()) {
                        array_push($tag, $tag_row['Name']);
                    }
                }
                $item = array(
                    'ID' => $row['ID'],
                    'Nane' => $row['Nane'],
                    'Picture' => $row['Picture'],
                    'Quantity' => $row['Quantity'],
                    'Buy_price' => $row['Buy_price'],
                    'Sell_price' => $row['Sell_price'],
                    'Description' => $row['Description'],
                    'Last_modified_day' => $row['Last_modified_day'],
                    'Catalog' => $catalog,
                    'Tag' => $tag
                );
                array_push($items, $item);
            }
        }
        return $items;
    }
    public function getAllProducts()
    {
        $query = "SELECT ID, Nane, Picture, Quantity, Buy_price, Sell_price, Description, Last_modified_day FROM product";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $items = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $item = array(
                    'ID' => $row['ID'],
                    'Nane' => $row['Nane'],
                    'Picture' => $row['Picture'],
                    'Quantity' => $row['Quantity'],
                    'Buy_price' => $row['Buy_price'],
                    'Sell_price' => $row['Sell_price'],
                    'Description' => $row['Description'],
                    'Last_modified_day' => $row['Last_modified_day'],
                );
                array_push($items, $item);
            }
        }
        return $items;
    }
    public function get_all_product()
    {
        $query = "SELECT * FROM product";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_details_catalog($id)
    {
        $this->db = new DB();
        $this->fm = new Format();
        $query = "
        SELECT product.ID, product.Nane, product.Picture, product.Quantity, product.Buy_price, product.Sell_price, product.Description, product.Last_modified_day, catalog.Name

        FROM product INNER JOIN catalog ON product.Id = catalog.Product_ID WHERE product.ID = '$id'
        ";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $items = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $item = array(
                    'ID' => $row['ID'],
                    'Nane' => $row['Nane'],
                    'Picture' => $row['Picture'],
                    'Quantity' => $row['Quantity'],
                    'Buy_price' => $row['Buy_price'],
                    'Sell_price' => $row['Sell_price'],
                    'Description' => $row['Description'],
                    'Last_modified_day' => $row['Last_modified_day'],
                    'Name' => $row['Name']
                );
                array_push($items, $item);
            }
        }
        return $items;
    }

    public function getProduct($id)
    {
        $query = "
        SELECT product.ID, product.Nane, product.Picture, product.Quantity, product.Buy_price, product.Sell_price, product.Description, product.Last_modified_day
        FROM product WHERE product.ID = " . $id . " 
        ";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $items = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $item = array(
                    'ID' => $row['ID'],
                    'Nane' => $row['Nane'],
                    'Picture' => $row['Picture'],
                    'Quantity' => $row['Quantity'],
                    'Buy_price' => $row['Buy_price'],
                    'Sell_price' => $row['Sell_price'],
                    'Description' => $row['Description'],
                    'Last_modified_day' => $row['Last_modified_day'],
                );
                array_push($items, $item);
            }
        }
        return $items;
    }

    public function insert_product($data)
    {

        $this->db = new DB();
        if (empty($data['Name']) || empty($data['Category']) || empty($data['Tag']) || empty($data['Description']) || empty($data['Quantity']) || empty($data['Sell_price']) || empty($data['Buy_price']) || empty($data['Picture']) || $data['Buy_price'] < 0 || $data['Sell_price'] < 0 || $data['Quantity'] < 0) {
            header("Location: ../addProduct?page=1&error=NaemptyfieldsOrinvalidvalue");
            exit();
        }

        // check if username is already taken
        else {
            $Name = mysqli_real_escape_string($this->db->con, $data['Name']);
            $Category = mysqli_real_escape_string($this->db->con, $data['Category']);
            $Tag = mysqli_real_escape_string($this->db->con, $data['Tag']);
            $Description = mysqli_real_escape_string($this->db->con, $data['Description']);
            $Quantity = mysqli_real_escape_string($this->db->con, $data['Quantity']);
            $Sell_price = mysqli_real_escape_string($this->db->con, $data['Sell_price']);
            $Buy_price = mysqli_real_escape_string($this->db->con, $data['Buy_price']);
            $Picture = mysqli_real_escape_string($this->db->con, $data['Picture']);


            if (empty($data['Name']) || empty($data['Category']) || empty($data['Description']) || empty($data['Quantity']) || empty($data['Sell_price']) || empty($data['Buy_price']) || empty($data['Picture'])) {
                $alert = "<span class='error'>Fields must be not empty</span>";
                return $alert;
                //cho chắc =]]
            } else {
                $query = "INSERT INTO product(Nane,Description,Quantity,Sell_price,Buy_price,Picture) VALUES('$Name','$Description','$Quantity','$Sell_price','$Buy_price','$Picture')";
                $result = $this->db->insert($query);
                $id = mysqli_insert_id($this->db->con);
                $sql = "INSERT INTO catalog(Name, product_ID) VALUES ('$Category','$id')";
                $result2 = $this->db->insert($sql);
                $sql2 = "INSERT INTO tag(Name, product_ID) VALUES ('$Tag','$id')";
                $result3 = $this->db->insert($sql2);
                if ($result) {
                    header("Location: ../Product?page=1&success=addproduct");
                    exit();
                } else {
                    $alert = "<span class='error'>Insert Product Not Success</span>";
                    return $alert;
                }
            }
        }
    }

    public function update_product($data, $id)
    {
        $this->db = new DB();
        if (empty($data['Name']) || empty($data['Description']) || empty($data['Quantity']) || empty($data['Sell_price']) || empty($data['Buy_price']) || empty($data['Picture']) || $data['Buy_price'] < 0 || $data['Sell_price'] < 0 || $data['Quantity'] < 0) {
            header("Location: ../EditProduct?error=emptyfieldsOrinvalidvalue&Name=" . $data['Name']);
            exit();
        } else {

            $Name = mysqli_real_escape_string($this->db->con, $data['Name']);
            $Description = mysqli_real_escape_string($this->db->con, $data['Description']);
            $Quantity = mysqli_real_escape_string($this->db->con, $data['Quantity']);
            $Sell_price = mysqli_real_escape_string($this->db->con, $data['Sell_price']);
            $Buy_price = mysqli_real_escape_string($this->db->con, $data['Buy_price']);
            $Picture = mysqli_real_escape_string($this->db->con, $data['Picture']);


            if (empty($data['Name']) || empty($data['Description']) || empty($data['Quantity']) || empty($data['Sell_price']) || empty($data['Buy_price']) || empty($data['Picture'])) {
                $alert = "<span class='error'>Fields must be not empty</span>";
                return $alert;
                //cho chắc =]]
            } else {

                //Nếu người dùng chọn ảnh

                $query = "UPDATE product SET
					Nane = '$Name',
					Description = '$Description',
					Quantity = '$Quantity', 
					Sell_price = '$Sell_price', 
					Buy_price = '$Buy_price',
					Picture = '$Picture'
					WHERE ID = '$id'";


                $result = $this->db->update($query);
                print_r($result);
                if ($result) {
                    header("Location: ../Product?page=1&success=updateproduct");
                    exit();
                } else {
                    $alert = "<span class='error'>Product Updated Not Success</span>";
                    return $alert;
                }
            }
        }
    }

    public function del_product($id)
    {
        $this->db = new DB();
        $query = "SELECT COUNT(Order_ID) FROM transaction WHERE Product_ID = ? ";
        $stmt = mysqli_stmt_init($this->con);
        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "s", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_fetch_assoc($result)['COUNT(Order_ID)'] > 0) {
            header("Location: ../Product?page=1&error=intransaction");
            return;
        }
        $query1 = "DELETE FROM catalog where Product_ID = '$id'";
        $query2 = "DELETE FROM tag where Product_ID = '$id'";
        $query3 = "DELETE FROM product where ID = '$id'";
        $result1 = $this->db->delete($query1);
        $result2 = $this->db->delete($query2);
        $result3 = $this->db->delete($query3);
        if ($result3) {
            header("Location: ../Product?page=1&success=updateproduct");
            exit();
        } else {
            $alert = "<span class='error'>Product Deleted Not Success</span>";
            return $alert;
        }
    }
}
