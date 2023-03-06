const form = document.querySelector('form');
const firstNameInput = document.querySelector('#firstName');
const lastNameInput = document.querySelector('#lastName');

form.addEventListener('submit', (event) => {
  event.preventDefault(); // prevent form submission

  // validate inputs
  const firstName = firstNameInput.value.trim();
  const lastName = lastNameInput.value.trim();
  const firstNamePattern = /^[A-Za-z]+$/;
  const lastNamePattern = /^[A-Za-z]+$/;

  if (!firstNamePattern.test(firstName)) {
    alert('First name should contain only alphabets');
    firstNameInput.focus();
    return;
  }

  if (!lastNamePattern.test(lastName)) {
    alert('Last name should contain only alphabets');
    lastNameInput.focus();
    return;
  }

  // form is valid, submit it
  form.submit();
});
// function for displaying full name in disabled input with js.
function updateFullName() {
  var firstName = document.getElementById("firstName").value;
  var lastName = document.getElementById("lastName").value;
  document.getElementById("fullName").value = firstName + " " + lastName;
}
