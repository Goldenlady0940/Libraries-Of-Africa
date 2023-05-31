let form = document.getElementById("form");
let username = form.elements["username"];
let email = form.elements["email"];
let password = form.elements["password"];
let password2 = form.elements["password2"];
let img = document.querySelector(".title img");
img.style.display = "none";

let gender = document.querySelectorAll("input[type=radio]");

form.addEventListener("submit", function (e) {
  e.preventDefault();
  validateForm();
});

function setError(element, message) {
  let error = element.nextElementSibling;
  error.textContent = message;
  error.style.display = "block";
  img.style.display = "inline-block";
}

function setSuccess(element) {
  let errorElement = element.nextElementSibling;
  errorElement.textContent = "";
  
}

function validateForm() {
  let isValid = true;

  if (username.value == "") {
    setError(username, "Username is required");
    isValid = false;
  } else {
    setSuccess(username);
  }

  if (email.value == "") {
    setError(email, "Email is required");
    isValid = false;
  } else if (!isValidEmail(email.value)) {
    setError(email, "Invalid email format");
    isValid = false;
  } else {
    setSuccess(email);
  }

  let genderSelected = false;
  for (let i = 0; i < gender.length; i++) {
    if (gender[i].checked) {
      genderSelected = true;
      break;
    }
  }
  if (!genderSelected) {
    let radioError = document.getElementById("radio-error");
    radioError.textContent = "Gender is required";
    isValid = false;
  } else {
    let radioError = document.getElementById("radio-error");
    radioError.textContent = "";
  }

  if (password.value == "") {
    setError(password, "Password is required");
    isValid = false;
  } else if (password.value.length < 8) {
    setError(password, "Password must be at least 8 characters");
    isValid = false;
  } else if (!isValidPassword(password.value)) {
    setError(
      password,
      "Password must contain at least 1 uppercase letter and 1 number"
    );
    isValid = false;
  } else {
    setSuccess(password);
  }

  if (password2.value == "") {
    setError(password2, "Confirm password is required");
    isValid = false;
  } else if (password2.value !== password.value) {
    setError(password2, "Passwords do not match");
    isValid = false;
  } else {
    setSuccess(password2);
  }

  if (isValid) {
    form.submit();
  }
}

function isValidEmail(email) {
  // basic email validation
  const emailRegex = /^\S+@\S+\.\S+$/;
  return emailRegex.test(email);
}
function isValidPassword(password) {
  // Regular expression to match password pattern
  const passwordPattern = /^(?=.*\d)(?=.*[A-Z]).{6,}$/;
  return passwordPattern.test(password);
}
