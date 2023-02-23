<?php
  class person{
    // created global variables
    public $fname,$lname,$fullname,$file_name,$file_tmp_name,$subjects,$subject,$sub,$phone,$email;
      /**
     * Constructor to initalize the form object
     *
     * @param string $fname
     * @param string $lname
     * @param string $file_name
     * @param string $file_tmp_name
     * @param int    $phone
     * @param string $email
     * @return void
      */
    function __construct($first,$last,$file_name,$file_tmp_name,$subjectMarks,$phone,$email){
        $this->fname = $first;
        $this->lname = $last;
        $this->fullname = $this->fname .' '. $this->lname;
        $this->file_name = $file_name;
        $this->file_tmp_name = $file_tmp_name;
        $this->subjects = $subjectMarks;
        $this->phone=$phone;
        $this->email=$email;
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
        $subjectandmarks= explode("\n",$this->subjects);
        if(isset($subjectandmarks)) {
        echo "<table border='1'>";
        echo "<tr><th>Subject</th><th>Marks</th></tr>";
        // now for each element in subjects array we are splitting element by "|" and displaying it
        foreach($subjectandmarks as $this->subject) {
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
          echo "<br>";
      } else {
          echo "Invalid Phone Number";
          echo "<br>";
      }
    }
    // function for validating email
    function emailvalidation(){
    // taken the email api live server code
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=$this->email",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: text/plain",
        //set api access key from apilayer.com
        "apikey: KJhRQ0m5m2VlQyRejLMKSrWetINNqQw4"
      ),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET"
    ));
    // Receive the data:
    $response = curl_exec($curl);
    curl_close($curl);

    // Decode JSON response:
    $validationResult = json_decode($response, true);
    if ($validationResult['format_valid'] && $validationResult['smtp_check']) {
        echo "Email is valid: ".$this->email;
    } else {
        echo "Email is not valid: ".$this->email;
    }
  }
    /**
   * Generates and downloads a file with given user information and marks.
   *
   * @return void
   */
  function download_form(){
        $server_file = "./uploads/$this->fullname.txt";
        $server_content = "Response\n";
        $server_content .= "Name : " . $this->fullname . "\n";
        $server_content .= "Email : " . $this->email . "\n";
        $server_content .= "Phone : " . $this->phone . "\n";
        $server_content .= "Subject  Marks" . "\n";
        foreach ($this->subjects as $key => $value) {
            // outputs table row as subject => marks
            $server_content .= "$key  $value" . "\n";
        }
        file_put_contents($server_file, $server_content);
        
        if (file_exists($server_file)) {
            // Set the headers to trigger a download
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . basename($server_file) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($server_file));
            // Output the file content
            readfile($server_file);
        } else {
            echo "Not Found.";
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
  $email=$_POST['email'];
  //creating a new object
  $person1 = new person($fname,$lname,$file_name,$file_tmp_name,$subjectMarks,$phone,$email);
  //using greet function form person class to check and display first name and last name.
  $person1->greet();
  //checking whether photo is uploaded or not. if uploaded then using image function to displaying it.
  if(isset($_FILES["photo"])){
      $person1->image();
  }
  else{
      $person1->image();
      $file_name=null;
      $file_tmp_name=null;
  }
  // using text area function for displaying subject and marks of different subjects.
  $person1->textarea();
  // using validating_phone function for displaying phone number is valid or not.
  $person1->validating_phone();
  // using emailvalidating function for validate the email.
  $person1->emailvalidation();
  //calling function to download form and saving in server too.
  if(($_SERVER["REQUEST_METHOD"] == "POST")){
    $person1->download_form();
    }
}

?>
