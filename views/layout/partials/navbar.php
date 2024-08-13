<?php
?>


<nav class="navbar w-100">
    <header class="navbar-header justify-content-between align-items-center w-100 d-flex flex-wrap">
        <div class="navbar-header__logo">
            <img class="navbar-header__logo--img" src="/public/img/logo/logo-itzone.png" alt="">
        </div>

        <div class="navbar-header__info d-flex flex-wrap">
            <div class="navbar-header__greet">
                <p style="line-height: 0.9rem" class="mb-0 navbar-header__greet--para itz-btn-hover">Xin chào,</p>
                <p style="line-height: 0.9rem" class="mb-0 navbar-header__greet--para itz-btn-hover"><?= $_SESSION['person_name'] ?></p>
                <a href="/log/logout" style="font-size: 9px; width: 60px; height: 20px" class="p-1 btn itz-btn-hover text-light">Đăng xuất</a>
            </div>
            
            <div class="navbar-header__img m-auto">
                <img style="width: 40px" class="navbar-header__img--right" src="/public/img/general/personal.png" alt="">
            </div>
        </div>
    </header>
</nav>