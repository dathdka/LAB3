<?php
    require_once("config/db.class.php");
    class product
    {
        public $productID;
        public $productName;
        public $cateID;
        public $price;
        public $quantity;
        public $description;
        public $picture;

        public function __construct( $productName,$cateID, $price, $quantity,$description, $picture)
        {
            $this->productName = $productName;
            $this->cateID = $cateID;
            $this->price = $price;
            $this->quantity = $quantity;
            $this->description = $description;
            $this->picture = $picture;
        }

        public function save()
        {
            $db = new Db();
            $sql = "INSERT INTO product (productName, cateId, price, quantity, description, Picture) VALUES
            ( '$this->productName', '$this->CateID', '$this->price', '$this->quantity', '$this->description', '$this->picture')";
            $result = $db->query_execute($sql);
            $result;
        }

        public static function list_product()
        {
            $db = new Db();
            $sql = "SELECT * FROM product";
            $result = $db->Select_to_array($sql);
            return $result;
        }

    }
?>