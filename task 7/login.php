<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Check if the username and password are valid
  if ($username === 'admin' && $password === 'password') {
    // Valid credentials, create a session and store the username
    $_SESSION['username'] = $username;

    // Redirect to the pager page
    header('Location: links.php');
    exit;
  } else {
    header("Location:./index.php?message=Invalid Username and Password");
  }
}
?>
