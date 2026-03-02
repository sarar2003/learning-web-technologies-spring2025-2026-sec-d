let form = document.getElementById("gender-form");
form.addEventListener("submit", verify);

function verify(e) {
  e.preventDefault();

  if (document.querySelector('input[name="gender"]:checked')) {
    console.log("Gender is selected");
  } else {
    console.log("Please select a gender");
  }
}
