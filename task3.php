<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Task 3</title>
</head>
  <body>
    <form action="task3.php" method="post" enctype="multipart/form-data">
      First Name: <input type="text" id="firstName" name="firstName" oninput="updateFullName()"><br><br>
      Last Name: <input type="text" id="lastName" name="lastName" oninput="updateFullName()"><br><br>
      Full Name: <input type="text" id="fullName" name="fullName" disabled 
            readonly value="<?php $firstName = $_POST["firstName"]; 
            $lastName = $_POST["lastName"]; 
            $fullName = $firstName . " " . $lastName;echo "$fullName"; ?>"><br><br>
      Image: <input type="file" name="photo"><br><br>
      <label for="subjectMarks">Subject Marks:</label>
			<textarea name="subjectMarks" required></textarea>
			<p>Enter subject marks in the format 'Subject|Marks' in each line</p>
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
          $subjects = explode("\n",$_POST['subjectMarks']);
          if(isset($subjects)) {
            echo "<table border='1'>";
            echo "<tr><th>Subject</th><th>Marks</th></tr>";
            foreach($subjects as $subject) {
                $sub = explode("|", $subject);
                echo "<tr><td>" . $sub[0] . "</td><td>" . $sub[1] . "</td></tr>";
            }
            echo "</table>";

        } else {
          echo "Error: First name and last name must contain only alphabetical characters.";
        }
      }
      if (isset($_POST["firstName"]) && !isset($_POST["lastName"]) || !isset($_POST["firstName"]) && isset($_POST["lastName"])) {
        echo "Error: Please enter both first name and last name.";
      }

    }
    ?>
  </body>
</html>
