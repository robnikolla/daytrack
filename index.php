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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <title>DayTrack</title>
    <link rel="stylesheet" href="style/sty1.css">
    <link rel="stylesheet" href="style/slider.css">
    
</head>
<body>
    <header>
       
        <h2 style="margin:auto 0"> <a href="./index.php" style="text-decoration:none;color:white" > Day<span style="color:var(--zorange)">Track</span> </a></h2> 
        
        <ul >
            <li><a href="./index.php" class="header-links"><span style="padding-right:5px" class="material-symbols-outlined">
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
    <main>
        <div class="hero">
           <img src="img/heropmanage.png" alt=""  style="margin-bottom:10px;height:30vh;border: 2px solid var(--zorange);border-radius:15px;" />
           <div style="background-color:var(--zblue);padding:60px;color:white;border-radius:10px">
             <h1>Manage your <span style="color:var(--zorange);font-size: larger;" f>Projects</span> </h1>
            <p style="width:50vh;color:var(--blue1)">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit nam fuga expedita, ipsam odio dolores, culpa totam dicta a repellendus dolor aliquam quia, maxime iste nihil atque quibusdam adipisci nostrum?</p>        
               <a href="./login.php"><button class="herobtn">Login</button></a>
        </div> 
        
        </div>


         <!-- Slideshow container -->
<div class="slideshow-container">

    <!-- Full-width images with number and caption text -->
    <div class="mySlides fade">
      
      <div class="slidediv">
        <img src="img/slider1.png" style="height:300px">
        <p style="width:40vh">Welcome to DayTrack, the ultimate project management system for businesses of all sizes. With DayTrack, you can easily organize and track the progress of your projects, assign tasks to team members, and collaborate with your team in real-time.</p>
    </div>
      
    </div>
  
    <div class="mySlides fa
    
    de">
        
        <div class="slidediv">
          <img src="img/slider2.png" style="height:300px">
          <p style="width:40vh">Our intuitive interface makes it easy to get started with DayTrack, even if you have no prior experience with project management software. Simply create a project, add your team members, and start assigning tasks. You can even set deadlines and priorities for each task to ensure that your projects stay on track.</p>
      </div>
        
      </div>
  
      <div class="mySlides fade">
        
        <div class="slidediv">
          <img src="img/slider3.png" style="height:300px">
          <p style="width:40vh">Whether you're managing a small team or a large organization, DayTrack has the features you need to successfully manage your projects from start to finish. Try DayTrack today and see the difference it can make for your business.</p>
      </div>
        
      </div>
  
    <!-- Next and previous buttons -->
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <br>
  
  <!-- The dots/circles -->
  <div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div> 

<br><br>

        <div style="background-color: var(--zblue);padding-bottom:3vh">
            
            <h2 style="text-align:center;color:var(--blue1);margin-top:0;padding-top:30px;font-size: 1.7rem;">Our clients</h2><br>
            <div style="display:flex;flex-direction: inline;flex-wrap:wrap; justify-content: space-evenly;">
                <img src="img/tesla-9.svg" alt="" style="width:140px;padding:5px">
                <img src="img/google-2015.svg" alt="" style="width:140px;padding:5px">
                <img src="img/microsoft.svg" alt="" style="width:140px;padding:5px">
                <img src="img/spotify-1.svg" alt="" style="width:140px;padding:5px">
                <img src="img/docker-1.svg" alt="" style="width:140px;padding:5px">
            </div>

        </div>
       




       <img src="./img/waves.png" style="width:100%">
        <h1 style="text-align:center;margin-top:0">Benefits of using DayTrack</h1>
        <br><br>
        <div class="about">
            <div class="aboutone">
                <img class="abouticons"src="img/control-panel.png" alt="">
                <h3>Control</h3>
                <p style="width:30vh">Always have an eye on your projects progress.</p>
            </div>
            <div class="aboutone">
                <img class="abouticons"src="img/iteration.png" alt="">
                <h3>Process</h3>
                <p style="width:30vh">Manage and process tasks faster.</p>
            </div>
            <div class="aboutone">
                <img class="abouticons" src="img/artificial-intelligence.png" alt="">
                <h3>Never Forget</h3>
                <p style="width:30vh">Always reminded for upcoming events.</p>
            </div>
        </div>
       



    </main>


    <script>
        let slideIndex = 1;
        showSlides(slideIndex);
        
        // Next/previous controls
        function plusSlides(n) {
          showSlides(slideIndex += n);
        }
        
        // Thumbnail image controls
        function currentSlide(n) {
          showSlides(slideIndex = n);
        }
        
        function showSlides(n) {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("dot");
          if (n > slides.length) {slideIndex = 1}
          if (n < 1) {slideIndex = slides.length}
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
        ????????dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex-1].style.display = "block";
          dots[slideIndex-1].className += " active";
        } </script>



<footer style="width:100%;background-color:var(--zblue);height:70px;display:flex;justify-content:center;align-content:center">
  <p style="color:white;">Created by: Robert Nikolla and Patrik Nikolla</p>

</footer>
</body>
</html>
