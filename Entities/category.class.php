<?php

    require_once("config/db.class.php");

    class category
    {
        public $CateID;
        public $CategoryName;
        public $Description;

        public function __construct( $CategoryName, $Description) {
            $this->CategoryName = $CategoryName;
            $this->Description = $Description;
        }

        public function save() {
            $db = new Db();
            $conn = $db->connect();
            $sql = $conn->prepare("INSERT INTO category(CateID, CategoryName, Description) VALUES
            (?, ?,?)");
            $sql->bind_param("iss","$this->CateID,$this->CategoryName,$this->Description");
            return $sql->execute();
            
        }

        public static function list_categories() {
            $db = new Db();
            $sql = "SELECT * FROM category";
            $result = $db->select_to_array($sql);
            return $result;
        }
    }

?>