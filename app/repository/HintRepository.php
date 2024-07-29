<?php

class HintRepository{
    private DatabaseManager $dbManager;
    private mysqli $conn;
    public function __construct(){
        $this->dbManager = DatabaseManager::getInstance();
        $this->conn = $this->dbManager->getConnection();
    }

    public function getHintsWithIsShow($topic_id): array{
//        $conn = $this->dbManager->getConnection();
        $data = array();
        $is_show = 1;
        $sql = "SELECT * from `hint` 
         WHERE `is_show` = ? and `topic_id` = ? ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('is', $is_show, $topic_id);
        $stmt->execute();

        $result = $stmt->get_result();
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        $this->conn->close();
        $stmt->close();
        return $data;

    }
}

?>