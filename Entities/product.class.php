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
            $sql = "INSERT INTO product (productName, cateId, price, quantity, desscription, picture) VALUES
            ( '$this->productName', '$this->cateID', '$this->price', '$this->quantity', '$this->description', '$this->picture')";

            $result = $db->query_execute($sql);
            return $result;
        }

        public static function list_product()
        {
            $db = new Db();
            $sql = "SELECT * FROM product";
            $result = $db->Select_to_array($sql);
            return $result;
        }
        
        public static function list_product_by_cateid($cateid){
            $db = new Db();
            $sql = "SELECT * FROM product WHERE CateID = '$cateid'";
            $result = $db->select_to_array($sql);
            return $result;
        }

        public static function list_product_relate($cateid, $id){
            $db = new Db();
            $sql = "SELECT * FROM product WHERE CateID = '$cateid' AND ProductID !='$id'";
            return $db->select_to_array($sql);
        }

        public static function get_product($id){
            $db = new Db();
            $sql = "SELECT * FROM product WHERE ProductID ='$id'";
            return mysqli_fetch_object(mysqli_query($db->connect(),$sql));
        }
    }
?>