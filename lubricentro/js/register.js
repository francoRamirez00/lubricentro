document.addEventListener("DOMContentLoaded", () => {

    const password = document.getElementById("password");
    const repeatPassword = document.getElementById("repeatPassword");
    const error = document.getElementById("passError");
    const repeatPassError = document.getElementById("repeatPassError");
    const form = document.getElementById("formRegister");

    if (!password || !repeatPassword || !form) return;

    function validarPassword() {
        const pass = password.value;
        const repeatPass = repeatPassword.value;

        const tieneMayuscula = /[A-Z]/.test(pass);
        const tieneLargo = pass.length >= 6;
        const esIgual = pass === repeatPass;

        // contraseña
        if (tieneMayuscula && tieneLargo) {
            error.style.display = "none";
            password.style.borderColor = "green";
        } else {
            error.style.display = "block";
            password.style.borderColor = "red";
        }

        // repetir contraseña
        if (repeatPass !== "" && esIgual) {
            repeatPassError.style.display = "none";
            repeatPassword.style.borderColor = "green";
        } else if (repeatPass !== "") {
            repeatPassError.style.display = "block";
            repeatPassword.style.borderColor = "red";
        }

        return tieneMayuscula && tieneLargo && esIgual;
    }

    password.addEventListener("input", validarPassword);
    repeatPassword.addEventListener("input", validarPassword);

    form.addEventListener("submit", function (e) {
        if (!validarPassword()) {
            e.preventDefault();
            alert("Revisá la contraseña");
        }
    });
});