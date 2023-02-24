<?php 
  session_start();
  $text = "Login";
  $redirect = "./login.php";
  $disabled = "";
  if(isset($_SESSION['admin'])){
    $text = "Logout";
    $redirect = "./logout.php";
  }
  if($_SESSION["type"] == "user"){
    $disabled = "readonly='true'";
  }

  include '../logic/detyra.php';
  $dtr = new Detyra();
  $id = $_REQUEST["ID"];
  $row = $dtr->edit($id);

  if (isset($_POST['update'])) {
    if (isset($_POST['desc']) && isset($_POST['status']) && isset($_POST['deadline']) && isset($_POST['username'])) {
        $detyraupd = new Detyra( $id,
                                $_POST['desc'],
                                $_POST['status'],
                                $_POST['deadline'],
                                $_POST['username'],
                                $_POST['admin'],
                                $_POST['progress']);

        $update = $detyraupd->update();
        

        if($update){
          echo "<script>alert('record update successfully');</script>";
          echo "<script>window.location.href = '../dashboard/dashboard.php';</script>";
        }else{
          echo "<script>alert('record update failed');</script>";
          echo "<script>window.location.href = '../dashboard/dashboard.php';</script>";
        }

      }else{
        echo $update;
        header("Location: ./updDetyra.php?ID=$id");
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
            <li><a href="../index.php" class="header-links"><span style="padding-right:5px" class="material-symbols-outlined">
                home
                </span> Home</a> </li>
            <li><a href="../dashboard/dashboard.php" class="header-links"><span class="material-symbols-outlined" style="padding-right:5px">
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
            <h2 style="color:var(--zorange)"> Update Task</h2>          
            <p>Update tasks here!</p> <hr>
            <br>
            <input type="hidden" name="ID" value="<?= $id?>">
            <input type="hidden" name="admin" value="<?= $row["admin"]?>">

            <label for="desc">Task Description:</label><br>
            <input name="desc" type="text" class="log-input" id="desc" value="<?= $row["desc"]?>" ><br>
            
            <label for="username">Username of Employee:</label><br>
            <input name="username" type="text" class="log-input" id="username" value="<?= $row["username"] ?>" <?= $disabled ?> ><br>
           
            <label for="Deadline">Deadline:</label><br>
            <input name="deadline" type="date" class="log-input" id="deadline" value="<?= $row["deadline"] ?>" <?= $disabled ?> ><br>

            <label for="status">Current status</label><br>
            <select name="status" class="currentstatus" value="<?= $row["status"] ?>"  > 
                <option value="Completed" <?= ($row["status"] == "Completed" ? "selected" : "") ?>>Completed</option>
                <option value="Pending" <?= ($row["status"] == "Pending" ? "selected" : "") ?>>Pending</option>
                <option value="In Progress" <?= ($row["status"] == "In Progress" ? "selected" : "") ?>>In Progress</option>
            </select> 
            <br>
            <label for="progress">Progress Status : <span id="barvalue"> </span></label><br>
            <div class="slidecontainer">
                <input name="progress" type="range" min="0" max="100" value="<?= $row["progress"] ?>" class="slider" id="myRange">
            </div>
            <br><br>
            
            <button name="update" type="submit" class="log-submit" id="submit">Update</button>

            <br><br><br><br><br>
            
            
        </form>
        
        </div>
         <script>
        var slider = document.getElementById("myRange");
        var output = document.getElementById("barvalue");
        output.innerHTML = slider.value; 

        slider.oninput = function() {
        output.innerHTML = this.value + "%";
        } 
    </script>


        
    </main>
</body>
</html>
