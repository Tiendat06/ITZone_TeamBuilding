<?php
    session_set_cookie_params(86400);   // 1 day
    session_start();
    $maintain = true;
    include "./config/DatabaseManager.php";
    include "./app/models/index.php";
    include "./app/pattern/index.php";
    include "./app/repository/index.php";
    include "./app/services/index.php";
    if($maintain)
        include "./views/error/maintain.php";
    else
        include "./route/index.php";
?>