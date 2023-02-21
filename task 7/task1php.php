<?php
  class person{
        // created global variables
        public $fname,$lname,$fullname,$file_name,$file_tmp_name;
        // created a constructor
        function __construct($first,$last,$file_name,$file_tmp_name){
            $this->fname = $first;
            $this->lname = $last;
            $this->fullname = $this->fname .' '. $this->lname;
            $this->file_name = $file_name;
            $this->file_tmp_name = $file_tmp_name;
        }
        //created a function for first and last name that will check whether name is alphabetical or not.
        function greet(){
            // checking input is in alphabetical pattern or not
            if (ctype_alpha($this->fname) && ctype_alpha($this->lname)) {
              echo "Hello " . $this->fullname . "<br>";
            }
            else {
              echo "Error: First name and last name must contain only alphabetical characters.";
            }
        }
  }
//taking values from form.
if(isset($_POST['firstName']) && isset($_POST['lastName'])){
  $fname = $_POST['firstName'];
  $lname = $_POST['lastName'];
  $file_name=$_FILES['photo']['name'];
  $file_tmp_name=$_FILES['photo']['tmp_name'];
  //creating a new object
  $person1 = new person($fname,$lname,$file_name,$file_tmp_name);
  //using greet function form person class to check and display first name and last name.
  $person1->greet();  
}

?>