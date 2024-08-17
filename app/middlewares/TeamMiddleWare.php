<?php

class TeamMiddleWare{
    private TeamController $teamController;

    public function __construct()
    {
        $this->teamController = new TeamController();
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
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'team') {
            header('location: /');
        } else {
            $this->teamController->game_1_topic($location_id);
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
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'team') {
            header('location: /');
        } else {
            $this->teamController->mentor_topic($location_id);
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
}

?>