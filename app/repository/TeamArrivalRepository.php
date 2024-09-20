<?php

class TeamArrivalRepository{
    private mysqli $conn;
    public function __construct(){
        $this->conn = DatabaseManager::getInstance()->getConnection();
    }

    public function getTeamArrivalByTeamArrivalId($team_arrival_id): TeamArrival{
        $sql = "SELECT * FROM team_arrival WHERE team_arrival_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $team_arrival_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return new TeamArrival($row['team_arrival_id'], $row['team_id'], $row['location_id'],
            $row['is_show_next_location'], $row['team_arrival_priority'], $row['is_open_next_location']);
    }

    public function getTeamArrivalsAndLocationByTeamId($team_id): array{
        $sql = "SELECT * FROM `team_arrival` as TA, `location` as LO
                WHERE `TA`.`team_id` = ?
                  and `LO`.`location_id` = `TA`.`location_id` 
                  and `TA`.`team_arrival_priority` >= 2 ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $team_id);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = array();
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        $stmt->close();
        return $data;
    }

    public function getTeamArrivalsInD1ByTeamId($team_id): array{
        $sql = "SELECT * FROM `team_arrival` 
         WHERE `team_id` = ? `team_arrival_priority` >= 2";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $team_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();
        while($row = $result->fetch_assoc()){
            $data[] = new TeamArrival($row['team_arrival_id'], $row['team_id'],
                $row['location_id'], $row['is_show_next_location'], $row['team_arrival_priority'], $row['is_open_next_location']);
        }
        return $data;
    }

    public function updateIsShowNextLocation($team_arrival_id){
        $is_show_next_location = 1;
        $sql = "UPDATE `team_arrival`
        SET `is_show_next_location` = ?
        WHERE `team_arrival_id` = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('is', $is_show_next_location, $team_arrival_id);
        $stmt->execute();

        $stmt->close();
    }

    public function getMentorLocationByTeamId($team_id): string{
        $sql = 'SELECT * FROM `team_arrival` as TA 
         WHERE `team_id` = ? AND `team_arrival_priority` = 1';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $team_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['location_id'];

    }

    public function updateIsShowNextLocationByLocationIdAndTeamId($location_id, $team_id): bool{
        $sql = "UPDATE `team_arrival` 
            SET `is_show_next_location` = 1 
            WHERE `location_id` = ? AND `team_id` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $location_id, $team_id);
        $stmt->execute();
        $affected_row = $stmt->affected_rows;
        $stmt->close();
        return $affected_row > 0;
    }

    public function countTeamArrivalsByLocationIdAndIsOpenNextLocation($location_id): int{
        $sql = "SELECT count(*) as total FROM `team_arrival` where `location_id` = ? AND `is_open_next_location` = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $location_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['total'];
    }

    public function getTeamArrivalAndTeamByLocationId($location_id): array{
        $sql = "SELECT * FROM `team_arrival` `TA`, `team` `TE` 
         where location_id = ? and `TA`.`team_id` = `TE`.`team_id`";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $location_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    public function checkPreviousPriorityIsShowNextLocationByTeamId($team_id, $previous_priority): int{
        $sql = "SELECT count(*) as total FROM `team_arrival` 
                         WHERE `team_id` = ? AND `team_arrival_priority` = ? 
                           AND `is_show_next_location` = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('si', $team_id, $previous_priority);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row['total'];
    }

    public function updateIsShowNextLocationByTeamId($team_id, $next_priority): bool{
        $sql = "UPDATE `team_arrival`
        SET `is_show_next_location` = 1
        WHERE `team_id` = ? AND `team_arrival_priority` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('si', $team_id, $next_priority);
        $stmt->execute();
        $affected_row = $stmt->affected_rows;
        $stmt->close();
        return $affected_row;
    }

    public function updateIsOpenNextLocationByTeamIdAndLocationId($team_id, $location_id): bool{
        $sql = "UPDATE `team_arrival`
         SET `is_open_next_location` = 1
         WHERE `team_id` = ? AND `location_id` = ?";

        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $team_id, $location_id);
        $stmt->execute();
        $affected_row = $stmt->affected_rows;
        $stmt->close();
        return $affected_row;
    }

    public function getTeamArrivalByLocationIdAndTeamId($location_id, $team_id): TeamArrival{
        $sql = "SELECT * FROM `team_arrival` where `location_id` = ? AND `team_id` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $location_id, $team_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        if($result->num_rows > 0){
            return new TeamArrival($row['team_arrival_id'], $row['team_id'], $row['location_id'],
                $row['is_show_next_location'], $row['team_arrival_priority'], $row['is_open_next_location']);
        }
        return new TeamArrival('', '', '',
            0, 0, 0);
    }

    public function getTeamArrivalByTeamId($team_id): array {
        $sql = "SELECT * FROM `team_arrival` where `team_id` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('s', $team_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }

    public function getLocationIdByPreviousPriorityAndTeamId($previous_priority, $team_id): string{
        $sql = 'SELECT * FROM `team_arrival` 
         WHERE `team_id` = ? AND `team_arrival_priority` = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('si', $team_id, $previous_priority);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        if($result->num_rows > 0){
            return $row['location_id'];
        }
        return '';
    }
}

?>