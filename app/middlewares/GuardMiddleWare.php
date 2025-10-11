<?php

class  GuardMiddleWare
{
    private GuardController $guardController;
    public function __construct()
    {
        $this->guardController = new GuardController();
    }

    public function update_next_location()
    {
        $content = file_get_contents('php://input');
        $data = json_decode($content, true);
        if (!empty($data['team_id']) && !empty($data['mentor_id']) && !empty($data['next_priority']) && !empty($data['input'])) {
            $team_id = $data['team_id'];
            $mentor_id = $data['mentor_id'];
            $next_priority = $data['next_priority'];
            $inputKey = $data['input'];
            $is_success = $data['is_success'] ?? false;
            $this->guardController->update_next_location($team_id, $mentor_id, $next_priority, $inputKey, $is_success);
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'Vui lòng nhập mã định danh mentor'
            ));
        }
    }
    public function update_special_station_result()
    {
        $content = file_get_contents('php://input');
        $data = json_decode($content, true);

        if (!empty($data['team_id']) && isset($data['is_success'])) {
            $team_id = $data['team_id'];
            $is_success = (bool)$data['is_success'];
            $this->guardController->update_special_station_result($team_id, $is_success);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'Thiếu tham số đầu vào (team_id, is_success)'
            ]);
        }
    }
    public function activate_special_puzzle()
    {
        $content = file_get_contents('php://input');
        $data = json_decode($content, true);

        if (!empty($data['team_id'])) {
            $team_id = $data['team_id'];
            $result = $this->guardController->activate_special_puzzle($team_id);
            echo json_encode($result);
        } else {
            echo json_encode([
                'status' => false,
                'message' => 'Thiếu tham số team_id'
            ]);
        }
    }
    public function activate_special_puzzle_input()
    {
        $result = $this->guardController->activate_special_puzzle_input();
        echo json_encode($result);
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
        } else {
            $this->guardController->question();
        }
    }

    public function guard_rule()
    {
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'guard') {
            header('location: /');
        } else {
            $this->guardController->guard_rule();
        }
    }

    public function open_special_letter_input() {
        if ((!isset($_SESSION['person_id']) && !isset($_SESSION['role_name'])) || $_SESSION['role_name'] != 'guard') {
            echo json_encode(array(
                'status' => false,
                'data' => null
            ));
        }
        return $this->guardController->open_special_letter_input();
    }
}
