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
            $conn = $db->connect();
            $sql = $conn->prepare("INSERT INTO product (productName, cateId, price, quantity, desscription, picture) VALUES( ?, ?, ?, ?, ?, ?)");
            $sql->bind_param("sidiss",$this->productName,$this->cateID,$this->price,$this->quantity,$this->description,$this->picture);
            return $sql->execute();
            
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
            $conn = $db->connect();
            $sql = $conn->prepare("SELECT * FROM product WHERE CateID = ?");
            $sql->bind_param("i",$cateid);
            $sql->execute();
            return $sql->get_result();
        }

        public static function list_product_relate($cateid, $id){
            $db = new Db();
            $conn = $db->connect();
            $sql = $conn->prepare("SELECT * FROM product WHERE CateID = ? AND ProductID !=?");
            $sql->bind_param("ii",$cateid,$id);
            $sql->execute();
            return $sql->get_result();
        }

        public static function get_product($id){
            $db = new Db();
            $conn = $db->connect();
            $sql = $conn->prepare("SELECT * FROM product WHERE ProductID =?");
            $sql->bind_param("i",$id);
            $sql->execute();
            return mysqli_fetch_array($sql->get_result());
        }
    }
?>