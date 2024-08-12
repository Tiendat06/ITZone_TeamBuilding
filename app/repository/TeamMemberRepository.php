<?php

class TeamMemberRepository{
    private mysqli $conn;
    public function __construct()
    {
        $this->conn = DatabaseManager::getInstance()->getConnection();
    }
}

?>