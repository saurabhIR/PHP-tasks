<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Task 1</title>
</head>
<html>
  <body>
    <form action="index.php" method="post">
      First Name: <input type="text" name="firstName" pattern="[A-Za-z]{1,}"><br>
      Last Name: <input type="text" name="lastName" pattern="[A-Za-z]{1,}"><br>
      Full Name: <input type="text" name="fullname" 
      readonly value="<?php $firstName = $_POST["firstName"]; $lastName = $_POST["lastName"]; $fullName = $firstName . " " . $lastName;echo "$fullName"; ?>"><br>
      
      <input type="submit" value="Submit">
    </form>
    <?php
      if ($_POST["firstName"]!="" && $_POST["lastName"]!="") {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        if (($firstName) && ($lastName)) {
          $fullName = $firstName . " " . $lastName;
          echo "Hello " . $fullName;
        } else {
          echo "Error: First name and last name must contain only alphabetical characters.";
        }
      }
      if ($_POST["firstName"]!="" && $_POST["lastName"]=="" || $_POST["firstName"]=="" && $_POST["lastName"]!="") {
        echo "Error: Please enter both first name and last name.";
      }
    ?>
  </body>
</html>
