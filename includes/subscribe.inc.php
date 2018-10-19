<?php 
  include_once 'dbh.inc.php';

  $email = $_POST['email'];

  $sql = "INSERT INTO users (email) VALUES ('$email');";

  if (mysqli_query($conn, $sql)) {
    header("Location: ../subscribed.php");
  } else {
    header("Location: ../error.php");
  }
				