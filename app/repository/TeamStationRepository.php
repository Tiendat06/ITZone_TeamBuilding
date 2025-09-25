<?php

class TeamStationRepository {
    private mysqli $conn;

    public function __construct(){
        $this->conn = DatabaseManager::getInstance()->getConnection();
    }

    // Lấy tất cả station của một team
    public function getTeamStationsByTeamId($team_id): array {
        $sql = "SELECT * FROM `team_station` WHERE `team_id` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $team_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }

        $stmt->close();
        return $data;
    }

    // Lấy danh sách team đã done ở location
    public function getTeamIsDoneByLocationId( $location_id): array {
        $sql = "SELECT `team`.`team_name` 
                FROM `team_station`, `team`
                WHERE `team_station`.`location_id` = ?
                AND `team_station`.`is_done` = 1
                AND `team`.`team_id` = `team_station`.`team_id`";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $location_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];
        while($row = $result->fetch_assoc()){
            $data[] = $row['team_name'];
        }

        $stmt->close();
        return $data;
    }

    // Lấy danh sách team chưa done ở location
    public function getTeamIsNotDoneByLocationId( $location_id): array {
        $sql = "SELECT `team`.`team_name` 
                FROM `team_station`, `team`
                WHERE `team_station`.`location_id` = ?
                AND `team_station`.`is_done` = 0
                AND `team`.`team_id` = `team_station`.`team_id`";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $location_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = [];
        while($row = $result->fetch_assoc()){
            $data[] = $row['team_name'];
        }

        $stmt->close();
        return $data;
    }

    // Cập nhật trạng thái is_done cho team tại location
    public function updateTeamIsDoneByTeamIdAndLocationId($team_id, $location_id): void {
    $sql = "UPDATE `team_station` 
            SET `is_done` = 1
            WHERE `team_id` = ? AND `location_id` = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param('ss', $team_id, $location_id);
    $stmt->execute();

    // $affected = $stmt->affected_rows > 0;
    $stmt->close();
    // return $affected;
}

   public function updateTeamIsSuccessByTeamIdAndLocationId($team_id, $location_id): void {
    $sql = "UPDATE `team_station` 
            SET `is_success` = 1
            WHERE `team_id` = ? AND `location_id` = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param('ss', $team_id, $location_id);
    $stmt->execute();

    // $affected = $stmt->affected_rows > 0;
    $stmt->close();
    // return $affected;
}


    // Kiểm tra team đã success ở location chưa
    public function checkTeamIsSuccess( $team_id,  $location_id): bool {
        $sql = "SELECT * FROM `team_station` 
                WHERE `team_id` = ? AND `location_id` = ? AND `is_success` = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $team_id, $location_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $stmt->close();
        return $result->num_rows > 0;
    }

    // Đếm số location team đã done
    public function countDoneLocationsByTeamId( $team_id): int {
        $sql = "SELECT COUNT(*) as total 
                FROM `team_station` 
                WHERE `team_id` = ? AND `is_done` = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $team_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return (int)$row['total'];
    }
      // Kiểm tra team đã xong (is_done = 1) ở location chưa
    public function checkTeamIsDone( $team_id,  $location_id): bool {
        $sql = "SELECT * FROM `team_station`
                WHERE `team_id` = ? AND `location_id` = ? AND `is_done` = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $team_id, $location_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $stmt->close();
        return $result->num_rows > 0;
    }

}

?>
