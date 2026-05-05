document.getElementById("signupForm").addEventListener("submit", async (e) => {
  e.preventDefault();
  const formData = new FormData();
  formData.append("submit", "1");
  formData.append("username", document.getElementById("signupUsername").value);
  formData.append("password", document.getElementById("signupPassword").value);
  formData.append("email", document.getElementById("signupEmail").value);

  try {
    const response = await fetch("../controller/signup.php", {
      method: "POST",
      body: formData,
    });
    const result = await response.json();
    alert(result.message);
    if (result.success && result.redirect) {
      window.location.href = result.redirect;
    }
  } catch (err) {
    alert("Error: " + err.message);
  }
});
