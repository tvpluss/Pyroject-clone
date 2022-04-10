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
    public function getProductsBetter($ID)
    {
        $this->db = new DB();
        $this->fm = new Format();
        $query = "SELECT ID, Nane, Picture, Quantity, Buy_price, Sell_price, Description, Last_modified_day FROM product WHERE ID = ?";
        $stmt = mysqli_stmt_init($this->con);

        mysqli_stmt_prepare($stmt, $query);
        mysqli_stmt_bind_param($stmt, "s", $ID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
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
        return $item;
    }
    public function getAllProductsBetter($offset, $limit)
    {
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
                mysqli_stmt_bind_param($tag_stmt, "s", $row['ID']);
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
        $this->db = new DB();
        $this->fm = new Format();
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

    public function get_details_tag($id)
    {
        $this->db = new DB();
        $this->fm = new Format();
        $query = "
        SELECT product.ID, product.Nane, product.Picture, product.Quantity, product.Buy_price, product.Sell_price, product.Description, product.Last_modified_day, tag.Name

        FROM product INNER JOIN tag ON product.Id = tag.Product_ID WHERE product.ID = '$id'
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

    public function insert_product($data)
    {

        $this->db = new DB();
        if (empty($data['Name']) || empty($data['Category']) || empty($data['Description']) || empty($data['Quantity']) || empty($data['Sell_price']) || empty($data['Buy_price']) || empty($data['Picture']) || $data['Buy_price'] < 0 || $data['Sell_price'] < 0 || $data['Quantity'] < 0) {
            header("Location: ../addProduct?error=emptyfieldsOrinvalidvalue&Name=" . $data['Name']);
            exit();
        }

        // check if username is already taken
        else {
            $Name = mysqli_real_escape_string($this->db->con, $data['Name']);
            $Category = mysqli_real_escape_string($this->db->con, $data['Category']);
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
                if ($result) {
                    $alert = "<span class='success'>Insert Product Successfully</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Insert Product Not Success</span>";
                    return $alert;
                }
            }
        }
    }
}
