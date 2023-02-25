<?php 
  session_start();
  $text = "Login";
  $redirect = "./login.php";
  $dashboardicon = "";
  if(isset($_SESSION['admin'])){
    $text = "Logout";
    $redirect = "./logout.php";
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../style/sty1.css">
    <link rel="stylesheet" href="">
</head>
<body>
    <header>
       
        <h2 style="margin:auto 0"> <a href="index.html" style="text-decoration:none;color:white" > Day<span style="color:var(--zorange)">Track</span> </a></h2> 
        
        <ul>
            <li><a href="index.php" class="header-links"><span style="padding-right:5px" class="material-symbols-outlined">
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
            <li><a href="./register.php" class="header-links"><span class="material-symbols-outlined" style="padding-right:5px">
                how_to_reg
                </span>Register</a></li>
           
        </ul>
   
    </header>

    <main class="login-main">

        <div class="login-form" style="margin-top:1.5rem">
            
            <form id="form" action="../func/regMeeting.php" method="POST">
            <h2 style="color:var(--zorange)"> Add New Meeting</h2>          
            <p>Add a new meeting here!</p> <hr>
            <br>
            <input type="hidden" name="ID">
            <input type="hidden" name="admin" value="<?= $_SESSION["adminid"]?>">

            <label for="title">Meeting Name:</label><br>
            <input name="title" type="text" class="log-input" id="desc" ><br>
            <label for="desc">Meeting Description:</label><br>
            <input name="desc" type="text" class="log-input" id="desc" ><br>
            
            <label for="start">Start of Meeting:</label><br>
            <input name="start" type="datetime-local" class="log-input" id="starttime" ><br>
            <label for="length">Length of Meeting (Use minutes):</label><br>
            <input name="length" type="number" class="log-input" id="username" ><br>
            <label for="location">Location:</label><br>
            <input name="location" type="text" class="log-input" id="location" ><br>
            <label for="link">Meeting Link:</label><br>
            <input name="link" type="text" class="log-input" id="link" ><br>
            <label for="members">Participants (Use emails and divide with ;):</label><br>
            <textarea name="members" rows="10" type="textarea" class="log-input" id="link"> </textarea><br>

            
            <br>
            
            <button name="submit" type="submit" class="log-submit" id="submit">Submit</button>

            <br><br><br><br><br>
            
            
        </form>
        
        </div>


        
    </main>
    <br><br><br><br><br>
</body>
</html>
