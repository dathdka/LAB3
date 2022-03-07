<?php
    class Db
    {
        protected static $connection;
        public function connect()
        {
            if(!isset(self::$connection)){
                $config = parse_ini_file("config.ini");
                self::$connection = new mysql("localhost", $config["username"], $config["password"], $config["databasename"]);
            }
            if(self::$connection==false){
                return false;
            }
            return self::$connection;
        }
        public function query_execute($querystring)
        {
            $connection = $this->connect();
            $result = $this-> query_execute($querystring);
            if($result == false){
                return false;
            }
            while($item = $result->fetch_assoc()) {
                $rows[] = $item;
            }
            return $rows;
        }
    }
?>