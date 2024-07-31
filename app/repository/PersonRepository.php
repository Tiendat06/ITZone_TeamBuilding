<?php

class PersonRepository{
    private mysqli $conn;
    public function __construct()
    {
        $this->conn = DatabaseManager::getInstance()->getConnection();
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
        $data[] = $row;
        $stmt->close();
        return $data;
    }
}

?>