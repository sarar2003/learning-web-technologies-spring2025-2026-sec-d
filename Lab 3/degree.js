let form = document.getElementById("form");
form.addEventListener("submit", submit);
function submit(e) {
  let checked = document.querySelector(`input[name="degree"]:checked`);
  e.preventDefault();
  if (checked) {
    console.log("option selected");
  } else {
    console.log("option not selected");
  }
}
