<?php

session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
  echo "<h1>Welcome : </h1>";
  echo $username;
  echo $password;

?>

