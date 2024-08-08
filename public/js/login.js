function togglePassword() {
    const togglePassword =
        document.querySelector('#toggle-password');

    const password =
        document.querySelector('#password-input');

    // Toggle the type attribute
    const type = password.getAttribute(
        'type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);

    // Toggle the eye icon
    if (togglePassword.src.match(
        "/public/img/icon/close-eye.png")) {
        togglePassword.src =
            "/public/img/icon/open-eye.png";
    } else {
        togglePassword.src =
            "/public/img/icon/close-eye.png";
    }
}

function enableButton(){
    if (document.getElementById("id-input").value === "" || document.getElementById("password-input").value === "") {
        document.getElementById('login-button').disabled = true;
        console.log("hello")
    } else {
        document.getElementById('login-button').disabled = false;
        console.log("hi")
    }
}
