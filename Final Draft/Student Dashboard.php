<?php
        // Server connection has been established
        session_start();
        $username = $_SESSION['username'];
        $con = mysqli_connect('localhost', 'root', '', 'pgdb');
        if(!$con)
        die('connection failed: ');

        // if(!isset($username))
        // $username = '20bcs183';

        // Processing and query for courses to be added
        if(isset($_POST['send_request']))
        {
            $addedCourses = $_POST['addedCourses'];

            foreach ($addedCourses as $key => $value) {
              $que = "INSERT INTO `joining`(`roll_no`, `course`) VALUES ('$username','$value');";

              if ($con->query($que) != TRUE) {
                echo "Error: " . $que . "<br>" . $con->error;
              }
            }

            unset($_POST['send_request']);
        }

        // Query for already enrolled subjects
        $sql = "SELECT `course` FROM `joining` WHERE `roll_no` = '$username';";

        $result = $con->query($sql);
        $Courses = Array();

        if($result)
        {
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
            {
                $Courses[] =  $row['course'];
            }
        }
        else
        echo 'Failed';
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <link rel="stylesheet" href="style.css">

  <title>
    Student Dashboard
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital@1&display=swap" rel="stylesheet">
  </title>
</head>

<body>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->

  <div class="container-fluid ttc m-3" style="background-color: #09A599; border-radius: 10px;">

    <div class="d-flex">
      <div class="">
        <h1 class="welcome" id="welcome"><b>WELCOME</b></h1>
        <?php
          echo
          '<div style = "margin-left: 660px; padding-left: 5px; padding-right: 5px; color: white; font-size: 25px; font-family: "Merriweather", serif;">
            <b>'.$username.'</b >
          </div>';
        ?>
      </div>
      <div class="ms-auto p-1">
        <a href='logout.php'>
          <button class="btn-primary p-2 Logout" id="logout"
            style="border: 2px solid blue; border-radius: 10px;">LOGOUT</button>
        </a>
      </div>
    </div>

    <div class="container-fluid bg-light tt" style="border-radius: 10px;">
      <div class="tth"><b>TIME TABLE</b></div>

      <table class="table table-bordered table-responsive border-primary">

        <thead>
          <tr>
            <th>Time/Day</th>
            <th>Monday</th>
            <th>Tuesday</th>
            <th>Wednesday</th>
            <th>Thrusday</th>
            <th>Saturday</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">9AM-10AM</th>
            <td>Elective</td>
            <td></td>
            <td>Data Structures</td>
            <td>COA</td>
            <td>Data Structures</td>
          </tr>
          <tr>
            <th scope="row">10AM-11AM</th>
            <td>DBMS</td>
            <td>DBMS</td>
            <td></td>
            <td></td>
            <td>Biology</td>
          </tr>
          <tr>
            <th scope="row">11AM-12PM</th>
            <td>COA</td>
            <td>COA</td>
            <td></td>
            <td>Elective</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">12PM-1PM</th>
            <td></td>
            <td>Elective</td>
            <td></td>
            <td>DBMS</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td><B>B</B></td>
            <td><B>R</B></td>
            <td><B>E</B></td>
            <td><B>A</B></td>
            <td><B>K</B></td>
          </tr>
          <tr>
            <th scope="row">2PM-3PM</th>
            <td>Data Science</td>
            <td></td>
            <td></td>
            <td>Data Science</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">3PM-4PM</th>
            <td>Java LAB</td>
            <td></td>
            <td></td>
            <td>DBMS LAB</td>
            <td></td>
          </tr>
          <tr>
            <th scope="row">4PM-5PM</th>
            <td>Java LAB</td>
            <td>Data Science</td>
            <td>Data Science LAB</td>
            <td>DBMS LAB</td>
            <td>Data Structures LAB</td>
          </tr>
          <tr>
            <th scope="row">5PM-6PM</th>
            <td>Java LAB</td>
            <td></td>
            <td>Data Science LAB</td>
            <td></td>
            <td>Data Structures LAB</td>
          </tr>
        </tbody>

      </table>
    </div>
  </div>

  <div class="overflow-hidden">
    <div class="row gx-2">
      <div class="col">
        <div class="p-1 c1" style="border-radius: 10px;">

          <div class="cdetails" id="Cdetails" style="display: block;">

            <div class="d-flex justify-content-center">
              <div class="" style="font-size: x-large; font-family: 'Merriweather', serif;"><b>ANNOUNCEMENTS</b></div>
            </div>

            <div class="overflow-scroll"
              style="background-color: #FFFEEC; font-size: 21px; height: 450px; margin-top: 10px; margin-left: 20px; margin-right: 20px; margin-bottom: 20px; padding: 10px; border-radius: 10px; border: 2px solid black;">
              <!-- This is the section for course related announcements -->
              <?php
                $query5 = 'SELECT * FROM announcement ORDER BY date DESC';
                $result5 = mysqli_query($con , $query5);
                while($row5=mysqli_fetch_array($result5))
                echo"
                <div style='margin: 1px; background-color:#ebebeb; border-radius: 10px;'>
                  <h6 style='float: left; margin: 5px;'><b>$row5[course]</b></h6><h6 style='float: right; margin: 5px;'><b>$row5[date]</b></h6>
                  <br>
                  <p style = 'margin: 10px;'>$row5[announcement]</p>
                </div>";
              ?>
            </div>

          </div>

          <div class="cmessage" id="Cmessage" style="display: none;">

            <p class="text-center"
              style="font-family: 'Merriweather', serif; font-size: x-large; padding: 15px; color: white; background-color: #09A599; border-radius: 15px; margin: 40px;">
              <b>Click On The Course <br> To See The Available Options</b>
            </p>

          </div>

        </div>
      </div>
      <div class="col-5">
        <div class="p-3 bg-light c2" style="border-radius: 10px;">

          <div class="d-flex flex-column" style="padding-right: 3vh; overflow-y: scroll; height: 510px;" id="myDIV">

            <?php

                $ctr = 1;

                foreach ($Courses as $i) {
                    $abc = "SELECT * from `courses` WHERE `course_name` = '$i'";

                    $res = $con->query($abc);

                    if($res)
                    {
                      while($row1 = mysqli_fetch_array($res, MYSQLI_ASSOC))
                      {
                        echo '<div class="dropdown">
                        <a class="btn course Button coption dropdown-toggle a" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        ' . $i . '
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <li><a class="btn Button coption dropdown-item" href="'.$row1['syllabus'].'" target = "_blank"><img src="Syllabus.png" alt="#"
                            style="padding-right: 10px;"><b>SYLLABUS</b></a></li>
                          <li><a class="btn Button coption dropdown-item" href="'.$row1['marksheets'].'" target = "_blank"><img src="Marksheet.png" alt="#"
                            style="padding-right: 10px;"><B>MARKSHEET</b></a></li>
                          <li><a class="btn Button coption dropdown-item" href="'.$row1['lecture_link'].'" target = "_blank"><img src="Join_the_class.png" alt="#"
                            style="padding-right: 10px;"><B>JOIN THE CLASS</b></a></li>
                          <li><a class="btn Button coption dropdown-item" href="'.$row1['lecture_folder'].'" target = "_blank"><img src="Notes.png" alt="#" style="padding-right: 10px;"><B>NOTES</b></a></li>
                          <li><a class="btn Button coption dropdown-item" href="'.$row1['additionals'].'" target = "_blank"><img src="Refrence_books.png" alt="#" style="padding-right: 10px;"><B>REFRENCE BOOKS</b></a></li>
                          <li><a class="btn Button coption dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal'.$ctr.'" href="#"><img src="Course_details.png" alt="#"
                            style="padding-right: 10px;"><B>COURSE DETAILS</b></a></li>
                        </ul>

                        <div class="modal fade" id="exampleModal'.$ctr.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><b>Course Details</b></h5>
                              </div>
                              <div class="modal-body" id = "details">
                                  <ul>
                                  <li><b>Course Name:&nbsp&nbsp</b>' . $row1['course_name'] . '</li>
                                  <li><b>Instructure:&nbsp&nbsp</b>' . $row1['course_instructor'] . '</li>
                                  <li><b>Credits:&nbsp&nbsp</b>' . $row1['credits'] . '</li>
                                  <li><b>Created On:&nbsp&nbsp</b>' . $row1['date'] . '</li>
                                  </ul>
                              </div>
                              <div class="modal-footer">
                                <button href="#" class="close btn btn-primary" data-bs-dismiss="modal" aria-label="close">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>';
                      }
                    }

                  $ctr++;
                }

            ?>

          </div>

        </div>
      </div>

      <div class="col">
        <div class="p-2 c3" style="background-color: #207DFF; border-radius: 10px;">

          <div class="d-flex justify-content-center">
            <div class="p-2" style="font-size: x-large; color: white; font-family: 'Merriweather', serif;"><b>ADD
                COURSES</b></div>
          </div>

          <div class="conatiner"
            style="background-color: #FFFEEC; font-size: 21px; height: 450px; margin-top: 10px; margin-left: 10px; margin-right: 10px; margin-bottom: 10px; padding-top: 100px; border-radius: 10px; border: 2px solid black">

            <div class="p-1" id="addMessage"
              style="display: block; color: white; margin: 25px; border-radius: 10px; padding-top: 20px;">
              <p class="text-center Para" style="font-size: 23px; font-family: 'Merriweather', serif;">
                <b>In Order To Add Courses
                  To Your Educational
                  Profile Use Need To
                  Browse Courses First</b>
              </p>
            </div>

            <button class="btn-primary p-2 Button" id="addButton"
              style="display: block; margin-left: 90px; margin-top: 10px; border-radius: 17px;">
              <b>Browse Courses Here</b></button>

                <div class="p-2" id="courseList"
                style="display: none; background-color: #ffc107; margin: 25px; border: 2px solid #ffc107; border-radius: 15px;">
                    <form action="Student Dashboard.php" method="post">
                        <div class="container my-4 overflow-auto" style = "height: 150px;">
                          <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="complex algebra" name = "addedCourses[]" id="check1">
                                <label class="custom-control-label" for="check1">complex algebra</label>
                              </div>
                            </li>
                            <li class="list-group-item">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="dbms lab" name = "addedCourses[]" id="check2">
                                <label class="custom-control-label" for="check2">dbms lab</label>
                              </div>
                            </li>
                            <li class="list-group-item">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="sql lab" name = "addedCourses[]" id="check3">
                                <label class="custom-control-label" for="check3">sql lab</label>
                              </div>
                            </li>
                            <li class="list-group-item">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="webdev" name = "addedCourses[]" id="check4">
                                <label class="custom-control-label" for="check4">webdev</label>
                              </div>
                            </li>
                            <li class="list-group-item">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" value="sample course" name = "addedCourses[]" id="check5">
                                <label class="custom-control-label" for="check5">sample course</label>
                              </div>
                            </li>
                          </ul>
                        </div>

                        <button class="btn d-flex justify-content-center m-3 Button"
                            style="background-color: #09A599; font-size: large; color: white; border-radius: 20px; padding-left: 70px; padding-right: 70px;"
                            type = "submit" name = "send_request">
                            <b>SEND REQUEST</b>
                        </button>
                    </form>

                </div>

          </div>

        </div>
      </div>
    </div>
  </div>

  <script src="myscripts.js"></script>

</body>

</html>