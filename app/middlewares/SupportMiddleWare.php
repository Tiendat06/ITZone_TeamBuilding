<?php

class SupportMiddleWare{
    private SupportController $supportController;
    public function __construct()
    {
        $this->supportController = new SupportController();
    }

    public function index(){
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'support') {
            header('location: /');
        } else {
            $this->supportController->index();
        }
    }

    public function question(){
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'support') {
            header('location: /');
        } else {
            $this->supportController->question();
        }
    }

    public function team_control(){
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'support') {
            header('location: /');
        } else {
            $this->supportController->team_control();
        }
    }

    public function support_rule(){
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'support') {
            header('location: /');
        } else {
            $this->supportController->support_rule();
        }
    }

    public function team_control_member(){
        $content = trim(file_get_contents("php://input"));
        $data = json_decode($content, true);
        if (!empty($data['team_id'])) {
            $team_id = $data['team_id'];
            $this->supportController->team_control_member($team_id);
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Không thể thực hiện yêu cầu này!'
            ));
        }
    }
    public function get_team_question(){
        $content = trim(file_get_contents("php://input"));
        $data = json_decode($content, true);
        if (!empty($data['location_id'])) {
            $location_id = $data['location_id'];
            $this->supportController->get_team_question($location_id);
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Không có dữ liệu!'
            ));
        }
    }
}

?>