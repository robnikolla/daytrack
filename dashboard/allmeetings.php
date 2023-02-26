<?php 
    session_start();
    include_once("../dbCon.php");
    include_once("../logic/meeting.php");
    
    
    if(!isset($_SESSION['username'])){
        header('Location:../index.php');
    }
     if($_SESSION["type"] == "user"){
    header("Location:./workdash/workerdashboard.php");
}
  $text = "Login";
  $redirect = "../login.php";
  $dashboardicon = "";
  if(isset($_SESSION['username'])){
    $text = "Logout";
    $redirect = "../logout.php";
  }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,700,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="../style/dashboard.css">
    <link rel="stylesheet" href="../style/sty1.css">
    <link rel="stylesheet" href="../style/tables.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<header>
       
       <h2 style="margin:auto 0"> <a href="index.html" style="text-decoration:none;color:white" > Day<span style="color:var(--zorange)">Track</span> </a></h2> 
       
       <ul >
           <li><a href="../index.php" class="header-links"><span style="padding-right:5px" class="material-symbols-outlined">
               home
               </span> Home</a> </li>
           <li><a href="./dashboard.php" class="header-links"><span class="material-symbols-outlined" style="padding-right:5px">
               dashboard
               </span>Dashboard</a> </li>
           <li><a href="" class="header-links"><span class="material-symbols-outlined" style="padding-right:5px">
               task
               </span>Tasks</a> </li> 
       </ul>
       <ul>
           <li><a href="<?= $redirect ?>" class="header-links"><span class="material-symbols-outlined" style="padding-right:5px">
               login
               </span><?= $text ?></a></li>
           <li><a href="register.html" class="header-links"><span class="material-symbols-outlined" style="padding-right:5px">
               how_to_reg
               </span>Register</a></li>
          
       </ul>
  
   </header>
    
   <main style="display:flex;">
    <aside class="aside">
        <h3 style="text-align:center;color:white" class="title">Dashboard</h3>
        <ul>
            <h4 style="color:white;font-size:1.2rem;margin:0;color:var(--blue1)">Tasks</h4>

        <li><a href="./dashboardalltasks.php">All Tasks </a></li>
        <li><a href="./dashboardinprogress.php">In Progress </a></li>
        <li><a href="./dashboardcompleted.php">Completed </a></li>
        <li><a href="./dashboardpending.php">Pending </a></li>
     
        <li><a href="./addtask.php">Add Task </a></li>
        <h4 style="color:white;font-size:1.2rem;margin:0;color:var(--blue1);margin-top:20px;">Users</h4>
        
        <li><a href="../register.php">Add User </a></li>
        <li><a href="./userlist.php">User List </a></li>
        <h4 style="color:white;font-size:1.2rem;margin:0;color:var(--blue1);margin-top:20px;">Admins</h4>
        <li><a href="./adminlist.php">Admin List </a></li>
        <li><a href="<?= "../func/updAdmin.php?ID=".$_SESSION["adminid"] ?>">Edit your info </a></li>

        </ul>
    </aside> 
    <div class="main-content">
        <div class="meetingcard-container">
        <?php 
        $mtng = new Meeting();
        $meetings = $mtng->showAllMeetings();
        foreach($meetings as $meeting){ 
        ?>
        <div class="meeting-card">
    <p class="card-title">
        <span style="font-size:2.5rem"class="material-symbols-outlined inline-icon" >groups</span>
                <?= $meeting["title"]?></p>
            <p class="card-desc"><?= $meeting["description"]?></p>
            <br>
            <div class="card-length"> 
           
                
            <p class="card-start" style="margin-right:30px">
                <span class="material-symbols-outlined">
                    schedule    
                </span>
            <?= $meeting["length"]?> min
            </p>
            
            <p class="card-start">
            <span class="material-symbols-outlined">
                calendar_month
            </span>
            <?= date_format(date_create($meeting["starttime"]), 'h:i A | d-m-Y ')?>
            </p>

            <p class="card-location">
                <span class="material-symbols-outlined">location_on
                </span> 
            <?= $meeting["location"]?>
            </p>
            
            <a class="card-start"style="text-decoration:none;color:black;margin-left:30px" href="<?= $meeting["link"]?>">
                <span class="material-symbols-outlined">
                share
                </span> 
            Link
            </a> 
            
        </div>
           
           
        </div>





        <?php }?>
       
    </div>
    </div>
    </main>


</body>
</html>