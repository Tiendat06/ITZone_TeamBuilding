<?php

class LogMiddleWare{
    private LogController $logController;
    public function __construct()
    {
        $this->logController = new LogController();
    }

    public function login(){
        if (isset($_SESSION['person_id']) && isset($_SESSION['role_name'])) {
            header('location: /');
        } else {
            $this->logController->login();
        }
    }

    public function logout(){
        $this->logController->logout();
    }

    public function login_POST(){
        $content = trim(file_get_contents("php://input"));
        $data = json_decode($content, true);
        if(!empty($data['username']) && !empty($data['password'])){
            $username = $data['username'];
            $password = $data['password'];
            $this->logController->checkLogin($username, $password);
        } else{
            echo json_encode(array(
                'status' => false,
                'message' => 'Tên đăng nhập hoặc mật khẩu sai'
            ));
        }

    }
}

?>