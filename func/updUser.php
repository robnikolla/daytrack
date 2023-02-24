<?php 
  session_start();
  $text = "Login";
  $redirect = "./login.php";
  $dashboardicon = "";
  if(isset($_SESSION['username'])){
    $text = "Logout";
    $redirect = "./logout.php";
  }
    include '../logic/user.php';
    $usr = new User();
    $id = $_REQUEST["ID"];
    $row = $usr->edit($id);
    $data = null;

  if (isset($_POST['update'])) {
    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['email']) && isset($_POST['username']) ) {
        $updateusr = new User(  $id,
                                $_POST['name'],
                                $_POST['surname'],
                                $_POST['email'],
                                $_POST['username'],
                                $_POST['password'],
                                $_POST['password']);

        $update = $updateusr->update();

        if($update){
          echo "<script>alert('record update successfully');</script>";
          echo "<script>window.location.href = '../dashboard/dashboard.php';</script>";
        }else{
          echo "<script>alert('record update failed');</script>";
          echo "<script>window.location.href = '../dashboard/dashboard.php';</script>";
        }

      }else{
        echo "<script>alert('empty');</script>";
        header("Location: ./updUser.php?ID=$id");
      }
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
            <li><a href="./dashboard/dashboard.php" class="header-links"><span class="material-symbols-outlined" style="padding-right:5px">
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

        <div class="login-form">
            
            <form id="form" action="" method="POST">
            <h2 style="color:var(--zorange)"> Update User</h2>          
            <p>Welcome! Update user here.</p> <hr>
            <br>
            <input type="hidden" name="ID" value="<?=$row["ID"]?>">

            <label for="username" >First Name:</label><br>
            <input name="name" value="<?= $row["name"] ?>" type="text" class="log-input" id="name" ><br>
            
            <label for="username">Last Name:</label><br>
            <input name="surname" value="<?=$row["surname"]?>" type="text" class="log-input" id="surname" ><br>
            
            <label for="username">E-Mail:</label><br>
            <input name="email" value="<?= $row["email"]?>" type="email" class="log-input" id="email" ><br>

            <label for="username">Username:</label><br>
            <input name="username" value="<?= $row["username"]?>" type="text" class="log-input" id="username"><br>
            <label for="password">Password:</label><br>
            <input name="password" value="<?= $row["password"]?>" type="password" class="log-input" id="password"><br>
            
            
            <br><br>
            
            <button name="update" type="submit" class="log-submit" id="submit">Update</button>

            <br><br><br><br><br>
            <hr>
            <p>Register an account? <a href="../register.php"><span style="text-decoration:underline;color:var(--zorange)">Register</span></a></p>
            
        </form>
        
        </div>
    </main>
</body>
</html>
