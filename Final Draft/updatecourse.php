<?php
   if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    include 'teacherdatabase.php';}
    $course_name= $_POST["course_name"];
    $credits= $_POST["credits"];
    $syllabus= $_POST["syllabus"];
    $lecture_link=$_POST["lecture_link"];
    $lecture_folder=$_POST["lecture_folder"];
    $marksheets=$_POST["marksheets"];
    $additionals=$_POST["additionals"];
    if($_POST["credits"]){
        $update = "UPDATE courses SET credits = '$credits' WHERE course_name = '$course_name'";
        $result= mysqli_query($conn,$update);
    }
    if($_POST["syllabus"]){ 
    $update = "UPDATE courses SET syllabus = '$syllabus' WHERE course_name = '$course_name'";
    $result= mysqli_query($conn,$update);
    }
    if($_POST["lecture_link"]){
    $update = "UPDATE courses SET lecture_link = '$lecture_link' WHERE course_name = '$course_name'";
    $result= mysqli_query($conn,$update);
    }
    if($_POST["lecture_folder"]){ 
    $update = "UPDATE courses SET lecture_folder = '$lecture_folder' WHERE course_name = '$course_name'";
    $result= mysqli_query($conn,$update);
    }
    if($_POST["marksheets"]){ 
    $update = "UPDATE courses SET marksheets = '$marksheets' WHERE course_name = '$course_name'";
    $result= mysqli_query($conn,$update);
    }
    if($_POST["additionals"]){ 
    $update = "UPDATE courses SET additionals = '$additionals' WHERE course_name = '$course_name'";
    $result= mysqli_query($conn,$update);
    }
//problem problem problem 
?>
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update your courses</title>
</head>
<body>
    <form action="updatecourse.php" method="POST">
        <h1>update your course</h1>
        <h2>enter course name</h2>
        <input type="text" name="course_name" required>
        <br>
        <br>
        <p>enter what you need to update</p>
        <br>
        <h2>credits</h2>
        <input type="text" name="credits">
        <h2>syllabus</h2>
        <input type="url" name="syllabus">
        <h2>class link</h2>
        <input type="url" name="lecture_link">
        <h2>drive folder</h2>
        <input type="url" name="lecture_folder">
        <h2>marksheet(google sheet link)</h2>
        <input type="url" name="marksheets">
        <h2>additional reference material</h2>
        <input type="url" name="additionals">
        <br>
        <button type="submit">click here to update</button>
    </form>
</body>
</html>-->