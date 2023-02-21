<?php 
  session_start();
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
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="style/sty1.css">
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
            
            <form id="form" onsubmit="validateForm()" action="./func/regUser.php" method="POST">
            <h2 style="color:var(--zorange)"> Register</h2>          
            <p>Welcome! Create an account here.</p> <hr>
            <br>
            <input type="hidden" name="ID">

            <label for="username" >First Name:</label><br>
            <input name="name" type="text" class="log-input" id="name" ><br>
            
            <label for="username">Last Name:</label><br>
            <input name="surname" type="text" class="log-input" id="surname" ><br>
            
            <label for="username">E-Mail:</label><br>
            <input name="email" type="email" class="log-input" id="email" ><br>

            <label for="username">Username:</label><br>
            <input name="username" type="text" class="log-input" id="username"><br>
            
            <label for="password">Password:</label><br> 
            <input name="password" type="password" class="log-input" id="password" >
            
            <label for="username">Confirm Password:</label><br>
            <input name="confpassword" type="password" class="log-input" id="confpassword" ><br>
            <br><br>
            
            <button name="submit" type="submit" class="log-submit" id="submit">Submit</button>

            <br><br><br><br><br>
            <hr>
            <p>Already have an account? <a href="login.html"><span style="text-decoration:underline;color:var(--zorange)">Log In</span></a></p>
            
        </form>
        
        </div>
         <script>
        const fname = document.getElementById("name");
        const lname = document.getElementById("surname");
        const email = document.getElementById("email");
        const password = document.getElementById("password");
        const confirmpassword = document.getElementById("confpassword");


        function isEmpty(str) {
             return !str.trim().length;
        }

        function validateForm(){
            if( isEmpty(fname.value) ||isEmpty(lname.value) ||
                isEmpty(email.value) ||isEmpty(password.value) ||
                isEmpty(confirmpassword.value)){
                alert("All fields should have values!")
                return false
            }
            else if(password.value !== confirmpassword.value){
                alert("Passwords should match!")
                return false
            } 
            else if((password.value).length < 8 ){
                alert("Password should be longer than 8 characters!")
                return false
            }
            else if(!(email.value).match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
                alert("Email is not valid!")
                return false
            }
        
        }




    </script>


        
    </main>
</body>
</html>
