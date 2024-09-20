<?php

    include "./app/controllers/LocationController.php";
    include "./app/middlewares/LocationMiddleWare.php";
    $locationMiddleWare = new LocationMiddleWare();
    $locationController = new LocationController();

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        if (isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])) {

        } else if (isset($_GET['param_1']) && isset($_GET['param_2'])) {
    //        test
            switch ($_GET['param_1']){
                case 'location':
                    $locationMiddleWare->index($_GET['param_2']);
                    break;
            }
        } else if (isset($_GET['param_1'])) {

        }

    } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])) {

        } else if (isset($_GET['param_1']) && isset($_GET['param_2'])) {
            switch ($_GET['param_1']){
//                test
                case 'location':
                    if($_GET['param_2'] == 'send_answer'){
                        $locationMiddleWare->send_answer();
                    } else if ($_GET['param_2'] == 'get_answer'){
                        $locationMiddleWare->get_answer();
                    }
                    break;
            }
        } else if (isset($_GET['param_1'])) {

        }
    }


?>