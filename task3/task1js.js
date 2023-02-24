// function for displaying full name in disabled input with js.
function updateFullName() {
  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastName").value;
  document.getElementById("fullName").value = firstName + " " + lastName;
}
