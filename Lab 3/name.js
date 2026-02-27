let btn = document.getElementById("submit-btn");
btn.addEventListener("click", verify);

function verify(event){
    event.preventDefault();
    let value = document.getElementById("name").value.trim();
    if(value === ""){
        console.log("can not be empty");
    }
    else if(!/^[A-Zz-z]/.test(value) ){
        console.log("Must start with a letter");
    }
    else if(!/^[A-Zz.\-\s]+$/.test(value)){
        console.log("only letters, dot(.), dash(-) allowed");
    }
    else if(value.split(" ").length < 2){
        console.log("Must contain at least 2 words");
    }
    else {
        console.log("Input Valid");
    }
}
