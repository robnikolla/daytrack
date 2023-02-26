<?php 
    session_start();
    include_once("../dbCon.php");
    include_once("../logic/detyra.php");
    
    
    if(!isset($_SESSION['username'])){
        header('Location:../login.php');
    }
    if($_SESSION["type"] == "user"){
        header('Location:./workdash/workerdashboard.php');
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
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
           <li><a href="#" class="header-links"><span class="material-symbols-outlined" style="padding-right:5px">
               task
               </span>Tasks</a> </li> 
       </ul>
       <ul>
           <li><a href="<?= $redirect ?>" class="header-links"><span class="material-symbols-outlined" style="padding-right:5px">
               login
               </span><?= $text ?></a></li>
           <li><a href="../register.php" class="header-links"><span class="material-symbols-outlined" style="padding-right:5px">
               how_to_reg
               </span>Register</a></li>
          
       </ul>
  
   </header>
    
   <main style="display:flex;">
    <aside class="aside">
        <h3 style="padding-left:2rem;padding-right:1rem;font-weight:600;font-size:1.5rem;color:white" >Dashboard</h3>
        <ul>
            <h4 style="color:white;font-size:1.2rem;margin:0;color:var(--blue1)">Tasks</h4>

        <li><a href="./dashboardalltasks.php">All Tasks </a></li>
        <li><a href="./dashboardinprogress.php">In Progress </a></li>
        <li><a href="./dashboardcompleted.php">Completed </a></li>
        <li><a href="./dashboardpending.php">Pending </a></li>
        <li><a href="./addtask.php">Add Task </a></li>
        <h4 style="color:white;font-size:1.2rem;margin:0;color:var(--blue1);margin-top:20px;">Meetings</h4>

        <li><a href="./allmeetings.php">All Meetings </a></li>
        <li><a href="./addmeeting.php">Add Meeting </a></li>
        <h4 style="color:white;font-size:1.2rem;margin:0;color:var(--blue1);margin-top:20px;">Users</h4>
        
        <li><a href="../register.php">Add User </a></li>
        <li><a href="./userlist.php">User List </a></li>
        <h4 style="color:white;font-size:1.2rem;margin:0;color:var(--blue1);margin-top:20px;">Admins</h4>
        <li><a href="./adminlist.php">Admin List </a></li>
        <li><a href="<?= "../func/updAdmin.php?ID=".$_SESSION["adminid"] ?>">Edit your info </a></li>

        </ul>
    </aside> 
    <?php $dtr = new Detyra();
        $all = $dtr->nrOfAllDetyra();
        $completed = $dtr->nrOfCompletedDetyra();
        $pending = $dtr->nrOfPendingDetyra();
        $inprg = $dtr->nrOfInProgressDetyra(); 
        $ovrd = $dtr->showOverdue();
        ?>
  
    <div class="main-content">
        <h2 style="padding:0px 10px">Welcome, <?= $_SESSION['fullname']?></h2>
        <div style="display:flex;flex-direction:row;flex-wrap:wrap">
            <div class="dashboard-stat-card"> 
                <p>All Tasks: <span class="card-number"><?= $all ?></span> </p>
            </div>
            <div class="dashboard-stat-card"> 
                <p>Completed: <span class="card-number"><?= $completed ?></span> </p>
            </div>
            <div class="dashboard-stat-card"> 
                <p>In Progress: <span class="card-number"><?= $inprg ?></span> </p>
            </div>
            <div class="dashboard-stat-card"> 
                <p>Pending: <span class="card-number"><?= $pending ?></span> </p>
            </div>
            
        </div>
        <div class="top3-card">
            <h3 style="color:var(--blue1);text-align:center">Top 3 performers:</h3>
            <table>
            <?php $top3 = $dtr->top3Performers();
            $i= 1;
            foreach($top3 as $employee){
                ?> 
                <tr>
                <td style="color:var(--blue1);font-weight:bold;"><?= $i ?></td>
                <td ><?= $employee["name"]." ".$employee["surname"]?></td>
                
                <td style="color:var(--blue1);"> <span style="color:white;font-size:1.1rem;"><?= $employee["nrDetyrave"]?></span> completed tasks</td>
                </tr>
                <?php
            $i++;    
        }
            
            ?>
            </table>
        </div>
        <h3 style="padding-left:10px;">Upcoming Deadlines</h3>

        <table class="detyratable">
           
           <tr>
            
            <th>Description</th>
               <th>Status</th>
               <th>Deadline</th>
               <th>Username</th>
            
           </tr>
           <?php 
           
           $detyrat = $dtr->showUpcoming();
        
       
           foreach($detyrat as $detyra){
           ?>
               <tr>
              
                   <td><?= $detyra["desc"]?></td>
                   <td><?= $detyra["status"]?></td>
                   <td><?= $detyra["deadline"]?></td>
                   <td><?= $detyra["username"]?></td>
                
               </tr>
           <?php
    
           }
           ?>

           </table>
    

           <h3 style="padding-left:10px;">Overdue Tasks</h3>

<table class="detyratable">
   
   <tr>
        <th>Overdue</th>
        <th>Description</th>
       
        <th>Deadline</th>
        <th>Username</th>
    
   </tr>
   <?php 
   foreach($ovrd as $detyra){
   ?>
       <tr>
            <td><?= $detyra["overdue"] ?> days</td>
           <td><?= $detyra["desc"]?></td>
           <td><?= $detyra["deadline"]?></td>
           <td><?= $detyra["username"]?></td>
        
       </tr>
   <?php

   }
   ?>

   </table>
    
    </div>



    </main>


</body>
</html>