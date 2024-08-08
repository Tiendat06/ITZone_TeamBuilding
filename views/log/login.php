<?php

?>

<!doctype html>
<html lang="en">
<?php
include "./views/layout/partials/header.php";
?>
<!--<head>-->
<!--    <title>Bootstrap 5 Example</title>-->
<!--    <meta charset="utf-8">-->
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">-->
<!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">-->
<!--    <link rel="stylesheet" href="/public/css/main.css">-->
<!--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>-->
<!--</head>-->
<body>
<section class="login-section">
<section class="login-section-1" id="login-section-1">
    <a href="" class="login-section-1__back-button"><i class="fa fa-angle-left"></i> Quay lại</a>
</section>

<section class="login-section-2" id="login-section-2">
    <form action="" class="login-section-2__form">
        <h1 class="login-section-2__form--greeting gradient-color-text-1">Aloha!</h1>
        <div class="login-section-2__form--text">Chào mừng bạn đến với Teambuilding Clb IT-Zone! Vui lòng đăng nhập để tiếp tục.</div>
        <figure class="login-section-2__form--figure">
            <img src="/public/img/login/lock.png" alt="login img" class="login-section-2__form--image">
        </figure>
        <div class="login-section-2__form--input">
            <input id="id-input" class="login-section-2__form--input-box" onfocusout="enableButton()" placeholder="ID đăng nhập" type="text">
        </div>
        <div class="login-section-2__form--input">
            <input id="password-input" class="login-section-2__form--input-box" onfocusout="enableButton()" placeholder="Mật khẩu" type="password">
            <img id="toggle-password" class="login-section-2__form--icon" onclick="togglePassword()" src="/public/img/icon/close-eye.png" alt="close eye">
        </div>
        <button id="login-button" class="login-section-2__form--button"">Đăng nhập</button>
    </form>
</section>
</section>

<?php
include "./views/layout/partials/footer.php";
?>
<!--<script src="/public/js/login.js"></script>-->
</body>
</html>
