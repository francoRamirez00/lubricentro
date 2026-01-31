
const password=document.getElementById("password");
const error= document.getElementById("passError");


password.addEventListener("input", ()=>{
    const pass= password.value;

    const tieneMayuscula = /[A-Z]/.test(pass);
    const tieneLargo = pass.length >= 6;

    if (tieneMayuscula && tieneLargo) {
        error.style.display = "none";
        password.style.borderColor = "green";

        
    }else{
        error.style.display = "block";
        password.style.borderColor = "red";


    }
})