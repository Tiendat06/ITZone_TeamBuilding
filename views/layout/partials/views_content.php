<?php

    function getViews($content){
        switch ($content){
            case 'home':
                include "./views/site/home.php";
                break;
        }
    }

?>