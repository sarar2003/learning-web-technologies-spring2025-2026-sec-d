let form = document.getElementById("form");
form.addEventListener("submit", function (e) {
  e.preventDefault();
  let dob = document.getElementById("dob").value;
  if (dob === "") {
    console.log("Date of Birth cannot be empty");
  }
  let year = dob.split("-")[0];
  if (year < 1900 || year > 2030) {
    console.log("Year must be between 1900 and 2030");
  }
  console.log("Valid Date:", dob);
});
