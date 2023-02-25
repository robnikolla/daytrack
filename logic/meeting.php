<?php 
include_once(__DIR__."./../dbCon.php");

class Meeting extends dbCon{
    private $ID;
    private $title;
    private $starttime;
    private $length;
    private $location;
    private $link;
    private $description;
    private $admin;
    private $members;

    private $dbConnection;

    public function __construct($ID='',$title='',$starttime='',$length='',$location='',$link='',$description='',$admin='',$members=''){
        $this->ID = $ID;
        $this->title = $title;
        $this->starttime = $starttime;
        $this->length = $length;
        $this->location = $location;
        $this->link = $link;
        $this->description = $description;
        $this->admin = $admin;
        $this->members = $members;

        $this->dbConnection = $this->connDB();
    }

    public function getID(){
        return $this->ID;
    }
    public function setID($ID){
        $this->ID = $ID;
    }
    public function getTitle(){
        return $this->title;
    }
    public function setTitle($title){
        $this->title = $title;
    }
    public function getStarttime(){
        return $this->starttime;
    }
    public function setStarttime($starttime){
        $this->starttime = $starttime;
    }
    public function getLength(){
        return $this->length;
    }
    public function setLength($length){
        $this->length = $length;
    }
    public function getLocation(){
        return $this->location;
    }
    public function setLocation($location){
        $this->location = $location;
    }
    public function getLink(){
        return $this->link;
    }
    public function setLink($link){
        $this->link = $link;
    }
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description = $description;
    }
    public function getAdmin(){
        return $this->admin;
    }
    public function setAdmin($admin){
        $this->admin = $admin;
    }
    public function getMembers(){
        return $this->members;
    }
    public function setMembers($members){
        $this->members = $members;
    }

    // Register Method
    public function registerMeeting(){
        try{
            $sql = "INSERT INTO meeting(`title`,`starttime`,`length`,`location`,`link`,`description`,`admin`) value (?,?,?,?,?,?,?)";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute([$this->title,$this->starttime,$this->length,$this->location,$this->link,$this->description,$this->admin]);
            
            

        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    public function registerMeetingUser(){
        $lastid = $this->dbConnection->lastInsertId();
        $emails = explode(";",$this->members);    
            foreach($emails as $email){
                $query = "INSERT INTO meetinguser(`meetingID`,`userEmail`) value (?,?)";
                $emailstm = $this->dbConnection->prepare($query);
                $emailstm->execute([$lastid,$email]);
            }
    }

    // Fetch Method
    public function showAllMeetings(){
        try{
            $sql = "SELECT * FROM meeting";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $users= $stm->fetchAll();
            return $users;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function showAllYourMeetings(){
        try{
            $sql = "SELECT m.ID,m.title,m.starttime,m.length,m.location,m.link,m.description,m.admin
                    FROM meeting m  inner join meetinguser mu on m.ID = mu.meetingID 
                                    inner join usersdb u on mu.userEmail = u.email
                    WHERE u.ID like '".$_SESSION["userid"]."'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $users= $stm->fetchAll();
            return $users;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    
     // Delete Method
    public function deleteUser(){
    try{
    $sql = "DELETE FROM meeting where ID=?";
    $stm = $this->dbConnection->prepare($sql);
    $stm->execute([$this->ID]);
    return $stm;
    }
    catch(Exception $e){
    return $e->getMessage();
    }
}
//Edit Method
public function edit($id){
    $data = null;

    $sql = "SELECT * FROM meeting WHERE ID = ?";
    $stm = $this->dbConnection->prepare($sql);
    $stm->execute([$id]);
    $data = $stm->fetch(PDO::FETCH_ASSOC);
    return $data;
}

// Update Method
public function update(){
    try{
    $sql = "UPDATE meeting SET title=?, starttime=?, endtime=?, location=?, link=?, description=? WHERE ID=?";
    $stm = $this->dbConnection->prepare($sql);
    $stm->execute([$this->title,$this->starttime,$this->endtime,$this->location,$this->link,$this->description,$this->ID]);
    return $stm;
    } catch(Exception $e){
        return $e->getMessage();
        }
}



}




?>