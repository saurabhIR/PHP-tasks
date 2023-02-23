<?php
  /**
   * Defines a class to represent the form.
   */
  class person{

      /** @var string $fname The student's first name. */
      public $fname;

      /** @var string $lname The student's last name. */
      public $lname;
  
      /** @var string $fullname The student's full name. */
      public $fullname;
  
      /** @var string $img The name of the student's image. */
      public $file_name;
  
      /** @var string $img_temp The temporary path of the student's image. */
      public $file_tmp_name;
  
      /** @var string $marks The student's marks. */
      public $subjects;
      /** @var array $marks The student's marks. */
      public $subject;
      /** @var array $marks The student's marks. */
      public $sub;

      /**
     * Constructor to initalize the form object
     *
     * @param string $fname
     * @param string $lname
     * @param string $file_name
     * @param string $file_tmp_name
     * @param string $subjectMarks
     * @return void
      */
    function __construct($first,$last,$file_name,$file_tmp_name,$subjectMarks){
        $this->fname = $first;
        $this->lname = $last;
        $this->fullname = $this->fname .' '. $this->lname;
        $this->file_name = $file_name;
        $this->file_tmp_name = $file_tmp_name;
        $this->subjects = $subjectMarks;
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
    /**
    * Displays a table of the student's marks.
    * @return void
    */
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
}
//taking values from form.
if(isset($_POST['firstName']) && isset($_POST['lastName'])){
  $fname = $_POST['firstName'];
  $lname = $_POST['lastName'];
  $file_name=$_FILES['photo']['name'];
  $file_tmp_name=$_FILES['photo']['tmp_name'];
  $subjectMarks=$_POST['subjectMarks'];
  //creating a new object
  $person1 = new person($fname,$lname,$file_name,$file_tmp_name,$subjectMarks);
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
}

?>