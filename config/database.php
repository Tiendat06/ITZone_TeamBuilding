<?php

    define("host", "localhost");
    define("username", "root");
    define("password", "");
    define("database", "teambulding");

    function getConnection(): mysqli
    {
        $conn = mysqli_connect(host, username, password, database);
        if(!$conn)
            die("". mysqli_connect_error());
        return $conn;
    }
?>