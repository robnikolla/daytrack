<?php 
	session_start();
	include_once './dbCon.php';

	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(empty($username)||empty($password)){
			echo "<script>alert('please fill out the fields'); </script>";
		}
		else{
			// Check for user
			$sql = "SELECT * FROM admindb WHERE username=:username AND password=:password";
			
			$query = $databaseconn->connDB()->prepare($sql);
			$query -> execute(
				array(
					'username' => $username,
					'password' => $password
				)
			);
			$count = $query -> rowCount();
        
			if($count>0){
				$loggeduser = $query->fetch();
				$_SESSION["type"] = "admin";
				$_SESSION["adminid"] = $loggeduser["ID"];
				$_SESSION["username"] = $loggeduser["username"];
				$_SESSION["fullname"] = $loggeduser["name"]." ".$loggeduser["surname"];
                header('Location:./dashboard/dashboard.php');
			}
			else{
					$sql = "SELECT * FROM usersdb WHERE username=:username AND password=:password";
			
					$query = $databaseconn->connDB()->prepare($sql);
					$query -> execute(
						array(
							'username' => $username,
							'password' => $password
						)
					);
					$count = $query -> rowCount();
				
					if($count>0){
						$loggeduser = $query->fetch();
						$_SESSION["type"] = "user";
						$_SESSION["username"] = $loggeduser["username"];
						$_SESSION["fullname"] = $loggeduser["name"]." ".$loggeduser["surname"];
						header('Location:./dashboard/dashboard.php');
					}
					else{
						echo "<script>alert('Wrong credentials');</script>";
    					echo "<script>window.location.href = './login.php';</script>";
					}
			}
		}
	}
?>