<?php
    require_once("config/db.class.php");
    class User{
        public $userID;
        public $userName;
        public $email;
        public $password;
        public function __construct( $userName, $email, $password){
            $this->userName = $userName;
            $this->email = $email;
            $this->password = $password;
        }

        public function save(){
            $DB = new Db();
            $conn = $DB->connect();
            $sql = $conn->prepare("INSERT INTO users (UserName, Email, Password)
            VALUES (?,?,?) ");
            $sql->bind_param("sss",$this->userName,$this->email,$this->password);
            return $sql->execute();
        }

        public static function checkLogin($username, $password){
            $password = md5($password);
            $db = new Db();
            $conn = $db->connect();
            $sql = $conn->prepare("SELECT * FROM users WHERE UserName = ? AND Password = ? LIMIT 1");
            $sql->bind_param("ss",$username,$password);
            $sql->execute();
            return mysqli_fetch_array($sql->get_result());
        }
    }
?>