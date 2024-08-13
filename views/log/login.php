<?php

?>

<!doctype html>
<html lang="en">
<?php
include "./views/layout/partials/header.php";
?>

<body>
<section class="login-section">
<section class="login-section-1" id="login-section-1">
    <a href="/" class="login-section-1__back-button"><i class="fa fa-angle-left"></i> Quay lại</a>
</section>

<section class="login-section-2" id="login-section-2">
    <form action="#" class="login-section-2__form">
        <h1 class="login-section-2__form--greeting gradient-color-text-1">Aloha!</h1>
        <div class="login-section-2__form--text">Chào mừng bạn đến với Teambuilding Clb IT-Zone! Vui lòng đăng nhập để tiếp tục.</div>
        <figure class="login-section-2__form--figure">
            <img src="/public/img/login/lock.png" alt="login img" class="login-section-2__form--image">
        </figure>
        <div class="login-section-2__form--input">
            <input id="id-input" class="login-section-2__form--input-box" oninput="enableButton()" onclick="enableButton()" placeholder="Tên người dùng" type="text">
        </div>
        <div class="login-section-2__form--input">
            <input id="password-input" class="login-section-2__form--input-box" oninput="enableButton()" onclick="enableButton()" placeholder="Mật khẩu" type="password">
            <img id="toggle-password" class="login-section-2__form--icon" onclick="togglePassword()" src="/public/img/icon/close-eye.png" alt="close eye">
        </div>
        <button id="login-button" class="login-section-2__form--button">Đăng nhập</button>
    </form>
</section>
</section>

</body>
</html>
