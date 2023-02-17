<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Task 3</title>
    <!-- linking external files(css and js file) -->
  <script src="./task1js.js"></script>
  <link rel="stylesheet" href="./style.css">

</head>
  <body>
  <!-- creating a form to take information -->
  <form method="post" enctype="multipart/form-data">
      <label for="firstName">First name:</label><br>
      <input type="text" id="firstName" name="firstName" oninput="updateFullName()" required><br>
      <label for="lastName">Last name:</label><br>
      <input type="text" id="lastName" name="lastName" oninput="updateFullName()" required><br>
      <label for="fullName">Full name:</label><br>
      <input type="text" id="fullName" name="fullName" disabled><br>
      <label for="file">Image:</label><br>
      <input type="file" name="photo"><br>
      <label for="subjectMarks">Subject Marks:</label>
			<textarea name="subjectMarks" required></textarea>
			<p>Enter subject marks in the format 'Subject|Marks' in each line</p>
      <input type="submit" value="Submit">
    </form>
    <!-- linking php file to show action of the form -->
    <div class="php">
      <?php include './task3php.php'; ?>
    </div>
  </body>
</html>
