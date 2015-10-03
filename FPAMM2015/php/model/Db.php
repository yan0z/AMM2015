<?php
    
    /**
    *  @Author Stefano Carta 
    *  Creazione e descrizione DB
    */

    class Db {
        
        private function __construct() {

        }

        private static $singleton;
        
        public static function getInstance(){
            if(!isset(self::$singleton)){
                self::$singleton = new Db();
            }
            return self::$singleton;
        }

        public function connectDb(){
            $mysqli = new mysqli();
            $mysqli->connect(Settings::$db_host, Settings::$db_user,
            Settings::$db_password, Settings::$db_name);
            if($mysqli->errno != 0){
                return null;
            }else{
                return $mysqli;
            }
        }
    }
?>