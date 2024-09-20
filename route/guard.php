<?php
    include "./app/controllers/GuardController.php";
    include "./app/middlewares/GuardMiddleWare.php";
    $guardMiddleWare = new GuardMiddleWare();
    $guardController = new GuardController();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])){

        } else if (isset($_GET['param_1']) && isset($_GET['param_2'])){
            switch ($_GET['param_1']){
                case 'guard':
                    if ($_GET['param_2'] == 'question'){
                        $guardMiddleWare->question();
                    } else if($_GET['param_2'] == 'rule'){
                        $guardMiddleWare->guard_rule();
                    }
                    break;
            }
        } else if (isset($_GET['param_1'])){
            switch ($_GET['param_1']){
                case 'guard':
                    $guardMiddleWare->index();
                    break;
            }
        }

    } else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])){

        } else if (isset($_GET['param_1']) && isset($_GET['param_2'])){
            switch ($_GET['param_1']){
                case 'guard':
                    if ($_GET['param_2'] == 'update_next_location'){
                        $guardMiddleWare->update_next_location();
                    }
                    break;
            }
        } else if (isset($_GET['param_1'])){

        }
    }

?>
