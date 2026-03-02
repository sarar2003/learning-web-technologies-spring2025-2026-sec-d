let form = document.getElementById("form");

form.addEventListener("submit", verifyBloodGroup);

function verifyBloodGroup(e) {
  e.preventDefault();

  const bloodGroup = document.getElementById("Blood_group").value;

  if (!bloodGroup) {
    console.log("Please select your blood group.");
  } else {
    console.log("Blood group selected: " + bloodGroup);
  }
}
