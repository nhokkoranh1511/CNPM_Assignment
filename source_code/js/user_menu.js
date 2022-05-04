let preChangeName = document.getElementById("preChangeName");
let postChangeName = document.getElementById("postChangeName");
let toggleOnNameBut = document.getElementById("toggleChangeName");
let toggleOffNameBut = document.getElementById("toggleChangeNameOff");

let preChangeEmail = document.getElementById("preChangeEmail");
let postChangeEmail = document.getElementById("postChangeEmail");
let toggleOnEmailBut = document.getElementById("toggleChangeEmail");
let toggleOffEmailBut = document.getElementById("toggleChangeEmailOff");


let preChangePass = document.getElementById("preChangePass");
let postChangePass = document.getElementById("postChangePass");
let toggleOnPassBut = document.getElementById("toggleChangePass");
let toggleOffPassBut = document.getElementById("toggleChangePassOff");


toggleOnNameBut.onclick = function() {
    preChangeName.style.display = "none";
    postChangeName.style.display = "inline";
}
toggleOffNameBut.onclick = function() {
    preChangeName.style.display = "inline";
    postChangeName.style.display = "none";
}




toggleOnEmailBut.onclick = function() {
    preChangeEmail.style.display = "none";
    postChangeEmail.style.display = "inline";
}
toggleOffEmailBut.onclick = function() {
    preChangeEmail.style.display = "inline";
    postChangeEmail.style.display = "none";
}


toggleOnPassBut.onclick = function() {
    preChangePass.style.display = "none";
    postChangePass.style.display = "inline";
}
toggleOffPassBut.onclick = function() {
    preChangePass.style.display = "inline";
    postChangePass.style.display = "none";
}

