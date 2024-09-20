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

    checkLogin = () => {
        $('#login-button').click(() => {
            let username = $('#id-input').val();
            let password = $('#password-input').val();

            fetch('/log/login', {
                method: 'POST',
                body: JSON.stringify({
                    username,
                    password
                })
            })
                .then(response => response.json())
                .then(async (data) => {
                    // console.log(data)
                    let role_name = data['role_name'];
                    let message = data['message'];
                    $('#toast-message').html(message);

                    if(data['status'] === true){
                        $('#toast').removeClass('d-none').addClass('bg-success');

                        let timerId = await new Promise(resolve => setTimeout(() => {
                            $('#toast').addClass('d-none').removeClass('bg-success');
                            resolve();
                        }, 3000))
                        clearTimeout(timerId);
                    } else {
                        $('#toast').removeClass('d-none').addClass('bg-danger');

                        let timerId = await new Promise(resolve => setTimeout(() => {
                            $('#toast').addClass('d-none').removeClass('bg-danger');
                            resolve();
                        }, 3000))
                        clearTimeout(timerId);
                    }

                    return role_name
                })
                .then(role_name => {
                    if (role_name === 'mentor'){
                        window.location = '/mentor';
                    } else if (role_name === 'guard'){
                        window.location = '/guard';
                    } else if (role_name === 'support'){
                        window.location = '/support';
                    } else if (role_name === 'team'){
                        window.location = '/team/game-mentor';
                    }
                })
                .catch(error => {
                    console.log(error)
                })
                .finally(() => {

                })
        })
    }

    redirectToRolePage = () => {

    }
}

export default new Log;
