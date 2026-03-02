let form = document.getElementById("form");
form.addEventListener("submit", function (e) {
  e.preventDefault();
  let userId = document.getElementById("userId").value;
  let picture = document.getElementById("profilePicture").files;
  if (userId === "" || userId <= 0) {
    console.log("User Id must be a positive number.");
  }
  if (picture.length === 0) {
    console.log("please select a picture.");
  }
});
