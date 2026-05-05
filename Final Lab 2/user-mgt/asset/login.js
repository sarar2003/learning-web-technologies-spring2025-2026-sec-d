document.getElementById("loginForm").addEventListener("submit", async (e) => {
  e.preventDefault();
  const formData = new FormData();
  formData.append("submit", "1");
  formData.append("username", document.getElementById("loginUsername").value);
  formData.append("password", document.getElementById("loginPassword").value);

  try {
    const response = await fetch("../controller/login.php", {
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
