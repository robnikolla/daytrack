<?php 
require_once("../logic/user.php");

if(isset($_POST['submit']))
        $username = $_POST['username'];
		$email = $_POST['email'];
			// Check for user and admin
			$sql = "SELECT * FROM admindb adb, usersdb udb WHERE adb.username=:username or udb.username = :username OR adb.email=:email or udb.email=:email";
			$query = $databaseconn->connDB()->prepare($sql);
			$query -> execute(
				array(
					'username' => $username,
					'email' => $email,
				)
			);
			$count = $query -> rowCount();
        
			if($count>0){
				echo "<script>alert('Username or Email are already taken');</script>";
                echo "<script>window.location.href = '../register.php';</script>";
			} else {
            $newUser = new User($_POST['ID'],
                        $_POST['name'],
                        $_POST['surname'],
                        $_POST['email'],
                        $_POST['username'],
                        $_POST['password'],
                        $_POST['confpassword']);
            $newUser->registerUser();
            }
?>