<?php

class  GuardMiddleWare{
    private GuardController $guardController;
    public function __construct()
    {
        $this->guardController = new GuardController();
    }

    public function update_next_location(){
        $content = file_get_contents('php://input');
        $data = json_decode($content, true);
        if(!empty($data['team_id']) && !empty($data['mentor_id']) && !empty($data['next_priority']) && !empty($data['input'])){
            $team_id = $data['team_id'];
            $mentor_id = $data['mentor_id'];
            $next_priority = $data['next_priority'];
            $inputKey = $data['input'];
            $this->guardController->update_next_location($team_id, $mentor_id, $next_priority, $inputKey);
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Vui lòng nhập mã định danh mentor'
            ));
        }
    }

    public function index()
    {
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'guard') {
            header('location: /');
        } else {
            $this->guardController->index();
        }
    }

    public function question()
    {
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'guard') {
            header('location: /');
        } else{
            $this->guardController->question();
        }
    }
}

?>