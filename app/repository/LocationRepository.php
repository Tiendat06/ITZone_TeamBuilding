<?php

class LocationRepository{
    private mysqli $conn;
    public function __construct(){
        $this->conn = DatabaseManager::getInstance()->getConnection();
    }

    public function getLocations(): array{
        $sql = "SELECT * FROM `location`";
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
        return $data;
    }

    public function getLocationByLocationId($location_id): Location{
        $sql = "SELECT * FROM `location` WHERE `location_id` = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $location_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $location = (new LocationBuilder())
            ->setLocationId($row["location_id"])
            ->setLocationName($row["location_name"])
            ->setLocationImg($row["location_img"])
            ->setLocationAddress($row["location_address"])
            ->setBusGo($row["bus_go"])
            ->setBusBack($row["bus_back"])
            ->setMemberId($row["member_id"])
            ->build();
        return $location;
    }
}

?>