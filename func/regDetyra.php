<?php  
    require_once("../logic/detyra.php");

    if(isset($_POST['submit'])){
                 $newDetyra = new Detyra(
                            $_POST["ID"],
                            $_POST["desc"],
                            $_POST["status"],
                            $_POST["deadline"],
                            $_POST["username"],
                            $_POST["admin"],
                            $_POST["progress"],
        );

        $newDetyra->registerDetyra();
    }

    header("Location:../dashboard/dashboard.php");

?>