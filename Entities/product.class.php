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
            // xử lí hàm update hình ảnh
            $file_temp = $this->picture['tmp_name'];
            $user_file = $this->picture['name'];
            $timestamp = date("Y").date("m").date("d").date("h").date("i").date("s");
            $filepath = "uploads/".$timestamp.$user_file;
            if(move_uploaded_file($file_temp, $filepath)== false)
            {
                return false;
            }

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

    }
?>