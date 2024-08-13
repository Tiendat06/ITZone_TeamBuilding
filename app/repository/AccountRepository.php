<?php

class AccountRepository{
    private mysqli $conn;
    public function __construct(){
        $this->conn = DatabaseManager::getInstance()->getConnection();
    }

    public function getAccountByUsernameAndPassword($account_username, $account_password): Account{
        $sql = "SELECT * FROM `account` 
         WHERE account_username = ? AND account_password = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ss", $account_username, $account_password);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return new Account($row['account_id'], $row['account_username'],
            $row['account_password'], $row['person_id'], $row['role_id']);
    }

    public function checkAccountByUsernameAndPassword($account_username, $account_password): bool{
        $sql = "SELECT * from `account` 
                WHERE `account_username` = ? AND `account_password` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $account_username, $account_password);
        $stmt->execute();

        $result = $stmt->get_result();

        $stmt->close();
        return $result->num_rows > 0;
    }

    public function getRoleByUserNameAndPassword($account_username, $account_password): string {
        $sql = "SELECT `role`.`role_name` from `account` acc, `role` role
                WHERE `acc`.`account_username` = ? AND `acc`.`account_password` = ? 
                  AND `role`.`role_id` = `acc`.`role_id`";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param('ss', $account_username, $account_password);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $role_name = $row["role_name"];

        $stmt->close();
        return $role_name;
    }
}

?>