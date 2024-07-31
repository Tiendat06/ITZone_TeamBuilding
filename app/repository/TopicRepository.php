<?php

class TopicRepository{
    private mysqli $conn;
    public function __construct(){
        $this->conn = DatabaseManager::getInstance()->getConnection();
    }

    public function getTopicByLocationId($location_id): Topic{
        $sql = "SELECT * FROM `topic` WHERE `location_id` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $location_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $topic = new Topic($row['topic_id'], $row['topic_link'],
            $row['topic_answer'], $row['topic_img'], $location_id);
        $stmt->close();
        return $topic;
    }
}

?>