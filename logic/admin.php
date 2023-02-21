<?php 
include_once("./dbCon.php");
class Admin extends dbCon{
    private $ID;
    private $name;
    private $surname;
    private $email;
    private $username;
    private $password;
    private $confpassword;
    private $dbConnection;

    public function __construct($ID='',$name='',$surname='',$email='',$username='',$password='',$confpassword=''){
        $this->ID = $ID;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->confpassword = $confpassword;

        $this->dbConnection = $this->connDB();
    }
        public function getID(){
            return $this->ID;
        }
        public function setID($ID){
            $this->ID = $ID;
        }
        public function getName(){
            return $this->name;
        }
        public function setName($name){
            $this->name = $name;
        }
        public function getSurname(){
            return $this->surname;
        }
        public function setSurname($surname){
            $this->surname = $surname;
        }
        public function getEmail(){
            return $this->email;
        }
        public function setEmail($email){
            $this->email = $email;
        }
        public function getUsername(){
            return $this->username;
        }
        public function setUsername($username){
            $this->username = $username;
        }
        public function getPassword(){
            return $this->password;
        }
        public function setPassword($password){
            $this->password = $password;
        }
        public function getConfPassword(){
            return $this->confpassword;
        }
        public function setConfPassword($confpassword){
            $this->confpassword = $confpassword;
        }


        // Register Method
        public function registerUser(){
            try{
                $sql = "INSERT INTO admindb(`name`,`surname`,`email`,`username`,`password`,`confpassword`) value (?,?,?,?,?,?)";
                $stm = $this->dbConnection->prepare($sql);
                $stm->execute([$this->name,$this->surname,$this->email,$this->username,$this->password,$this->confpassword]);
            }catch(Exception $e){
                return $e->getMessage();
            }
        }

}




?>