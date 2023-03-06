const form = document.querySelector('form');
const firstNameInput = document.querySelector('#firstName');
const lastNameInput = document.querySelector('#lastName');
const inputField = document.querySelector('#subjectMarks');
const phoneInput = document.querySelector('#phone');

form.addEventListener('submit', (event) => {
  event.preventDefault(); // prevent form submission

  // validate inputs
  const firstName = firstNameInput.value.trim();
  const lastName = lastNameInput.value.trim();
  const inputValue = inputField.value;
  const phoneValue = phoneInput.value;
  const firstNamePattern = /^[A-Za-z]+$/;
  const lastNamePattern = /^[A-Za-z]+$/;
  const marksPattern = /^[a-zA-Z]+\|[0-9]+$/m;
  const phonePattern = /^\+91[1-9]\d{9}$/;

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

  if (!marksPattern.test(inputValue)) {
    alert('Enter subject marks in the format Subject|Marks in each line');
    inputField.focus();
    return;
  }

  if (!phonePattern.test(phoneValue)) {
    alert('Enter a valid Indian phone number starting with +91 and having 10 digits');
    phoneInput.focus()
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
