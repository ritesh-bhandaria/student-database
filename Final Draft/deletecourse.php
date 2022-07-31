<?php
    if(isset($_POST['todelete'])){
        include 'dbconnect.php';
        include 'teacherdatabase.php';

        $course_name= $_POST["todelete"];
    $delete = "DELETE FROM courses WHERE course_name = '$course_name'"; 
    $results = mysqli_query($conn, $delete);
    /**if($results)
        {echo "<script>alert('successfully deleted the course')</script>";
        header('location: teacherdatabase.php');}
    else
        echo "<script>alert('failed to delete the course')</script>";
        **/
}
?>
<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete a course</title>
</head>
<body>
    <form action="deletecourse.php" method="POST">
        <h1>delete a course</h1>
        <h2>course name</h2>
        <input type="text" name=course_name>
        <br>
        <button type="submit" onclick="showalert()">delete</button>
    </form>
    <script>
        function showalert(){
            alert("your course will get deleted");
        }
    </script>
</body>
</html>-->