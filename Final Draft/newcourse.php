<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    include 'teacherdatabase.php';
    $course_name= $_POST["course_name"];
    $credits= $_POST["credits"];
    $syllabus= $_POST["syllabus"];
    $lecture_link=$_POST["lecture_link"];
    $lecture_folder=$_POST["lecture_folder"];
    $marksheets=$_POST["marksheets"];
    $additionals=$_POST["additionals"];
    $sql="INSERT INTO `courses` (`course_name`, `credits`, `syllabus`, `lecture_link`, `lecture_folder`, `marksheets`, `additionals`, `course_instructor`,`date`) VALUES ('$course_name', '$credits', '$syllabus', '$lecture_link', '$lecture_folder', '$marksheets', '$additionals', '$universalname', current_timestamp())";
    $result= mysqli_query($conn,$sql);
    //if($result)
      // { echo "<script>alert('new course added !')</script>";
        //header('location: teacherdatabase.php');}
    //else
    //echo "<script>alert('failed to add the course')</script>";
}
?>

<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create a new course</title>
</head>
<body>
    <form action="newcourse.php" method="POST">
        <h1>CREATE A NEW COURSE</h1>
        <H2>course name</H2>
        <input type="text" name="course_name" required>
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
        <br>
        <input type="url" name="additionals">
        <button type="submit">click here to submit</button>
    </form>
</body>
</html>-->