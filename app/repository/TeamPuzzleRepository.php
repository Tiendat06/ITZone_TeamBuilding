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

    public function getTeamIsDoneByLocationId($location_id): array{
        $sql = "SELECT `team`.`team_name` FROM `topic`, `team_puzzle`, `team`
                WHERE location_id = ? 
                AND `topic`.topic_id = `team_puzzle`.topic_id 
                AND `is_done` = 1 AND `team`.`team_id` = `team_puzzle`.`team_id`";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $location_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();
        while($row = $result->fetch_assoc()){
            $data[] = $row['team_name'];
        }
        $stmt->close();
        return $data;
    }

    public function getTeamIsNotDoneByLocationId($location_id): array{
        $sql = "SELECT `team`.`team_name` FROM `topic`, `team_puzzle`, `team`
                    WHERE location_id = ? 
                    AND `topic`.topic_id = `team_puzzle`.topic_id 
                    AND `is_done` = 0 AND `team`.`team_id` = `team_puzzle`.`team_id`";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $location_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();
        while($row = $result->fetch_assoc()){
            $data[] = $row['team_name'];
        }
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

    public function updateTeamIsDoneByTopicIdAndTeamId($topic_id, $team_id, $is_done): bool{
        $sql = "UPDATE `team_puzzle` 
        SET `is_done` = ? 
        WHERE `team_id` = ? AND `topic_id` = ? AND `is_done` is null";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('iss', $is_done, $team_id, $topic_id);
        $stmt->execute();
        $affected_row = $stmt->affected_rows > 0;
        $stmt->close();
        return $affected_row;
    }

    public function updateTimeFineByTopicIdAndTeamId($topic_id, $team_id, $time_fine): bool{
        $sql = "UPDATE `team_puzzle` 
            SET `time_fine` = ? 
            WHERE `team_id` = ? AND `topic_id` = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('sss', $time_fine, $team_id, $topic_id);
        $stmt->execute();
        $affected_row = $stmt->affected_rows > 0;
        $stmt->close();
        return $affected_row;
    }

    public function checkTeamIsDoneByTopicIdAndTeamId($topic_id, $team_id): bool{
        $sql = "SELECT * FROM `team_puzzle` WHERE `team_id` = ? AND `topic_id` = ? AND `is_done` = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $team_id, $topic_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->num_rows == 1;
    }

    public function updateTopicAtLotteIsDoneByTeamId($team_id): bool{
        $sql = "UPDATE `team_puzzle`
        SET `is_done` = 1
        WHERE `team_id` = ? AND `topic_id` = 'TOP0000001'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $team_id);
        $stmt->execute();
        $affected_row = $stmt->affected_rows > 0;
        $stmt->close();
        return $affected_row;
    }

    public function countTeamIsDoneNotNullByTopicIdAndTeamId($topic_id, $team_id): int{
        $sql = "SELECT count(*) as total FROM `team_puzzle` 
         WHERE `team_id` = ? AND `topic_id` = ? AND `is_done` is not null";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $team_id, $topic_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['total'];
    }
    //Giải mật thư đặt biệt 
    public function updateSpecialPuzzleIsDoneByTeamId($team_id): bool{
        $sql = "UPDATE `team_puzzle` 
        SET `is_done` = 1 
        WHERE `team_id` = ? AND `topic_id` = 'TOP0000013' AND `is_done` is null";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('is', $is_done, $team_id);
        $stmt->execute();
        $affected_row = $stmt->affected_rows > 0;
        $stmt->close();
        return $affected_row;
    }
    public function incrementSpecialPuzzleClick($team_id): ?int {
    $sql = "UPDATE `team_puzzle`
            SET `is_clicked` = CASE
                                  WHEN `is_clicked` IS NULL THEN 1
                                  WHEN `is_clicked` < 3 THEN `is_clicked` + 1
                                  WHEN `is_clicked` = 3 THEN 4
                                  ELSE `is_clicked`
                               END
            WHERE `team_id` = ? 
              AND `topic_id` = 'TOP0000013'
              AND (`is_done` IS NULL OR `is_done` = 0)";
    
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param('s', $team_id);
    $stmt->execute();
    $stmt->close();

    return $this->getSpecialPuzzleClick($team_id);
}
public function getSpecialPuzzleClick($team_id): ?int {
    $sql = "SELECT `is_clicked` 
            FROM `team_puzzle`
            WHERE `team_id` = ? AND `topic_id` = 'TOP0000013'
            LIMIT 1";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param('s', $team_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row ? (int)$row['is_clicked'] : null;
}
public function solveSpecialPuzzleSuccess($team_id): bool {
    $sql = "UPDATE `team_puzzle`
            SET `is_done` = 1,
                `is_clicked` = -1
            WHERE `team_id` = ? 
              AND `topic_id` = 'TOP0000013'";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param('s', $team_id);
    $stmt->execute();
    $success = $stmt->affected_rows > 0;
    $stmt->close();
    return $success;
}
}
?>