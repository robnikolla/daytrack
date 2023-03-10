<?php 
  session_start();
  
  if(isset($_SESSION["username"])){
    header("Location:./dashboard/dashboard.php");
}

  $text = "Login";
  $redirect = "./login.php";
  $dashboardicon = "";
  if(isset($_SESSION['username'])){
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
    <title>Log In</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="style/sty1.css">
    <link rel="stylesheet" href="">
</head>
<body>
    <header>
       
        <h2 style="margin:auto 0"> <a href="index.html" style="text-decoration:none;color:white" > Day<span style="color:var(--zorange)">Track</span> </a></h2> 
        
        <ul >
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
            
            <form onsubmit="validateForm()" action="./loginLogic.php" method="POST">
            <h2 style="color:var(--zorange)"> Login</h2>          
            <p>Access your projects here</p> <hr>
            <br>
            
            <label for="username">Username:</label><br>
            <input name="username" type="username" class="log-input" id="login-username"><br>
            <label for="password">Password:</label><br> 
            <input name="password" type="password" class="log-input" id="login-password">
            <br><br>
            <button name="submit" type="submit" class="log-submit">Submit</button>

            <br><br><br><br><br>
            <hr>
            <p>Don't have an account yet? <a href="register.php"><span style="text-decoration:underline;color:var(--zorange)">Sign Up</span></a></p>
            
        </form>
        
        </div>


        
    </main>
    <script>
        

        let usernameinput = document.getElementById("login-username");
        let passwordinput = document.getElementById("login-password");
        
        const defaultuser = "robertpatrik";
        const defaultpw = "login12345";
        
        function isEmpty(str) {
             return !str.trim().length;
        }
        
        function validateForm(){
            if(isEmpty(usernameinput.value) || isEmpty(passwordinput.value)){
                alert("All fields should have values!");
            }
            else if (usernameinput.value == defaultuser && passwordinput.value == defaultpw){
                alert("Login success");
            }
        }




    </script>

   
</body>
</html>
