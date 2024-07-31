<?php

class TeamPuzzleRepository{
    private mysqli $conn;
    public function __construct(){
        $this->conn = DatabaseManager::getInstance()->getConnection();
    }

    public function getTeamPuzzlesByTeamIdAndTopicId($team_id, $topic_id): array{
        $sql = 'SELECT * FROM `team_puzzle` WHERE `team_id` = ? and `topic_id` = ?';
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('ss', $team_id, $topic_id);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = array();
        $row = $result->fetch_assoc();
        $data = $row;

        $stmt->close();
        return $data;
    }

    public function isTeamClickedTopicByTeamIdAndTopicId($team_id, $topic_id): bool{
        $is_clicked = 1;
        $sql = "SELECT * FROM `team_puzzle` 
         WHERE `team_id` = ? AND `topic_id` = ? AND `is_clicked` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ssi', $team_id, $topic_id, $is_clicked);
        $stmt->execute();

        $result = $stmt->get_result();
        $stmt->close();
        return $result->num_rows == 1;
    }

    public function updateTeamFirstClickTopicByTeamIdAndTopicId($team_id, $topic_id, $time_end): void{
        $is_clicked = 1;
        $sql = "UPDATE `team_puzzle`
        SET `is_clicked` = ?,
            `time_end` = ?
        WHERE `team_id` = ? AND `topic_id` = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('isss', $is_clicked, $time_end, $team_id, $topic_id);
        $stmt->execute();

        $stmt->close();
//        return $stmt->affected_rows > 0;
    }
}

?>