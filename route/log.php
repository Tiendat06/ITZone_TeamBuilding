<?php

    include "./app/controllers/LogController.php";
    include "./app/middlewares/LogMiddleWare.php";
    $logController = new LogController();
    $logMiddleWare = new LogMiddleware();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])){

        } else if (isset($_GET['param_1']) && isset($_GET['param_2'])){
            switch ($_GET['param_1']){
                case 'log':
                    if($_GET['param_2'] == 'login'){
                        $logMiddleWare->login();
                    } else if($_GET['param_2'] == 'logout'){
                        $logMiddleWare->logout();
                    }
                    break;
            }
        } else if (isset($_GET['param_1'])){

        }

    } else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])){

        } else if (isset($_GET['param_1']) && isset($_GET['param_2'])){
            switch ($_GET['param_1']){
                case 'log':
                    if($_GET['param_2'] == 'login'){
                        $logMiddleWare->login_POST();
                    }
                    break;
            }
        } else if (isset($_GET['param_1'])){

        }
    }
?>