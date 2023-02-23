<?php 
include_once(__DIR__."./../dbCon.php");


class Detyra extends dbCon{
    private $ID;
    private $desc;
    private $status;
    private $deadline;
    private $username;
    private $admin;
    private $progress;
    private $dbConnection;

    public function __construct($ID='',$desc='',$status='',$deadline='',$username='',$admin='',$progress=''){
        $this->ID = $ID;
        $this->desc = $desc;
        $this->status = $status;
        $this->deadline = $deadline;
        $this->username = $username;
        $this->admin = $admin;
        $this->progress = $progress;

        $this->dbConnection = $this->connDB();
    }

    public function getID(){
        return $this->ID;
    }
    public function setID($ID){
        $this->ID = $ID;
    }
    public function getDesc(){
        return $this->desc;
    }
    public function setDesc($desc){
        $this->desc = $desc;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function getDeadline(){
        return $this->deadline;
    }
    public function setDeadline($deadline){
        $this->deadline = $deadline;
    }
    public function getUsername(){
        return $this->username;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function getAdmin(){
        return $this->admin;
    }
    public function setAdmin($admin){
        $this->admin = $admin;
    }
    public function getProgress(){
        return $this->progress;
    }
    public function setProgress($progress){
        $this->progress = $progress;
    }

     // Register Method
     public function registerDetyra(){
        try{
            $sql = "INSERT INTO detyra(`desc`,`status`,`deadline`,`username`,`admin`,`progress`) value (?,?,?,?,?,?)";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute([$this->desc,$this->status,$this->deadline,$this->username,$this->admin,$this->progress]);
        }catch(Exception $e){
            return $e->getMessage();
        }
    }
    // Fetch method
    public function showAllDetyra(){
        try{
            $sql = "SELECT d.ID, d.desc, d.status ,d.deadline ,d.username ,a.username as adminuser FROM detyra d inner join admindb a on d.admin = a.ID";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $detyrat= $stm->fetchAll();
            return $detyrat;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function showAllYourDetyra(){
        try{
            $sql = "SELECT d.ID, d.desc, d.status ,d.deadline ,d.username ,a.username as adminuser 
            FROM detyra d inner join admindb a on d.admin = a.ID 
            WHERE d.username like '".$_SESSION["username"]."'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $detyrat= $stm->fetchAll();
            return $detyrat;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    // Delete Method
    public function deleteDetyra(){
        try{
        $sql = "DELETE FROM detyra where ID=?";
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

        $sql = "SELECT * FROM detyra WHERE ID = ?";
        $stm = $this->dbConnection->prepare($sql);
        $stm->execute([$id]);
        $data = $stm->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    
    // Update Method
    public function update(){
        try{
        $sql = "UPDATE detyra d SET d.desc=?, d.status=?, d.deadline=?, d.username=? WHERE d.ID=?";
        $stm = $this->dbConnection->prepare($sql);
        $stm->execute([$this->desc,$this->status,$this->deadline,$this->username,$this->ID]);
        return $stm;
        } catch(Exception $e){
            return $e->getMessage();
            }
    }


    public function showUpcoming(){
        try{
            $sql = "SELECT d.ID, d.desc,d.status,d.deadline ,d.username ,datediff(d.deadline,CURRENT_DATE) as overdue 
            FROM detyra d 
            where d.status like 'pending' 
            having datediff(d.deadline,CURRENT_DATE) > 0 
            order by datediff(d.deadline,CURRENT_DATE) asc";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $detyrat= $stm->fetchAll();
            return $detyrat;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function showYourUpcoming(){
        try{
            $sql = "SELECT d.ID, d.desc,d.status,d.deadline,d.username ,datediff(d.deadline,CURRENT_DATE) as overdue 
            FROM detyra d 
            where d.status like 'pending' and username like '".$_SESSION["username"]."'
            having datediff(d.deadline,CURRENT_DATE) > 0 
            order by datediff(d.deadline,CURRENT_DATE) asc";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $detyrat= $stm->fetchAll();
            return $detyrat;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function showYourOverdue(){
        try{
            $sql = "SELECT d.ID, d.desc,d.status,d.deadline ,d.username ,datediff(CURRENT_DATE,d.deadline) as overdue 
            FROM detyra d 
            where d.status like 'pending' and username like '".$_SESSION["username"]."'
            having datediff(CURRENT_DATE,d.deadline) > 0 
            order by datediff(CURRENT_DATE,d.deadline) asc";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $detyrat= $stm->fetchAll();
            return $detyrat;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }

    public function showOverdue(){
        try{
            $sql = "SELECT d.ID, d.desc,d.status,d.deadline ,d.username ,datediff(CURRENT_DATE,d.deadline) as overdue 
            FROM detyra d 
            where d.status like 'pending' 
            having datediff(CURRENT_DATE,d.deadline) > 0 
            order by datediff(CURRENT_DATE,d.deadline) asc";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $detyrat= $stm->fetchAll();
            return $detyrat;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    
    public function showCompletedDetyra(){
        try{
            $sql = "SELECT d.ID, d.desc, d.status ,d.deadline ,d.username ,a.username as adminuser FROM detyra d inner join admindb a on d.admin = a.ID where d.status like 'completed'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $detyrat= $stm->fetchAll();
            return $detyrat;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function showYourCompletedDetyra(){
        try{
            $sql = "SELECT d.ID, d.desc, d.status ,d.deadline ,d.username ,a.username as adminuser 
            FROM detyra d inner join admindb a on d.admin = a.ID 
                WHERE d.status like 'completed' and d.username like '".$_SESSION["username"]."'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $detyrat= $stm->fetchAll();
            return $detyrat;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function showInProgressDetyra(){
        try{
            $sql = "SELECT d.ID, d.desc, d.status ,d.deadline ,d.username ,d.progress, a.username as adminuser FROM detyra d inner join admindb a on d.admin = a.ID where d.status like 'in progress'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $detyrat= $stm->fetchAll();
            return $detyrat;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function showYourInProgressDetyra(){
        try{
            $sql = "SELECT d.ID, d.desc, d.status ,d.deadline ,d.username ,d.progress, a.username as adminuser 
            FROM detyra d inner join admindb a on d.admin = a.ID 
            WHERE d.status like 'in progress' and d.username like '".$_SESSION["username"]."'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $detyrat= $stm->fetchAll();
            return $detyrat;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }

    public function showPendingDetyra(){
        try{
            $sql = "SELECT d.ID, d.desc, d.status ,d.deadline ,d.username ,a.username as adminuser 
            FROM detyra d inner join admindb a on d.admin = a.ID WHERE 
            d.status like 'pending'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $detyrat= $stm->fetchAll();
            return $detyrat;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function showYourPendingDetyra(){
        try{
            $sql = "SELECT d.ID, d.desc, d.status ,d.deadline ,d.username ,a.username as adminuser 
            FROM detyra d inner join admindb a on d.admin = a.ID 
            where d.status like 'pending' and d.username like '".$_SESSION["username"]."'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $detyrat= $stm->fetchAll();
            return $detyrat;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    
    public function showYourDetyra(){
        try{
            $sql = "SELECT d.ID, d.desc, d.status ,d.deadline ,d.username ,a.username as adminuser 
            FROM detyra d inner join admindb a on d.admin = a.ID 
            where d.status like 'pending' and d.username like '".$_SESSION['username']."'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $detyrat= $stm->fetchAll();
            return $detyrat;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function nrOfYourAllDetyra(){
        try{
            $sql = "select * from detyra where username like '".$_SESSION["username"]."'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $count = $stm->rowCount();
            return $count;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function nrOfYourInProgressDetyra(){
        try{
            $sql = "select * from detyra where status like 'in progress' and username like '".$_SESSION["username"]."'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $count = $stm->rowCount();
            return $count;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function nrOfYourCompletedDetyra(){
        try{
            $sql = "select * from detyra where status like 'completed' and username like '".$_SESSION["username"]."'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $count = $stm->rowCount();
            return $count;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function nrOfYourPendingDetyra(){
        try{
            $sql = "select * from detyra where status like 'pending' and username like '".$_SESSION["username"]."'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $count = $stm->rowCount();
            return $count;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function nrOfAllDetyra(){
        try{
            $sql = "select * from detyra";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $count = $stm->rowCount();
            return $count;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function nrOfInProgressDetyra(){
        try{
            $sql = "select * from detyra where status like 'In progress'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $count = $stm->rowCount();
            return $count;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function nrOfCompletedDetyra(){
        try{
            $sql = "select * from detyra where status like 'Completed'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $count = $stm->rowCount();
            return $count;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function nrOfPendingDetyra(){
        try{
            $sql = "select * from detyra where status like 'pending'";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $count = $stm->rowCount();
            return $count;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }
    public function top3Performers(){
        try{
            $sql = "select udb.ID,udb.name,udb.surname,count(d.username) as nrDetyrave from detyra d inner join usersdb udb on d.username = udb.username where status like 'completed' group by udb.ID,udb.name,udb.surname order by nrDetyrave desc limit 3";
            $stm = $this->dbConnection->prepare($sql);
            $stm->execute();
            $employees = $stm->fetchAll();
            return $employees;
        } catch(Exception $e){
            return $e -> getMessage();
        }
    }

}



?>