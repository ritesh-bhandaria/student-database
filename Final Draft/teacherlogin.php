<?php
require('config.php');
session_start();

$username = $password = "";
$username_err = $password_err = $login_err = "";
// When form submitted, check and create user session.
if (isset($_POST['username'])) {
    $username = stripslashes($_REQUEST['username']);    // removes backslashes
    $username = mysqli_real_escape_string($con, $username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    // Check user is exist in the database
    $query    = "SELECT * FROM `teachers` WHERE id='$username' AND password='$password'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION['username'] = $username;
        // Redirect to user dashboard page



        $_SESSION['username']  = htmlentities($_POST['username']);
        $_SESSION['password']  = htmlentities($_POST['password']);

        header("Location: teacherdatabase.php");//change here
    } else {
        $username_err = "invaild RollNo";
        $password_err = "invalid Password";
    }
}
?>

<?php
require('header.php')
?>
<h3 id='sign'>
    Sign In as Teacher
    <a></a>
</h3>

</div>
<!-- sign up page for Teacher   -->
<div id='div1' class="card-body" style="display: block;">

    <form method="POST" action="">
        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <!-- <input type="text" name="email" class="form-control" placeholder="Email"> -->
            <input type="text" name="username"
                class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                value="<?php echo $username; ?>" placeholder="Teacher ID">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>

        </div>
        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <!-- <input type="password" name="password" class="form-control" placeholder="password"> -->
            <input type="password" name="password"
                class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" placeholder="Password">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
        <div class="row align-items-center remember">
            <input type="checkbox">Remember Me
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Login" class="btn float-right login_btn">
        </div>
    </form>
</div>

<!-- footer -->
<div class="card-footer">
    <div class="d-flex justify-content-center links">
        Login As student or teacher
    </div>

    <div class="pb-4 pt-2 text-center">
        <a href="index.php">
            <button type="button" name='registerstudent' class="btn btn-outline-primary ">Student</button>
        </a>
    </div>

    <div class="d-flex justify-content-center links">
        Register AS
    </div>
    <div class="pb-4 pt-2 text-center">
        <a href="teacherregister.php">
            <button name='registerstudent' class="btn btn-outline-primary ">Teacher</button>
        </a>
        <a href="studentregister.php">
            <button name='registerstudent' class="btn btn-outline-primary ">Student</button>
        </a>
    </div>


    <?php
    require('footer.php')
    ?>