<?php
    include "./app/controllers/MentorController.php";
    include "./app/middlewares/MentorMiddleWare.php";
    $mentorMiddleWare = new MentorMiddleWare();
    $mentorController = new MentorController();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])){

        } else if (isset($_GET['param_1']) && isset($_GET['param_2'])){
//            switch ($_GET['param_1']){
//                case 'mentor':
//                    if(isset($_GET['param_2']) == 'member'){
//                        $mentorMiddleWare->mentor_member();
//                    }
//                    break;
//            }
        } else if (isset($_GET['param_1'])){
            switch ($_GET['param_1']){
                case 'mentor':
                    $mentorMiddleWare->index();
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
