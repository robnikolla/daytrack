<?php 
  session_start();
  $text = "Login";
  $redirect = "./login.php";
  $dashboardicon = "";
  if(isset($_SESSION['admin'])){
    $text = "Logout";
    $redirect = "./logout.php";
  }
  if($_SESSION["type"] == "user"){
    header("Location:./workdash/workerdashboard.php");
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

        <div class="login-form">
            
            <form id="form" onsubmit="validateForm()" action="../func/regDetyra.php" method="POST">
            <h2 style="color:var(--zorange)"> Add New Task</h2>          
            <p>Add a new task here!</p> <hr>
            <br>
            <input type="hidden" name="ID">
            <input type="hidden" name="admin" value="<?= $_SESSION["adminid"]?>">

            <label for="desc">Task Description:</label><br>
            <input name="desc" type="text" class="log-input" id="desc" ><br>
            
            <label for="username">Username of Employee:</label><br>
            <input name="username" type="text" class="log-input" id="username" ><br>
           
            <label for="Deadline">Deadline:</label><br>
            <input name="deadline" type="date" class="log-input" id="deadline" ><br>

            <label for="status">Current status</label><br>
            <select name="status" class="currentstatus">
                <option value="Completed">Completed</option>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
            </select> 
            <br>
            <label for="progress">Progress Status : <span id="barvalue"> </span></label><br>
            <div class="slidecontainer">
                <input name="progress" type="range" min="0" max="100" value="0" class="slider" id="myRange">
            </div>
            <br><br>
            
            <button name="submit" type="submit" class="log-submit" id="submit">Submit</button>

            <br><br><br><br><br>
            
            
        </form>
        
        </div>
         <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("barvalue");
        output.innerHTML = slider.value; // Display the default slider value

        // Update the current slider value (each time you drag the slider handle)
        slider.oninput = function() {
        output.innerHTML = this.value + "%";
        } 


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
            }
            else if(password.value !== confirmpassword.value){
                alert("Passwords should match!")
            } 
            else if((password.value).length < 8 ){
                alert("Password should be longer than 8 characters!")
            }
            else if(!(email.value).match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)){
                alert("Email is not valid!")
            }
        
        }




    </script>


        
    </main>
</body>
</html>
