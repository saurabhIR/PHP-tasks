<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Task 2</title>
</head>
  <body>
    <form action="task2.php" method="post" enctype="multipart/form-data">
      First Name: <input type="text" id="firstName" name="firstName" oninput="updateFullName()"><br><br>
      Last Name: <input type="text" id="lastName" name="lastName" oninput="updateFullName()"><br><br>
      Full Name: <input type="text" id="fullName" name="fullName" disabled 
            readonly value="<?php $firstName = $_POST["firstName"]; 
            $lastName = $_POST["lastName"]; 
            $fullName = $firstName . " " . $lastName;echo "$fullName"; ?>"><br><br>
      Image: <input type="file" name="photo"><br>
      <input type="submit" value="Submit">
    </form>
    <?php
      if (isset($_POST["firstName"]) && isset($_POST["lastName"])) {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        if (ctype_alpha($firstName) && ctype_alpha($lastName)) {
          $fullName = $firstName . " " . $lastName;
          echo "Hello " . $fullName . "<br>";

          if (isset($_FILES["photo"])) {
            $photo=$_FILES["photo"];
            $file_name     = $_FILES["photo"]["name"];
            $file_type     = $_FILES["photo"]["type"];
            $file_size     = $_FILES["photo"]["size"];
            $file_tmp_name = $_FILES["photo"]["tmp_name"];
        
            move_uploaded_file($file_tmp_name, "images/".$file_name);
            echo "<img src='./images/$file_name'>";
          }
        } else {
          echo "Error: First name and last name must contain only alphabetical characters.";
        }
      }
      if (isset($_POST["firstName"]) && !isset($_POST["lastName"]) || !isset($_POST["firstName"]) && isset($_POST["lastName"])) {
        echo "Error: Please enter both first name and last name.";
      }
    ?>
  </body>
</html>
