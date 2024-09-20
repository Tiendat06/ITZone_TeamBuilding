<?php

class TeamMiddleWare{
    private TeamController $teamController;
    private TeamArrivalService $teamArrivalService;

    public function __construct()
    {
        $this->teamController = new TeamController();
        $this->teamArrivalService = new TeamArrivalService();
    }

    public function get_topic_hint(){
        $content = trim(file_get_contents('php://input'));
        $data = json_decode($content, true);
        if(!empty($data["topic_id"]) && !empty($data["hint_priority"])){
            $topic_id = $data["topic_id"];
            $hint_priority = $data["hint_priority"];
            $this->teamController->get_topic_hint($topic_id, $hint_priority);
        } else{
            echo json_encode(array(
               'status' => false,
               'message' => 'Leak of data'
            ));
        }
    }

    public function update_topic_is_done(){
        $content = trim(file_get_contents('php://input'));
        $data = json_decode($content, true);

        if(isset($data["topic_id"]) && isset($data["is_done"])){
            $topic_id = $data["topic_id"];
            $is_done = $data["is_done"];
            $this->teamController->update_topic_is_done($topic_id, $is_done);
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => $data
            ));
        }
    }

    public function update_time_fine(){
        $content = trim(file_get_contents('php://input'));
        $data = json_decode($content, true);
        if(!empty($data["topic_id"])){
            $topic_id = $data["topic_id"];
            $this->teamController->update_time_fine($topic_id);
        } else{
            echo json_encode(array(
                'status' => false,
                'message' => 'Leak of data'
            ));
        }
    }

    public function check_time_fine(){
        $content = trim(file_get_contents('php://input'));
        $data = json_decode($content, true);
        if(!empty($data["topic_id"])){
            $topic_id = $data["topic_id"];
            $this->teamController->check_time_fine($topic_id);
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Leak of data'
            ));
        }
    }

    public function check_is_done_topic(){
        $content = trim(file_get_contents('php://input'));
        $data = json_decode($content, true);
        if(!empty($data["topic_id"])){
            $topic_id = $data["topic_id"];
            $this->teamController->check_is_done_topic($topic_id);
        }else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Leak of data'
            ));
        }
    }

    public function update_lotte_location(){
        $content = trim(file_get_contents('php://input'));
        $data = json_decode($content, true);
        if(!empty($data["location_id"])){
            $location_id = $data["location_id"];
            $this->teamController->update_lotte_location($location_id);
        }else{
            echo json_encode(array(
                'status' => false,
                'message' => 'Leak of data'
            ));
        }
    }

    public function view_topic_hint(){
        $content = trim(file_get_contents('php://input'));
        $data = json_decode($content, true);
        if(!empty($data["topic_id"]) && !empty($data["hint_priority"])){
            $topic_id = $data["topic_id"];
            $hint_priority = $data["hint_priority"];
            $this->teamController->view_topic_hint($topic_id, $hint_priority);
        }else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Leak of data'
            ));
        }
    }

    public function game_1(){
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'team') {
            header('location: /');
        } else {
            $this->teamController->game_1();
        }
    }

    public function game_1_topic($location_id){
        $split_location_id = str_split($location_id, 8);
        $no_Location_id = $split_location_id[1];
//       location id out of range
        if($no_Location_id > 12 || $no_Location_id < 1){
            header('location: /');
        }
//        check session
        else if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'team') {
            header('location: /');
        }
//        check is done previous location
        else {
            $team_arrival_data = $this->teamArrivalService->getTeamArrivalByLocationIdAndTeamId($location_id);
            $team_arrival_priority = $team_arrival_data->getTeamArrivalPriority();
            if($team_arrival_priority === 0){
                header('location: /');
            }
            $previous_priority = $team_arrival_priority - 1;
            $totalIsShowPreviousPriority = $this->teamArrivalService->checkPreviousPriorityIsShowNextLocationByTeamId($previous_priority);
            if($totalIsShowPreviousPriority > 0) {
                $this->teamController->game_1_topic($location_id);
            } else{
                header('location: /');
            }
        }
    }

    public function game_mentor()
    {
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'team') {
            header('location: /');
        } else {
            $this->teamController->game_mentor();
        }
    }

    public function mentor_topic($location_id)
    {
        $split_location_id = str_split($location_id, 8);
        $no_Location_id = $split_location_id[1];
//       location id out of range
        if($no_Location_id > 12 || $no_Location_id < 1){
            header('location: /');
        }
//        check session
        else if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'team') {
            header('location: /');
        }
//        check location is shown
        else {
            $team_arrival_data = $this->teamArrivalService->getTeamArrivalByLocationIdAndTeamId($location_id);
            $team_arrival_priority = $team_arrival_data->getTeamArrivalPriority();
            if($team_arrival_priority === 0){
                header('location: /');
            }
            $totalIsShowPreviousPriority = $this->teamArrivalService->checkPreviousPriorityIsShowNextLocationByTeamId($team_arrival_priority);
            if($totalIsShowPreviousPriority > 0) {
                $this->teamController->mentor_topic($location_id);
            } else{
                header('location: /');
            }
        }
    }

    public function team_member()
    {
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'team') {
            header('location: /');
        } else {
            $this->teamController->team_member();
        }
    }

    public function team_rule(){
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'team') {
            header('location: /');
        } else {
            $this->teamController->team_rule();
        }
    }
}

?>