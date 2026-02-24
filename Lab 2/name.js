// let name = document.getElementById("name");
let value = document.getElementById("name").value;

let btn = document.getElementById("submit-btn");
btn.addEventListener("click", verify);

function verify(value){
    value = value.trim();
    if(value === ""){
        console.log("Please enter your name");
        alert("Please enter your name");
    }
}