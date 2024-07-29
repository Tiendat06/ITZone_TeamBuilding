<?php

class AccountRepository{
    private DatabaseManager $dbManager;
    private mysqli $conn;
    public function __construct(){
        $this->dbManager = DatabaseManager::getInstance();
        $this->conn = $this->dbManager->getConnection();
    }

    public function getAccountByUsernameAndPassword($person_phone, $person_password): array{
//        $conn = $this->dbManager->getConnection();
        $sql = "SELECT * from `account` 
                WHERE `account_username` = ? AND `account_password` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $person_phone, $person_password);
        $stmt->execute();

        $result = $stmt->get_result();
        $data = array();
        while ($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        $this->conn->close();
        $stmt->close();
        return $data;
    }
}

?>