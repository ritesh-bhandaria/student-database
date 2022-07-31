<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>teachers</title>
    </head>
    <body>
    <?php
    session_start();
    $universalname;
    $username = $_SESSION['username'];
    $password = $_SESSION['password'];
    $link = mysqli_connect('localhost', 'root', '', 'pgdb');
    if(!$link){
        die('connection failed: ');
}
//$query='SELECT * FROM teachers WHERE id="456"';#needs work from login page
$query="SELECT * FROM teachers WHERE id='$username'";#needs work from login page
$result=mysqli_query($link, $query);
while($row=mysqli_fetch_array($result))
{
  $universalname=$row['name'];
  //echo $universalname;
    echo"
    <!-- As a heading -->
  <nav class='navbar navbar-dark bg-primary'>
    <div class='container-fluid'>
      <span class='navbar-brand mb-0 h1'>Department: $row[department]</span>
      <span class='navbar-brand mb-0 h1'>Welcome $row[name]</span>
    </div>
  </nav>";#requires info from login page



  echo'<div id="clock" style="float:right; padding: 10px 30px 0px 0px;"></div>';//new addition of a clock
  echo"
<!--sidebar-->
<nav class='navbar navbar-light'>
  <div class='container-fluid'>
    <button class='navbar-toggler' type='button' data-bs-toggle='offcanvas' data-bs-target='#offcanvasNavbar' aria-controls='offcanvasNavbar'>
      <div class='navbar-toggler-icon'></div>
    </button>
    <div class='offcanvas offcanvas-start' tabindex='-1' id='offcanvasNavbar' aria-labelledby='offcanvasNavbarLabel'>
      <div class='offcanvas-header'>
        <h5 class='offcanvas-title' id='offcanvasNavbarLabel'>Profile</h5>
        <button type='button' class='btn-close text-reset' data-bs-dismiss='offcanvas' aria-label='Close'></button>
      </div>
      <div class='offcanvas-body'>
        <ul class='navbar-nav justify-content-end flex-grow-1 pe-3'>
          <li class='nav-item'>

          <p>Name: $row[name]</p>

          <p>Department: $row[department] </p>
          <p>Email: $row[email]</p>

          </li>
          <li class='nav-item'>
          <div class='nav justify-content-center'>
          <a href='logout.php'><button type='button' class='btn btn-outline-primary'>Logout</button></a>
          </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<!--nav
  <ul class='nav justify-content-end'>
    <div class='btn-group' role='group' aria-label='Basic outlined example'>


      </div>
  </ul>-->";
}
//the announcement par starts from here
//marked for rakshit
echo"
<div style='width: 38%;float: right;'>
<h3>Announce Something</h3>
<br>
<form action='announce.php' method='post'>
<div class='input-group mb-3'>
  <select class='form-select' id='inputGroupSelect02' name='course'>
    <option selected>Choose...</option>";
//$query4='SELECT * FROM courses WHERE course_instructor="abc"';#needs work from login page
$query4="SELECT * FROM courses WHERE course_instructor='$universalname'";#needs work from login page
$result4=mysqli_query($link, $query4);
while($row4=mysqli_fetch_array($result4))
echo"
    <option value='$row4[course_name]'>$row4[course_name]</option>
";
echo"
</select>
<label class='input-group-text' for='inputGroupSelect02'>Options</label>
</div>
<div class='mb-3'>
<label for='exampleFormControlTextarea1' class='form-label'>Example textarea</label>
<textarea class='form-control' id='exampleFormControlTextarea1' rows='3' name='announcement'></textarea>
</div>
<button type='submit' class='btn btn-secondary'>announce</button>
</form>
";
echo'
<br>
<h3>history</h3>
<div style="overflow-y: auto; height: 300px;">
<br>
';
$query5='SELECT * FROM announcement ORDER BY date DESC';
$result5=mysqli_query($link, $query5);
while($row5=mysqli_fetch_array($result5))
echo"
<div style='margin: 1px; background-color:#ebebeb;'>
<h6 style='float: left;'>$row5[course]</h6><h6 style='float: right;'>$row5[date]</h6>
<br>
<p>$row5[announcement]</p>
</div>
";
echo'
</div>';
echo"</div>";
//the announcement part ends here
//mark for rakshit
//rest of the thing is in announce.php

//$query2='SELECT * FROM courses WHERE course_instructor="abc"';#needs work from login page
$query2="SELECT * FROM courses WHERE course_instructor='$universalname'";#needs work from login page
$result2=mysqli_query($link, $query2);

    echo"<div style='width: 60%;float: left;'>
    <h3>Your courses will appear here</h3>
    <br>";
    while($row2=mysqli_fetch_array($result2))
    {
    echo"
    <div class='accordion' id='accordionExample'>
        <div class='accordion-item'>
          <h2 class='accordion-header' id='headingOne'>
            <button class='accordion-button' type='button' data-bs-toggle='collapse' data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
            $row2[course_name]
            </button>
          </h2>
          <div id='collapseOne' class='accordion-collapse collapse' aria-labelledby='headingOne' data-bs-parent='#accordionExample'>
            <div class='accordion-body'>
              <strong>$row2[credits] credit points<br> <small>Created on: $row2[date]</small><br></strong><nav aria-label='breadcrumb'>
                  <br>
                  <div class='container'>
                    <div class='row'>
                      <div class='col'>
                        <a href='$row2[syllabus]'>syllabus</a>
                      </div>
                      <div class='col'>
                        <a href='$row2[marksheets]'>marksheet</a>
                      </div>
                      <div class='col'>
                        <a href='$row2[lecture_link]'>class link</a>
                      </div>
                      <div class='col'>
                        <a href='$row2[lecture_folder]'>lectures link</a>
                      </div>
                      <div class='col'>
                        <a href='$row2[additionals]'>additional material</a>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class='btn-group' role='group' aria-label='Basic outlined example'>
              <button type='button' class='btn btn-outline-primary btn-sm' data-bs-toggle='modal' data-bs-target='#exampleModal'>Modify this course</button>
              <br>
              <form action='deletecourse.php' method='POST'>
<button type='submit' class='btn btn-outline-primary btn-sm' value='$row2[course_name]' name='todelete' onclick='show_delete_alert()'>Delete this course</button>
</form>
<a href='#'><button type='button' class='btn btn-outline-primary btn-sm'>see joining history</button></a>
<br>
                                      </div>
            </div>
          </div>
        </div>";
        //echo"</div>";
}
echo"
      <br>
      <div class='nav justify-content-center'>
        <div class='btn-group' role='group' aria-label='Basic example'>
            <button type='button' class='btn btn-default' data-bs-toggle='modal' data-bs-target='#newcourse'><img src='plus.png' alt='add a new course' style='length: 50px; width: 50px;'></button>
          </div>
      </div>
      <br>
      ";

echo'
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modify the course</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="updatecourse.php" method="POST">
        <div class="modal-body">
          <p>enter the course you need to update</p>
        <br>
        <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default" >course name</span>
        <input type="text" name="course_name" required class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default" >credits</span>
        <input type="text" name="credits" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default" >Syllabus</span>
        <input type="text" name="syllabus" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default" >class link</span>
        <input type="text" name="lecture_link" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default" >lecture folder</span>
        <input type="text" name="lecture_folder" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default" >marksheet(google sheet link)</span>
        <input type="text" name="marksheets" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default"  >additional reference material</span>
        <input type="text" name="additionals" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" onclick="show_update_alert()" name="toupdate">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>';
echo'
<div class="modal fade" id="newcourse" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">add a course</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="newcourse.php" method="POST">
        <div class="modal-body">
          <p>Enter the details</p>
        <br>
        <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default" >course name</span>
        <input type="text" name="course_name" required class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default" >credits</span>
        <input type="text" name="credits" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default" >Syllabus</span>
        <input type="text" name="syllabus" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default" >class link</span>
        <input type="text" name="lecture_link" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default" >lecture folder</span>
        <input type="text" name="lecture_folder" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default" >marksheet(google sheet link)</span>
        <input type="text" name="marksheets" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
    <div class="input-group mb-3">
        <span class="input-group-text" id="inputGroup-sizing-default"  >additional reference material</span>
        <input type="text" name="additionals" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
      </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary" onclick="var check=1; show_update_alert();" name="tocreate">create</button>
        </div>
      </form>
    </div>
  </div>
</div>';

echo'
';
/**echo'
<div class="modal fade" id="join" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Joining history</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="updatecourse.php" method="POST">
        <div class="modal-body">
          <p>enter the subject</p>
        <br>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </form>
    </div>
  </div>
</div>';**/




?>


        <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
-->
<script>
    function show_delete_alert(){

        //alert('this course will get deleted');
        //var delalert=document.getElementById("delete");
        //delalert.style.display="block";
        window.location.reload();
      }
</script>
<script>
      function show_update_alert(){
        //alert('this course will get deleted');
        //var delalert=document.getElementById("delete");
        //delalert.style.display="block";
        window.location.reload();
    }
    </script>
    <script>
      let clock = () => {
  let date = new Date();
  let hrs = date.getHours();
  let mins = date.getMinutes();
  let secs = date.getSeconds();
  let period = "AM";
  if (hrs == 0) {
    hrs = 12;
  } else if (hrs >= 12) {
    hrs = hrs - 12;
    period = "PM";
  }
  hrs = hrs < 10 ? "0" + hrs : hrs;
  mins = mins < 10 ? "0" + mins : mins;
  secs = secs < 10 ? "0" + secs : secs;

  let time = `${hrs}:${mins}:${secs}:${period}`;
  document.getElementById("clock").innerText = time;
  setTimeout(clock, 1000);
};

clock();
    </script>
    </body>
</html>
