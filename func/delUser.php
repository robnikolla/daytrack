<?php 

include '../logic/user.php';
$usr = new User();

$usr->setID($_REQUEST["ID"]);
$check = $usr->deleteUser();

if ($check) {
    echo "<script>alert('delete successfully');</script>";
    echo "<script>window.location.href = '../dashboard/userlist.php';</script>";
}


?>