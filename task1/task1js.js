/**
 * Updates a full name field with the combined values of a first and last name field.
 * 
 * @returns {void}
 */
function updateFullName() {
  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastName").value;
  document.getElementById("fullName").value = firstName + " " + lastName;
}
