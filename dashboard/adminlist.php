<?php 
    session_start();
    include_once("../dbCon.php");
    include_once("../logic/admin.php");
    
    
    if(!isset($_SESSION['username'])){
        header('Location:../login.php');
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
           <li><a href="index.html" class="header-links"><span style="padding-right:5px" class="material-symbols-outlined">
               home
               </span> Home</a> </li>
           <li><a href="" class="header-links"><span class="material-symbols-outlined" style="padding-right:5px">
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
        <li><a href="#">Add Admin </a></li>
        <li><a href="#">Admin List </a></li>

        </ul>
    </aside> 
  
    <div class="main-content">
        

        <table class="detyratable">
           <h2 style="padding:0px 10px;">Admin Table</h2>
           <tr>
               <th>ID</th>
               <th>Full Name</th>
               <th>Email</th>
               <th>Username</th>
               <th>Password</th>
               <th colspan="2">Actions</th>
           </tr>
           <?php 
           $usr = new Admin();
           $users = $usr->showAllAdmins();
       
           foreach($users as $user){
           ?>
               <tr>
                   <td><?= $user["ID"]?></td>
                   <td><?= $user["name"]. " ".$user["surname"]?></td>
                   <td><?= $user["email"]?></td>
                   <td><?= $user["username"]?></td>
                   <td><?= $user["password"]?></td>
                   <td>
                    <a href="<?= "../func/updAdmin.php?ID=$user[ID]"?>"><button class="updatebtn">Update</button></a> 
                </td>
               
               </tr>
           <?php
           }
           ?>

           </table>
    
    
    </div>



    </main>


</body>
</html>