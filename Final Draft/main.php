<?php
include 'dbconnect.php';
$res = $success = $error = '';
if (isset($_POST['ssubmit'])) {
    $rollno = $_POST['srollno'];
    $name = $_POST['sfname'];
    $email = $_POST['semail'];
    $password = $_POST['spassword'];
    $sql = "INSERT INTO (student 'rollno' ,'name', 'email','password') VALUES ('$rollno' , '$name' , '$email' ,'$password')";
    $run = mysqli_query($conn, $sql);
    if ($run) {
        $success = "Rigester Sucessfully";
    } else {
        $error = "Unable to submit data. Please try again.....";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>

    <!-- Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <div class="container">
        <center><img src="./images/iiitdmj__logo.png" alt="institute logo" class="text-center mt-5 "></center>
        <h1 class="text-center text-success mt-5 mb-5">PG Student Managment</h1>
        <div class="d-flex justify-content-center h-50">
            <div class="card">
                <div class="card-header">
                    <h3 id='sign'>
                        Sign In
                        <a></a>
                    </h3>

                </div>
                <!-- sign up page  -->
                <div id='div1' class="card-body" style="display: block;">

                    <form method="POST" action="">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control" placeholder="Email">

                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                        <div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Login" class="btn float-right login_btn">
                        </div>
                    </form>
                </div>
                <!-- student page  -->
                <div id='div2' class="card-body" style="display: none;">

                    <form method="POST" action="">
                        <!-- frist name -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="sfname" class="form-control" placeholder="First name">
                            <!-- second name -->
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            </div>
                            <input type="text" name="srollno" class="form-control" placeholder="Roll No.">
                            <!-- email  -->
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" name="semail" class="form-control" placeholder="Email">
                            <!-- password  -->
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="spassword" class="form-control" placeholder="password">
                        </div>
                        <!-- confirm passwoerd  -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="scpassword" class="form-control" placeholder="confirm password">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="ssubmit" value="Register" class="btn float-right login_btn">
                            <a href="" onclick="signIN()">Sign IN</a>
                        </div>
                        <?php echo $success;
                        echo $error;
                        // echo $semail_err;
                        // echo $spws_err ;
                        ?>
                    </form>
                </div>
                <!-- teacher page  -->
                <div id='div3' class="card-body" style="display: none;">

                    <form method="POST" action="">
                        <!-- frist name -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="tfname" class="form-control" placeholder="First name">
                            <!-- second name -->
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            </div>
                            <input type="text" name="tid" class="form-control" placeholder="Teacher ID">
                            <!-- email  -->
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-dot-circle"></i></span>
                            </div>
                            <input type="email" name="tdepartment" class="form-control" placeholder="Department">
                            <!-- password  -->
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" name="temail" class="form-control" placeholder="Email">
                            <!-- password  -->
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="tpassword" class="form-control" placeholder="password">
                        </div>
                        <!-- confirm passwoerd  -->
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="tcpassword" class="form-control" placeholder="confirm password">
                        </div>

                        <div class="form-group">
                            <input type="submit" name="tsubmit" value="Register" class="btn float-right login_btn">
                            <a href="" onclick="signIN()">Sign IN</a>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center links">
                        Don't have an account?<a href="#">Sign Up </a> as
                    </div>
                    <div class="pb-4 pt-2 text-center">
                        <button type="button" name='registerteacher' class="btn btn-outline-primary " onclick="teacherLoginPage()">Teacher</button>
                        <button type="button" name='registerstudent' class="btn btn-outline-primary " onclick="studentLoginPage()">Student</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="#">Forgot your password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <SCRIPT src="./index.js"></SCRIPT>
</body>

</html>