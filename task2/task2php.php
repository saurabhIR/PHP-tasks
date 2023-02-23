<?php
  /**
   * Defines a class to represent the form.
   */
  class person{

      /**
       * The student's first name.
       *
       * @var string
       */
      public $fname;

      /**
       * The student's last name.
       *
       * @var string
       */
      public $lname;

      /**
       * The student's full name.
       *
       * @var string
       */
      public $fullname;
      /**
       * The name of the student's image file.
       *
       * @var string
       */
      public $file_name;

      /**
       * The temporary location of the student's image file.
       *
       * @var string
       */
      public $file_tmp_name;
      
        /**
       * Constructor to initalize the form object
       *
       * @param string $fname
       * @param string $lname
       * @param string $file_name
       * @param string $file_tmp_name
       * 
       * @return void
        */
      function __construct($first,$last,$file_name,$file_tmp_name){
          $this->fname = $first;
          $this->lname = $last;
          $this->fullname = $this->fname .' '. $this->lname;
          $this->file_name = $file_name;
          $this->file_tmp_name = $file_tmp_name;
      }
      /**
      * Outputs a message containing the full name of the student, or an error message if the first or last name is invalid.
      */
      function greet(){
        // checking input is in alphabetical pattern or not
        if (ctype_alpha($this->fname) && ctype_alpha($this->lname)) {
          echo "Hello " . $this->fullname . "<br>";
        }
        else {
          echo "Error: First name and last name must contain only alphabetical characters.";
        }
    }
    /**
     * Outputs a message related to the student's image file and moves the file to a specified directory.
     *
     * @return void
     */
    function image(){
      if (isset($_FILES["photo"])) {
        //storing image in images folder
        move_uploaded_file($this->file_tmp_name, "images/".$this->file_name);
        // displaying image from the images folder
        echo "<img src='./images/$this->file_name'>";
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
  //checking whether photo is uploaded or not. if uploaded then using image function to displaying it.
  if(isset($_FILES["photo"])){
      $person1->image();
  }
  else{
      $file_name=null;
      $file_tmp_name=null;
  }
}

?>
