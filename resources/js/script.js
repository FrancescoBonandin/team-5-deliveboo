const password = document.querySelector("#password");
    const confirmPassword = document.querySelector("#password_confirmation");

    function checkPassword() {
        if (password.value !== confirmPassword.value) {
            confirmPassword.setCustomValidity("Le password non coincidono");
        } else {
            confirmPassword.setCustomValidity("");
        }
    }

    password.addEventListener("input", checkPassword);
    confirmPassword.addEventListener("input", checkPassword);