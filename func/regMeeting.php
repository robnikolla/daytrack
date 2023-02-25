<?php  
require_once("../logic/meeting.php");

if(isset($_POST['submit'])){
             $newMeeting = new Meeting(
                        $_POST["ID"],
                        $_POST["title"],
                        $_POST["start"],
                        $_POST["length"],
                        $_POST["location"],
                        $_POST["link"],
                        $_POST["desc"],
                        $_POST["admin"],
                        $_POST["members"]
             );

    $newMeeting->registerMeeting();
    $newMeeting->registerMeetingUser();
}

header("Location:../dashboard/dashboard.php");

?>

