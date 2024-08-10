<?php
    include "./app/controllers/SupportController.php";
    include "./app/middlewares/SupportMiddleWare.php";
    $supportMiddleWare = new SupportMiddleWare();
    $supportController = new SupportController();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])){

        } else if (isset($_GET['param_1']) && isset($_GET['param_2'])){
            switch ($_GET['param_1']){
                case 'support':
                    if($_GET['param_2'] == 'question'){
                        $supportMiddleWare->question();
                    } else if ($_GET['param_2'] == 'team'){
                        $supportMiddleWare->team_control();
                    }
                    break;
            }
        } else if (isset($_GET['param_1'])){
            switch ($_GET['param_1']){
                case 'support':
                    $supportMiddleWare->index();
                    break;
            }
        }

    } else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])){

        } else if (isset($_GET['param_1']) && isset($_GET['param_2'])){

        } else if (isset($_GET['param_1'])){

        }
    }

?>
