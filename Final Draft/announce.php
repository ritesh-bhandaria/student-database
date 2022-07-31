<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include 'dbconnect.php';
        include 'teacherdatabase.php';
    }
    $course= $_POST["course"];
    $announcement= $_POST["announcement"];
        $sql="INSERT INTO `announcement` (`course`, `announcement`, `date`) VALUES ('$course', '$announcement', current_timestamp());";
        $result= mysqli_query($conn,$sql); 
?>