<?php
    include "./app/controllers/TeamController.php";
    include "./app/middlewares/TeamMiddleWare.php";
    $teamMiddleWare = new TeamMiddleWare();
    $teamController = new TeamController();

    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        if(isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])){
            switch ($_GET['param_1']){
                case 'team':
                    if($_GET['param_2'] == 'game-1-topic'){

                        $location_id = $_GET['param_3'];
                        if(strpos($location_id, "LOC") === 0){
                            $teamMiddleWare->game_1_topic($location_id);
                        }
                    } else if ($_GET['param_2'] == 'mentor-topic'){
                        $location_id = $_GET['param_3'];
                        if(strpos($location_id, "LOC") === 0){
                            $teamMiddleWare->mentor_topic($location_id);
                        }
                    }
                    break;
            }
        } else if (isset($_GET['param_1']) && isset($_GET['param_2'])){
            switch ($_GET['param_1']){
                case 'team':
                    if($_GET['param_2'] == 'game-1'){
                        $teamMiddleWare->game_1();
                    } else if ($_GET['param_2'] == 'game-mentor'){
                        $teamMiddleWare->game_mentor();
                    }
                    else if($_GET['param_2'] == 'member'){
                        $teamMiddleWare->team_member();
                    }
                    break;
            }
        } else if (isset($_GET['param_1'])){

        }

    } else if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_GET['param_1']) && isset($_GET['param_2']) && isset($_GET['param_3'])){

        } else if (isset($_GET['param_1']) && isset($_GET['param_2'])){

        } else if (isset($_GET['param_1'])){

        }
    }

?>
