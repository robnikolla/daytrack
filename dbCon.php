<?php
    class dbCon{
        public $conn = null;
        private $host = 'localhost';
        private $database = 'daytrackdb';
        private $username = 'root';
        private $password = '';

        public function connDB(){
            try{
                $this->conn = new   PDO("mysql:host=$this->host;dbname=$this->database",
                                    $this->username,$this->password,
                                    [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
            } catch(PDOException  $pdoe){
                die("Nuk mund te lidhej ne bazen e te dhenave {$this->database}: ". $pdoe->getMessage());
            }
            return $this->conn;
        }
 }      
    $databaseconn = new dbCon();
?>

