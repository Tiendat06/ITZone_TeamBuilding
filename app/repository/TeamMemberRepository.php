<?php

class TeamMemberRepository{
    private mysqli $conn;
    public function __construct()
    {
        $this->conn = DatabaseManager::getInstance()->getConnection();
    }

    public function getTeamMemberAndTeamPuzzleByTeamIdAndTopicId($team_id, $topic_id): array{
        $sql = "select * from `team_puzzle` `TP`, `team_member` `TM` 
            where `TP`.`team_id` = ? and `TP`.`topic_id` = ?
            and `TM`.`team_id` = `TP`.`team_id`;";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $team_id, $topic_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        $stmt->close();
        return $data;
    }
}

?>