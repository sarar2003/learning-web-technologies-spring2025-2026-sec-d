let submitBtn = document.querySelector('input[type="submit"]');

submitBtn.addEventListener("click", function (e) {
  e.preventDefault();

  let name = document.getElementById("name").value;
  if (name === "") {
    console.log("Name is empty");
    return;
  }

  let email = document.getElementById("email").value;
  if (email === "" || !email.includes("@")) {
    console.log("Invalid email");
    return;
  }

  let gender = "";
  if (document.getElementById("male").checked) gender = "Male";
  else if (document.getElementById("female").checked) gender = "Female";
  else if (document.getElementById("other").checked) gender = "Other";
  if (gender === "") {
    console.log("Gender not selected");
    return;
  }

  let dob = document.querySelector('input[type="date"]').value;
  if (dob === "") {
    console.log("DOB is empty");
    return;
  }
  let year = dob.split("-")[0];
  if (year < 1900 || year > 2030) {
    console.log("Year must be 1900-2030");
    return;
  }

  let blood = document.getElementById("Blood_group").value;
  if (blood === "") {
    console.log("Select a blood group");
    return;
  }

  if (
    !document.getElementById("ssc").checked &&
    !document.getElementById("hsc").checked &&
    !document.getElementById("bsc").checked &&
    !document.getElementById("msc").checked
  ) {
    console.log("Select at least one degree");
    return;
  }

  let photo = document.querySelector('input[type="file"]').files;
  if (photo.length === 0) {
    console.log("Upload a photo");
    return;
  }

  console.log("Form submitted successfully!");
  console.log("Name:", name);
  console.log("Email:", email);
  console.log("Gender:", gender);
  console.log("DOB:", dob);
  console.log("Blood Group:", blood);

  let degrees = [];
  if (document.getElementById("ssc").checked) degrees.push("SSC");
  if (document.getElementById("hsc").checked) degrees.push("HSC");
  if (document.getElementById("bsc").checked) degrees.push("BSC");
  if (document.getElementById("msc").checked) degrees.push("MSC");
  console.log("Degrees:", degrees.join(", "));

  console.log("Photo:", photo[0].name);
});
