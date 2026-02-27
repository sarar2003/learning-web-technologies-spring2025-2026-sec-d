let btn = document.getElementById("submit-btn");
btn.addEventListener("click", verify);

function verify(e) {
    e.preventDefault();
    let value = document.getElementById("email").value.trim();
    if(value === ""){
        console.log("Input cannot be empty")
    }
    else if(value.indexOf("@")=== -1 || value.indexOf (".", value.indexOf("@"))=== -1){
        console.log("Please enter a valid email address")
    }
    else{
        console.log("Email is valid")
    }
}