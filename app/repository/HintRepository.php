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

    public function updateHintByTopicIdAndPriority($topic_id, $hint_priority): bool{
        $sql = "UPDATE `hint` 
                SET `is_show` = 1 
              WHERE `topic_id` = ? and `hint_priority` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('si', $topic_id, $hint_priority);
        $stmt->execute();
        $affected_row = $stmt->affected_rows > 0;
        $stmt->close();
        return $affected_row;
    }

    public function getHintByTopicIdAndPriority($topic_id, $hint_priority){
        $sql = "SELECT * from `hint` where `topic_id` = ? and `hint_priority` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('si', $topic_id, $hint_priority);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        if ($result->num_rows === 0) {
            return null;
        }
        return new Hint(
            $row['hint_id'], $row['hint_description'], $row['hint_end'],
            $row['is_show'], $hint_priority, $topic_id);

    }
}

?>