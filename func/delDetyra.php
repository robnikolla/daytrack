<?php 

include '../logic/detyra.php';
$dtr = new Detyra();
$dtr->setID($_REQUEST["ID"]);
$check = $dtr->deleteDetyra();

if ($check) {
    echo "<script>alert('delete successfully');</script>";
    echo "<script>window.location.href = '../dashboard/dashboard.php';</script>";
}


?>