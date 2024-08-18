<?php

class PersonRepository{
    private mysqli $conn;
    public function __construct()
    {
        $this->conn = DatabaseManager::getInstance()->getConnection();
    }

    public function getTeam(): array{
        $sql = "SELECT * FROM `team`";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = new Team($row['team_id'], $row['team_name'], $row['team_phone'],
                $row['team_route'], $row['team_member'], $row['mentor_id']);
        }
        return $data;
    }

    public function getTeamMemberByTeamIdOrMentorId($person_id, $operation='team'): array{
        $data = array();

        if($operation == 'team'){
            $sql = "SELECT * FROM `team`, `mentor`
                WHERE `team`.`team_id` = ? AND `team`.`mentor_id` = `mentor`.`mentor_id`";
        } else if($operation == 'mentor'){
            $sql = "SELECT * FROM `team`, `mentor` 
                WHERE `mentor`.`mentor_id` = ? AND `team`.`mentor_id` = `mentor`.`mentor_id`";
        } else{
            return $data;
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $person_id);
        $stmt->execute();

        $result = $stmt->get_result();

        $row = $result->fetch_assoc();
        $data = $row;
        $stmt->close();
        return $data;
    }

    public function checkMentorByTeamId($team_id, $topic_answer): bool{
        $sql = "SELECT * FROM `mentor`, `team` 
            WHERE `team_id` = ? 
              AND `mentor`.`mentor_id` = `team`.`mentor_id` 
              AND `mentor`.`mentor_key` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $team_id, $topic_answer);
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->num_rows > 0;
    }

    public function getPersonNameByPersonId($person_id, $role_name): string{
        if ($role_name == 'mentor') {
            $sql = 'SELECT * FROM `mentor` WHERE `mentor_id` = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('s', $person_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            return $row['mentor_name'];
        } else if ($role_name == 'guard' || $role_name == 'support') {
            $sql = 'SELECT * FROM `member` WHERE `member_id` = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('s', $person_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            return $row['member_name'];
        } else if ($role_name == 'team') {
            $sql = 'SELECT * FROM `team` WHERE `team_id` = ?';
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param('s', $person_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            return $row['team_name'];
        }

        return "Guest";
    }

    public function getMentorByMentorId($mentor_id): Mentor{
        $sql = "SELECT * FROM `mentor` WHERE `mentor_id` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $mentor_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return new Mentor($row['mentor_id'], $row['mentor_name'],
            $row['mentor_phone'], $row['mentor_key']);
    }
}

?>