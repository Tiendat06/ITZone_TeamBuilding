<?php

class TeamPuzzleRepository{
    private DatabaseManager $dbManager;
    private mysqli $conn;
    public function __construct(){
        $this->dbManager = DatabaseManager::getInstance();
        $this->conn = $this->dbManager->getConnection();
    }

    public function getTeamPuzzles($team_id, $topic_id){
//        $conn = $this->dbManager->getConnection();
        $sql = 'SELECT * FROM `team_puzzle` WHERE `team_id` = ? and `topic_id` = ?';
        $stmt = $this->conn->prepare($sql);

        $stmt->bind_param('ss', $team_id, $topic_id);
        $stmt->execute();

        $result = $stmt->get_result();

        $data = array();
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        $stmt->close();
        $this->conn->close();
        return $data;
    }
}

?>