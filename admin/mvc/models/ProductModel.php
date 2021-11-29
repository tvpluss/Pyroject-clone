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
        if (empty($data['Name']) || empty($data['Category']) || empty($data['Tag']) || empty($data['Description']) || empty($data['Quantity']) || empty($data['Sell_price']) || empty($data['Buy_price']) || empty($data['Picture']) || $data['Buy_price'] < 0 || $data['Sell_price'] < 0 || $data['Quantity'] < 0) {
            header("Location: ../addProduct?error=emptyfieldsOrinvalidvalue&Name=" . $data['Name']);
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
                    header("Location: ../ShowProduct?success=addproduct");
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
                    header("Location: ../ShowProduct?success=updateproduct");
                    exit();
                } else {
                    $alert = "<span class='error'>Product Updated Not Success</span>";
                    return $alert;
                }
            }
        }
    }

    public function del_product($id){
        $this->db = new DB();
        $query1 = "DELETE FROM catalog where Product_ID = '$id'";
        $query2 = "DELETE FROM tag where Product_ID = '$id'";
        $query3 = "DELETE FROM product where ID = '$id'";
        $result1 = $this->db->delete($query1);
        $result2 = $this->db->delete($query2);
        $result3 = $this->db->delete($query3);
        if($result3){
            header("Location: ../ShowProduct?success=updateproduct");
                    exit();
        }else{
            $alert = "<span class='error'>Product Deleted Not Success</span>";
            return $alert;
        }
        
    }
}
