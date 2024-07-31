<?php

class HintRepository{
    private mysqli $conn;
    public function __construct(){
        $this->conn = DatabaseManager::getInstance()->getConnection();
    }

    public function getHintsWithIsShow($topic_id): array{
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
        $stmt->close();
        return $data;

    }
}

?>