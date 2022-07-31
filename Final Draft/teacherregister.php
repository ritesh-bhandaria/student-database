<?php
require('config.php');
$username_err = $password_err = $confirm_password_err = "";
$username = $password = $output_err =  $confirm_password = "";

if (isset($_POST['submit'])) {
    $username = stripslashes($_REQUEST['username']);
    $username = mysqli_real_escape_string($con, $username);
    $fname = stripslashes($_REQUEST['fname']);
    $fname = mysqli_real_escape_string($con, $fname);
    $email    = stripslashes($_REQUEST['email']);
    $email    = mysqli_real_escape_string($con, $email);
    $department    = stripslashes($_REQUEST['department']);
    $department    = mysqli_real_escape_string($con, $department);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $cpassword = stripslashes($_REQUEST['confirm_password']);
    $cpassword = mysqli_real_escape_string($con, $cpassword);


    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))) {
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM teachers WHERE id = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                /* store result */
                mysqli_stmt_store_result($stmt);

                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have atleast 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }
    // Validate confirm password
    if (empty(trim($_POST["confirm_password"]))) {
        $confirm_password_err = "Please confirm password.";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password did not match.";
        }
    }
    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {

        $search_query =  "SELECT * FROM `teachers` WHERE `id` LIKE '$username'";
        $search_result = mysqli_query($con, $search_query);
        $rows = mysqli_num_rows($search_result);

        if ($rows !== 1) {

            // $query = "INSERT into `students` (username, fname, email, password) VALUES ('$username', '$fname', '$email', '" . md5($password) . "')";
            // $query = "INSERT INTO `students` (`rollNo`, `fname`, `email`, `password`) VALUES ('$username', '$fname', '$email', '$password')";
            $query = "INSERT INTO `teachers` (`id`, `name`, `department`, `email`, `password`) VALUES ('$username', '$fname', '$department', '$email', '$password')";
            $result = mysqli_query($con, $query);
            if ($result) {
                $output_err =  "Registered successfully";
            }
        } else {
            $username_err = "This username is already taken.";
        }
    }
}
?>

<?php
require('header.php')
?>
<h3 id='sign'>
    Register as Teacher
    <a></a>
</h3>

</div>
<!-- teacher page  -->
<div id='div3' class="card-body">

    <form method="POST" action="">
        <!-- frist name -->
        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="fname" class="form-control" placeholder="name">
            <!-- second name -->
        </div>

        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-id-card"></i></span>
            </div>
            <!-- <input type="text" name="username" class="form-control" placeholder="Teacher ID"> -->
            <input type="text" name="username"
                class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                value="<?php echo $username; ?>" placeholder="Teacher's id">
            <span class="invalid-feedback"><?php echo $username_err; ?></span>
            <!-- email  -->
        </div>
        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-dot-circle"></i></span>
            </div>
            <input type="text" name="department" class="form-control" placeholder="Department">
            <!-- password  -->
        </div>
        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" name="email" class="form-control" placeholder="Email">
            <!-- password  -->
        </div>
        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <!-- <input type="password" name="password" class="form-control" placeholder="password"> -->
            <input type="password" name="password"
                class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                value="<?php echo $password; ?>" placeholder="Password">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
        </div>
        <!-- confirm passwoerd  -->
        <div class="input-group form-group">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
            </div>
            <!-- <input type="password" name="tcpassword" class="form-control" placeholder="confirm password"> -->
            <input type="password" name="confirm_password"
                class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                value="<?php echo $confirm_password; ?>" placeholder="confirm  Password">
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>

        </div>

        <!-- <div class="form-group">
            <input type="submit" name="tsubmit" value="Register" class="btn float-right login_btn">
            <a href="" onclick="signIN()">Sign IN</a>
        </div> -->
        <div class="form-group">
            <input type="submit" name="submit" class="btn float-right login_btn" value="Register">
            <span class="valid-feedback "><?php echo $output_err; ?></span>
            <input type="reset" class="btn btn-info ml-2" value="Reset">
        </div>
    </form>
</div>
<div class="card-footer">
    <div class="d-flex justify-content-center links">
        Don't have an account?<a href="#">Sign Up </a> as
    </div>
    <div class="pb-4 pt-2 text-center">

        <a href="studentregister.php"> <button type="button" name='registerstudent'
                class="btn btn-outline-primary ">Student</button> </a>
    </div>

    <div class="d-flex justify-content-center links">
        Already have an account , Login as
    </div>
    <div class="pb-4 pt-2 text-center">
        <a href="teacherlogin.php"> <button name='registerteacher' class="btn btn-outline-primary ">Teacher</button>
        </a>
        <a href="index.php"> <button name='registerteacher' class="btn btn-outline-primary ">Student</button> </a>

    </div>
    <?php
    require('footer.php')
    ?>