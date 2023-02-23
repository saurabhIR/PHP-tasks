<?php
    /**
   * Defines a class to represent the form.
   */
  class person{
    
    /**
     * @var string $fname The first name of the student.
     */
    public $fname;

    /**
     * @var string $lname The last name of the student.
     */
    public $lname;

    /**
     * @var string $fullname The full name of the student, consisting of the first and last names.
     */
    public $fullname;
    /**
		 * Constructor to initalize the form object
		 *
		 * @param string $fname
		 * @param string $lname
		 * 
		 * @return void
		 */
    function __construct($first,$last){
        $this->fname = $first;
        $this->lname = $last;
        $this->fullname = $this->fname .' '. $this->lname;
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
  }
//taking values from form.
if(isset($_POST['firstName']) && isset($_POST['lastName'])){
  $fname = $_POST['firstName'];
  $lname = $_POST['lastName'];
  //creating a new object
  $person1 = new person($fname,$lname);
  //using greet function form person class to check and display first name and last name.
  $person1->greet();  
}

?>