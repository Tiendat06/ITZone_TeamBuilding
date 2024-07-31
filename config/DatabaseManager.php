<?php
    define("hostname", "localhost");
    define("username", "root");
    define("password", "");
    define("database", "teambuilding");

class DatabaseManager{
    private static ?DatabaseManager $instance = null;
    private ?mysqli $conn = null;
    private function __construct(){}

    public static function getInstance(): DatabaseManager{
        if(self::$instance === null)
            self::$instance = new DatabaseManager();
        return self::$instance;
    }

    public function getConnection(): mysqli{
        $this->conn = mysqli_connect(hostname, username, password, database);
        if(!$this->conn)
            die("".mysqli_connect_error());
        return $this->conn;
    }

    public function closeConnection(): void{
        self::$instance = null;
        mysqli_close($this->conn);
    }
}

?>