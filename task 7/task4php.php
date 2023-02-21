<?php
  class person{
        // created global variables
        public $fname,$lname,$fullname,$file_name,$file_tmp_name,$subjects,$subject,$sub,$phone;
        // created a constructor
        function __construct($first,$last,$file_name,$file_tmp_name,$subjectMarks,$phone){
            $this->fname = $first;
            $this->lname = $last;
            $this->fullname = $this->fname .' '. $this->lname;
            $this->file_name = $file_name;
            $this->file_tmp_name = $file_tmp_name;
            $this->subjects = $subjectMarks;
            $this->phone=$phone;
        }
        //created a function for first and last name that will check whether name is alphabetical or not.
        function greet(){
            // checking input is in alphabetical pattern or not
            if (ctype_alpha($this->fname) && ctype_alpha($this->fname)) {
              echo "Hello " . $this->fullname . "<br>";
            }
            else {
              echo "Error: First name and last name must contain only alphabetical characters.";
            }
        }
        // created a function for storing image and displaying it.
        function image(){
          if (isset($_FILES["photo"])) {
            //storing image in images folder
            move_uploaded_file($this->file_tmp_name, "images/".$this->file_name);
            // displaying image from the images folder
            echo "<img src='./images/$this->file_name'>";
          }

        }
        // created a function for accepting subjects and marks of different subjects.
        function textarea(){
            // creating a array that will split the text by checking nect line
            $this->subjects = explode("\n",$this->subjects);
            if(isset($this->subjects)) {
            echo "<table border='1'>";
            echo "<tr><th>Subject</th><th>Marks</th></tr>";
            // now for each element in subjects array we are splitting element by "|" and displaying it
            foreach($this->subjects as $this->subject) {
                $this->sub = explode("|", $this->subject);
                echo "<tr><td>" . $this->sub[0] . "</td><td>" . $this->sub[1] . "</td></tr>";
            }
            echo "</table>";
            }
        }
        // created a function to accept the phone number from the user and checking whether its in correct format or not.
        function validating_phone() {
          // checking the pattern of phone number with pregamatch with prefix of "+91" and printing it.
          if (preg_match("/^\+91[1-9]\d{9}$/", $this->phone)) {
              echo "Phone Number: " . $this->phone;
          } else {
              echo "Invalid Phone Number";
          }
      }
      
}
//taking values from form.
if(isset($_POST['firstName']) && isset($_POST['lastName'])){
  $fname = $_POST['firstName'];
  $lname = $_POST['lastName'];
  $file_name=$_FILES['photo']['name'];
  $file_tmp_name=$_FILES['photo']['tmp_name'];
  $subjectMarks=$_POST['subjectMarks'];
  $phone=$_POST['phone'];
  //creating a new object
  $person1 = new person($fname,$lname,$file_name,$file_tmp_name,$subjectMarks,$phone);
  //using greet function form person class to check and display first name and last name.
  $person1->greet();
  //checking whether photo is uploaded or not. if uploaded then using image function to displaying it.
  if(isset($_FILES["photo"])){
      $person1->image();
  }
  else{
      $file_name=null;
      $file_tmp_name=null;
  }
  // using text area function for displaying subject and marks of different subjects.
  $person1->textarea();
  // using validating_phone function for displaying phone number is valid or not.
  $person1->validating_phone();
  
}

?>