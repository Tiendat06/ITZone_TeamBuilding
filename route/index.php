<?php
    $maintain = false;
    if($maintain)
        include "./views/error/maintain.php";
    else{
        include "./route/site.php";
        include "./route/log.php";
        include "./route/mentor.php";
        include "./route/guard.php";
        include "./route/support.php";
        include "./route/team.php";
        include "./route/location.php";
    }
?>