<?php

class TeamArrivalRepository{
    private mysqli $conn;
    public function __construct(){
        $this->conn = DatabaseManager::getInstance()->getConnection();
    }

    public function getTeamArrivalsAndLocationByTeamId($team_id): array{
        $is_show_next_location = 1;
        $sql = "SELECT * FROM `team_arrival` as TA, `location` as LO
                WHERE `TA`.`team_id` = ?
                  and `LO`.`location_id` = `TA`.`location_id` 
                  and `TA`.is_show_next_location = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('si', $team_id, $is_show_next_location);
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