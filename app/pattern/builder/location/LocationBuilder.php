<?php

class LocationBuilder implements ILocationBuilder {
    private string $location_id;
    private string $location_name;
    private string $location_img;
    private string $location_address;
    private string $bus_go;
    private string $bus_back;
    private string $member_id;

    public function __construct(){}

    public function setLocationId($location_id): ILocationBuilder
    {
        // TODO: Implement setLocationId() method.
        $this->location_id = $location_id;
        return $this;
    }

    public function setLocationName($location_name): ILocationBuilder
    {
        // TODO: Implement setLocationName() method.
        $this->location_name = $location_name;
        return $this;
    }

    public function setLocationImg($location_img): ILocationBuilder
    {
        // TODO: Implement setLocationImg() method.
        $this->location_img = $location_img;
        return $this;
    }

    public function setLocationAddress($location_address): ILocationBuilder
    {
        // TODO: Implement setLocationAddress() method.
        $this->location_address = $location_address;
        return $this;
    }

    public function setBusGo($bus_go): ILocationBuilder
    {
        // TODO: Implement setBusGo() method.
        $this->bus_go = $bus_go;
        return $this;
    }

    public function setBusBack($bus_back): ILocationBuilder
    {
        // TODO: Implement setBusBack() method.
        $this->bus_back = $bus_back;
        return $this;
    }

    public function setMemberId($member_id): ILocationBuilder
    {
        // TODO: Implement setMemberId() method.
        $this->member_id = $member_id;
        return $this;
    }

    public function build(): Location
    {
        // TODO: Implement build() method.
        return new Location($this->location_id, $this->location_name, $this->location_img,
            $this->location_address, $this->bus_go, $this->bus_back, $this->member_id);
    }
}

?>