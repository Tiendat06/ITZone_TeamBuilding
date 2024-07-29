<?php

class LocationRepository{
    private DatabaseManager $dbManager;
    private mysqli $conn;
    public function __construct(){
        $this->dbManager = DatabaseManager::getInstance();
        $this->conn = $this->dbManager->getConnection();
    }

    public function getLocations(): array{
//        $conn = $this->dbManager->getConnection();
        $sql = "SELECT * FROM location";
        $result = $this->conn->query($sql);
        $data = array();
        while($row = $result->fetch_assoc()){

            $location = (new LocationBuilder())
                ->setLocationId($row["location_id"])
                ->setLocationName($row["location_name"])
                ->setLocationImg($row["location_img"])
                ->setLocationAddress($row["location_address"])
                ->setBusGo($row["bus_go"])
                ->setBusBack($row["bus_back"])
                ->setMemberId($row["member_id"])
                ->build();

            $data[] = $location;
        }
        $this->conn->close();
        return $data;
    }
}

?>