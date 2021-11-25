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