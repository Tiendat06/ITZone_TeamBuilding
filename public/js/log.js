class Log{
    constructor(){}

    togglePassword() {
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

    enableButton(){
        if (document.getElementById("id-input").value === "" || document.getElementById("password-input").value === "") {
            document.getElementById('login-button').disabled = true;
            document.getElementById('login-button').style = "background-color: #CCC"
        } else {
            document.getElementById('login-button').disabled = false;
            document.getElementById('login-button').style = "background: linear-gradient(to right, $gradient-color-3 0%, $gradient-color-4 30%, $gradient-color-5 100%);"
        }
    }
}

export default new Log;
